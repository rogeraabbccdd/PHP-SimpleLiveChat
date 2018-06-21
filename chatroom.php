<!doctype html>
<?php
	require_once "assets/inc/sql.php";
	require_once "assets/inc/auth.php";
	
	if(!isset($_SESSION["user"]))
	{
		header("Location:index.php");
		mysqli_close($link);
		exit;
	}
?>
<html lang="zh-tw">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="./assets/img/icon.ico"/>
	<link rel="bookmark" href="./assets/img/icon.ico"/>
    <link rel="icon" href="./assets/img/icon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PHP2018 聊天室</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!--  Social tags      -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- Bootstrap core CSS     -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="./assets/css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="./assets/css/font-awesome.css" rel="stylesheet" />
    <link href="./assets/css/google-roboto-300-700.css" rel="stylesheet" />
	<link href="./assets/css/custom.css" rel="stylesheet" />
</head>

<body>
	<div class='blurbg' style='background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(./assets/img/background.jpg);'>
	</div>
    <nav class="navbar navbar-info navbar-absolute">
        <div class="container">
			<?php include("./assets/inc/nav.php");	?>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
		<div class="full-page" style="padding-top: 10vh;">
			<div class="content">
				<div class="container">
					<div class="col-lg-12">
						<div class="card" style="padding: 20px">
							<div class="card-header text-center">
								<h3>PHP2018 歡樂聊天室</h3>
							</div>
							<div class="card-content" style="background-color:#333; height:500px; margin: 30px 0 0 0; border-radius: 1%;" id="chatroom">
								<iframe name="frame" id="frame" src="./assets/inc/msgboard.php" width="100%" height="100%" style="border:0px">
								</iframe>
							</div>
							<div class="card-footer text-center">
								<form name="msgform" id="msgform">
									<div class="form-group label-floating" style="width:70%">
										<input type="text" name="msg" id="msg" class="form-control" placeholder="請輸入訊息..."></li>
										<button type="submit" class="btn btn-fill btn-rose" style="margin:20px" id="sendmsg">送出</button>
									</div>			
								</form>
								<font color="#F00">請勿發表廢文</font>
							</div>
						</div>
					</div>
				</div>
				<footer class="footer">
					
				</footer>
			</div>
		</div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="./assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="./assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/material.min.js" type="text/javascript"></script>
<script src="./assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="./assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="./assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="./assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="./assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="./assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="./assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="./assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="./assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="./assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="./assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="./assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="./assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="./assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="./assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="./assets/js/material-dashboard.js"></script>
<script src="./assets/js/custom.js"></script>
<script src="./assets/js/scrollreveal.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		window.sr = ScrollReveal();
		sr.reveal('.card', { duration: 1000 }, 50);
		
		<?php
			include "./assets/js/sendmsg.js";
		?>
	});
</script>
<?php mysqli_close($link);	?>
</html>