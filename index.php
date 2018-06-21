<!doctype html>
<?php
	require_once "assets/inc/sql.php";
	require_once "assets/inc/auth.php";
	
	if(isset($_SESSION["user"]))
	{
		header("Location:chatroom.php");
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
		<div class="full-page" style="padding-top: 30vh;">
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
							<div class="card card-login" style="padding: 20px">
								<div class="card-header text-center">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h3 class="modal-title">登入</h3>
								</div>
								<form id="loginform" class="form-horizontal" name="loginform" action="#">
								<div class="card-content form">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">帳號</label>
											<input type="text" class="form-control" name="loginnumber" id="loginnumber" required="true">
										</div>
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">密碼</label>
											<input type="password" class="form-control" name="loginpass" id="loginpass" required="true">
										</div>
									</div>
								</div>
								<div class="card-footer text-center">
									<button type="submit" class="btn btn-rose btn-wd btn-lg" id="SubmitLogin">登入</button>
								</div>
								</form>
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
			include("./assets/js/loginform.js");
		?>
	});
</script>
<?php mysqli_close($link);	?>
</html>