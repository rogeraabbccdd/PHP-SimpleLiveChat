<head>
    <meta charset="utf-8" />
    <!-- Bootstrap core CSS     -->
    <link href="./../css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="./../css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="./../css/font-awesome.css" rel="stylesheet" />
    <link href="./../css/google-roboto-300-700.css" rel="stylesheet" />
	<link href="./../css/custom.css" rel="stylesheet" />
</head>
<body style="background-color:#333">
<div id="msgboard">
<?php
	require_once "./sql.php";
	
	$result = mysqli_query($link, "select * from message");
	$msg_num = mysqli_num_rows($result);
	
	$result = mysqli_query($link, "
	select message.message, message.id, user.name, user.avatar from message, user where message.send = user.id order by message.id asc limit 25");
	while($row = mysqli_fetch_array($result))
	{
		?>
		<div class="col-md-12">
			<div class="card card-profile">
				<div class="card-avatar" style="max-width: 70px; max-height: 70px; margin:-30px 20px -5px;">
					<img src="./../img/avatars/<?=$row["avatar"]?>">
				</div>
				<div class="card-content text-left">
					<h4 class="card-title"><?=$row["name"]?></h4>
					<p class="description">
						<?=$row["message"]?>
					</p>
				</div>
			</div>
		</div>
		<?php
	}
?>
</div>
</body>
<!--   Core JS Files   -->
<script src="./../js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="./../js/jquery-ui.min.js" type="text/javascript"></script>
<script src="./../js/bootstrap.min.js" type="text/javascript"></script>
<script src="./../js/material.min.js" type="text/javascript"></script>
<script src="./../js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="./../js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="./../js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="./../js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="./../js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="./../js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="./../js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="./../js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="./../js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="./../js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="./../js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="./../js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="./../js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="./../js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="./../js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="./../js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="./../js/material-dashboard.js"></script>
<script src="./../js/custom.js"></script>
<script src="./../js/scrollreveal.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		window.sr = ScrollReveal();
		sr.reveal('.card', { duration: 1000 }, 50);
		
		<?php
			include "./../js/refreshmsg.js";
		?>
	});
</script>
<?php mysqli_close($link);	?>