	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" type="button">
			<span class="sr-only">Toggle navigation</span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span>
		</button> 
		<a class="navbar-brand" href="./index.php" style="font-weight:bold !important; font-size:30px !important;-webkit-text-fill-color:lemonchiffon">
			<i class="material-icons">chat_bubble</i>
			PHP2018 聊天室
		</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
			<?php    
				if(!isset($_SESSION["user"]))    
				{   
			?>
				<li>
					<a id="" href="register.php" style="font-size: 20px; !important; cursor:pointer;"><i class="material-icons">person</i>&nbsp;註冊</a>
				</li>
			<?php   }                       
				else               
				{                                   
			?>
				<li>
					<a href="settings.php" id="settings" style="font-size: 20px; !important; cursor:pointer;"><i class="material-icons">person</i>&nbsp;<?=$_SESSION["user"]?>
					</a>
				</li>
			<?php                      
				}                   
			?>
		</ul>
	</div>