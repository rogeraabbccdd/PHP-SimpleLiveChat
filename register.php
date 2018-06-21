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
		<div class="full-page" style="padding-top: 10vh;">
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class='wizard-container'>
								<div class='card wizard-card' data-color='rose' id='wizardProfile'>
									<form id='reg-wizard' enctype='multipart/form-data' name="regwizard">
										<div class='wizard-header'>
											<h3 class='wizard-title'>
												註冊
											</h3>
											<h5>註冊成為會員即可和同學歡樂聊天</h5>
										</div>
										<div class='wizard-navigation'>
											<ul>
												<li>
													<a href='#regbasic' data-toggle='tab'>基本資料</a>
												</li>
												<li>
													<a href='#regother' data-toggle='tab'>其他設定</a>
												</li>
											</ul>
										</div>
										<div class='tab-content'>
											<div class='tab-pane' id='regbasic'>
												<div class='row'>
													<h4 class='info-text'>請輸入你的基本資料</h4>
													<div class='col-sm-4 col-sm-offset-4'>
														<div class='picture-container'>
															<div class='picture'>
																<img src='./assets/img/default-avatar.png' class='picture-src' id='wizardPicturePreview' title='' />
																<input type='file' id='wizard-picture' name='regavatar' accept='image/jpeg, image/png'>
															</div>
															<h6>選擇你的大頭貼<br>
															<i class='material-icons text-danger'>warning</i> <font color='#FF0000'>檔案限制: 小於 1 MB, jpg/png</font>
															</h6>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-lg-10 col-lg-offset-1'>
														<div class='input-group'>
															<span class='input-group-addon'>
																<i class='material-icons'>face</i>
															</span>
															<div class='form-group label-floating'>
																<label class='control-label'>帳號
																	<small>(必填)</small>
																</label>
																<input name='createacc' id='createacc' type='text' class='form-control' required='true'>
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-lg-10 col-lg-offset-1'>
														<div class='input-group'>
															<span class='input-group-addon'>
																<i class='material-icons'>lock</i>
															</span>
															<div class='form-group label-floating'>
																<label class='control-label'>密碼
																	<small>(必填)</small>
																</label>
																<input name='createpw' id='createpw' type='password' class='form-control' required='true'>
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-lg-10 col-lg-offset-1'>
														<div class='input-group'>
															<span class='input-group-addon'>
																<i class='material-icons'>person</i>
															</span>
															<div class='form-group label-floating'>
																<label class='control-label'>使用者名稱
																	<small>(必填)</small>
																</label>
																<input name='createname' id='createname' type='text' class='form-control' required='true'>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class='tab-pane' id='regother'>
												<div class='row'>
													<div class='col-lg-10 col-lg-offset-1'>
													請同意使用規範
														<div class="checkbox">
															<label style="color: #000">
																<input type="checkbox" name="noattack"> 我不會在聊天室攻擊同學
															</label>
														</div>
														<div class="checkbox">
															<label  style="color: #000">
																<input type="checkbox" name="notrash" > 我不會在聊天室發廢文
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class='wizard-footer'>
											<div class='pull-right'>
												<input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
												<input type='button' onclick='javascript:void(0);' id='create-finish' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
											</div>
											<div class='pull-left'>
												<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
											</div>
											<div class='clearfix'></div>
										</div>
									</form>
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
		
		initMaterialWizard();
		
		<?php
			include("./assets/js/regform.js");
		?>
	});
</script>
<?php mysqli_close($link);	?>
</html>