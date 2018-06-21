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
					<div class="row">
						<div class="col-lg-12">
							<div class='card'>
								<div class='card-header card-header-text' data-background-color='blue'>
									<h4 class='card-title'>個人檔案</h4>
								</div>
								<div class='card-content'>
									<form id='profile' class='form-horizontal' enctype='multipart/form-data'>
										<div class="row text-center">
											<div class='fileinput fileinput-new text-center' data-provides='fileinput' id='uploadteamlogoinput'>
												<div class='fileinput-new thumbnail'>
													<img src='./assets/img/avatars/<?=$_SESSION["avatar"]?>' style='width:128px !important; height:128px !important'>
												</div>
												<div class='fileinput-preview fileinput-exists thumbnail'></div>
												<div>
													<span class='btn btn-rose btn-round btn-file'>
														<span class='fileinput-new'>選擇大頭貼</span>
														<span class='fileinput-exists'>變更</span>
														<input type='file' name='uploadavatar' id='uploadavatar' accept='image/jpeg, image/png' />
													</span>
													<a class='btn btn-danger btn-round fileinput-exists' data-dismiss='fileinput'><i class='material-icons'>close</i> 移除</a>
													<br>
													<div class='stats'><i class='material-icons text-danger'>warning</i> <font color='#FF0000'>檔案限制: 小於 1 MB, jpg/png</font></div>
												</div>
											</div>
										</div>
										<div class='row'>
											<label class='col-sm-2 label-on-left'>使用者名稱(必填)</label>
											<div class='col-sm-9'>
												<div class='form-group label-floating'>
													<label class='control-label'></label>
													<input class='form-control' type='text' id='name' name="name" required value='<?=$_SESSION["user"]?>'/>
												</div>
											</div>
										</div>
										<div class='card-footer text-center'>
											<button type='submit' onclick='javascript:void(0);' id='SaveProfile' class='btn btn-rose btn-fill'>保存</button>
										</div>
									</form>
								</div>
							</div>
							<div class='card'>
								<div class='card-header card-header-text' data-background-color='red'>
									<h4 class='card-title'>其他</h4>
								</div>
								<div class='card-content text-center'>
									<button type='button' onclick='javascript:void(0);' id='LogoutButton' class='btn btn-rose btn-fill'>登出</button>
								</div>
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
			include "./assets/js/settings.js"
		?>
	});
</script>
<?php mysqli_close($link);	?>
</html>