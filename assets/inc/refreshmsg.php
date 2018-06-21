<?php
	require_once "./sql.php";
	
	$num = $_GET["num"];
	
	$result = mysqli_query($link, "
	select message.message, message.id, user.name, user.avatar from message, user where message.send = user.id order by message.id asc limit ".$num.", 100");
	$i = 0;
	$msg = "";
	while($row = mysqli_fetch_array($result))
	{
		$msg .= "
		<div class='col-md-12'>
			<div class='card card-profile'>
				<div class='card-avatar' style='max-width: 70px; max-height: 70px; margin:-30px 20px -5px;'>
					<img src='./../img/avatars/".$row['avatar']."'>
				</div>
				<div class='card-content text-left'>
					<h4 class='card-title'>".$row['name']."</h4>
					<p class='description'>
						".$row['message']."
					</p>
				</div>
			</div>
		</div>";
		
		$i++;
	}
	
	$json = array(
		"count" => $i,
		"msg" => $msg,
		"num" => $num,
	);
	echo json_encode($json, true);
	mysqli_close ($link);
?>