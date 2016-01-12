<?php
error_reporting(0);
session_start();
	/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sistem informasi Geografis</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link href="assets/css/cerulean.min.css" rel="stylesheet">
		<style type="text/css">	body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
			.sidebar-nav {
				padding: 9px 0;
			}
		
			label.error {
				
				color: red;
			
			}
</style>
		<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
 
	
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap-dropdown.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/messages_id.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"
		type="text/javascript"></script>
		<script>$(document).ready(function() {
				$("#form1").validate();
			});
</script>
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#">CandraLab GIS</a>
					<div class="nav-collapse">
						<ul class="nav"></ul>
						<ul class="nav pull-right">
							<li>
								<a href="#"></a>
							</li>
							<li class="divider-vertical"></li>
							<li class="dropdown">
								<?php
if(isset($_SESSION['username'])){
								?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-white"></i>Setting <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href="index.php?mod=login&pg=cp_form"><i class="icon-lock"></i>Change Password</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="login/logout.php"><i class="icon-off"></i>Logout</a>
									</li>
								</ul>
							</li>
							<?	}else{
								?><li>
										<a href="index.php?mod=login&pg=form_login"><i class="icon-user icon-white"></i>Login</a>
									</li>
						<?	} //end of if?>
						</ul>
					</div>
				</div><!-- /navbar-inner -->
			</div><!-- /navbar -->
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="span3">
					<?php	include ('inc/config.php');
							include ('inc/menu.php');
							include ('inc/function.php');
							$sessi = $_SESSION['username'];
							menu($sessi);?>

					<div class="span9">
						<div>
							<?php
							$pg = '';
/*
 * PHP Code untuk mendapatkan halaman view masing masing tabel
 */

if(!isset($_GET['pg'])) {
	if(!empty($_SESSION['username'])) {
		include ('login/welcome.php');
	} else {
		include ('peta/peta.php');
	}

} else {
	$pg = $_GET['pg'];
	$mod = $_GET['mod'];
	include $mod . '/' . $pg . ".php";
}?>
						</div><!--/span-->
					</div><!--/row-->
				</div>
				<footer>
					<p style="text-align: center">
						<a href='http://www.candra.web.id/'>Candralab Studio 2013</a>
					</p>
				</footer>
			</div><!--/.fluid-container-->
		
	</body>
</html>
