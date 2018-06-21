<?php
	require_once "./sql.php";
	require_once "./auth.php";
	
	$name = $_POST['name'];
	
	if(isset($_FILES["file"]["name"])) 
	{
		$fileName = "";
		$ext = "";
		
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK)
		{
			if($_FILES["file"]["size"] < "1048576")
			{
				$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				$fileName = md5_file($_FILES['file']['tmp_name']);
				copy($_FILES['file']['tmp_name'], "./../img/avatars/".$fileName.".".$ext);
				
				$result = mysqli_query($link, "update user set avatar = '".$fileName.".".$ext."', name = '".$name."' where id = '".$_SESSION["id"]."'");
				$_SESSION["user"] = $name;
				$_SESSION["avatar"] = $fileName.".".$ext;
				echo "success";
				mysqli_close ($link);
				exit;
			}
			else
			{
				echo "large";
				echo json_encode($json, true);
				mysqli_close ($link);
				exit;
			}
		}
		else 
		{
			echo "error";
			mysqli_close ($link);
			exit;
		}
	}	
	else
	{
		$result = mysqli_query($link, "update user set name = '".$name."' where id = '".$_SESSION["id"]."'");
		$_SESSION["user"] = $name;
		echo "success";
		mysqli_close ($link);
		exit;
	}
?>