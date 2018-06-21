<?php
	session_start();
	
	$time = strtotime("now");
	$time2 = strtotime("-5 minutes");
	
	if (isset($_GET['do']))
	{
		$do = $_GET['do'];
		
		if($do == "login")
		{
			if (isset($_POST['login']) && isset($_POST['pass']))
			{
				require_once "./sql.php";
				
				$result = mysqli_query($link, "SELECT * FROM log_failed WHERE ip = '".$_SERVER['REMOTE_ADDR']."' AND timestamp > '".$time2."'");
				$failed = mysqli_num_rows($result);
				
				if($failed > 3)
				{
					echo "ban";
					mysqli_close($link);
					exit;
				}
				
				$number = $_POST["login"];
				$password = md5($_POST["pass"]);
				
				
				$result = mysqli_query($link, "SELECT * FROM user WHERE acc = '".$number."' AND pw = '".$password."'");
				if($result && mysqli_num_rows($result) > 0)
				{
					$_SESSION['usernumber'] = $number;
					while($row = mysqli_fetch_array($result))
					{
						$_SESSION['user'] = $row["name"];
						$_SESSION['avatar'] = $row["avatar"];
						$_SESSION['id'] = $row["id"];
					}
					echo "success";
					
					$result = mysqli_query($link, "INSERT INTO log VALUES (null, '".$_SESSION['id']."', 'login', '".$time."')");	
				}
				else
				{
					echo "failed";
					$result = mysqli_query($link, "INSERT INTO log_failed VALUES (null, '".$_SERVER['REMOTE_ADDR']."', '".$time."')");
				}
				
				mysqli_close($link);
				exit;
			}
		}
		elseif($do == "reg")
		{
			$acc = $_POST['acc'];
			$pw = md5($_POST['pw']);
			$name = $_POST['name'];
				
			require_once "./sql.php";
			$result = mysqli_query($link, "select acc from user where acc = '".$acc."'");
			if($result && mysqli_num_rows($result) > 0)
			{
				$json = array(
					"responce" => "used",
				);
				echo json_encode($json, true);
				mysqli_close ($link);
				exit;
			}
			else
			{
				$fileName = "";
				$ext = "";

				if(isset($_FILES["file"]["name"])) 
				{
					if ($_FILES['file']['error'] === UPLOAD_ERR_OK)
					{
						if($_FILES["file"]["size"] < "1048576")
						{
							$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
							$fileName = md5_file($_FILES['file']['tmp_name']);
							copy($_FILES['file']['tmp_name'], "./../img/avatars/".$fileName.".".$ext);
							
							$result = mysqli_query($link, "INSERT INTO user VALUES (null, '".$acc."', '".$pw."', '".$name."', '".$fileName.".".$ext."')");
							$new_id = mysqli_insert_id($link);
							
							$result = mysqli_query($link, "INSERT INTO log VALUES (null, '".$new_id."', 'register', '".$time."')");
							
							$json = array(
								"responce" => "success",
							);
							echo json_encode($json, true);
							mysqli_close ($link);
							exit;
						}
						else
						{
							$json = array(
								"responce" => "large",
							);
							echo json_encode($json, true);
							mysqli_close ($link);
							exit;
						}
					}
					else 
					{
						$json = array(
							"responce" => "upload-logo-error",
							"responce2" => $_FILES['file']['error']
						);
							
						echo json_encode($json, true);
						mysqli_close ($link);
						exit;
					}
				}	
				else
				{
					$result = mysqli_query($link, "INSERT INTO user VALUES (null, '".$acc."', '".$pw."', '".$name."', 'default-avatar.png')");
					$new_id = mysqli_insert_id($link);
							
					$result = mysqli_query($link, "INSERT INTO log VALUES (null, '".$new_id."', 'register', '".$time."')");
					
					$json = array(
						"responce" => "success",
					);
					echo json_encode($json, true);
					mysqli_close ($link);
					exit;
				}
			}
		}
		elseif ($do == "logout")
		{
			require_once "./sql.php";
			$result = mysqli_query($link, "INSERT INTO log VALUES (null, '".$_SESSION["id"]."', 'logout', '".$time."')");

			session_unset();
			session_destroy();
			
			mysqli_close($link);
			exit;
		}
	}
?>