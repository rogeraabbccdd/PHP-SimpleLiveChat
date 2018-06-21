<?php
	require_once "./auth.php";
	
	if(isset($_SESSION['id']))
	{
		require_once "./sql.php";
		
		$result = mysqli_query($link, "insert into message values (null, '".$_SESSION['id']."', '".$_POST["data"]."')");
		
		mysqli_close($link);
	}
?>