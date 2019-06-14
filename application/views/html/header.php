<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $nav_params['toolbar']; ?></title>
	<!--Import Google Icon Font-->
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?php echo css_url('icon.css') ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo css_url('materialize.css') ?>"  media="screen,projection"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<header>
	<div class="navbar-fixed ">
		<nav class="blue darken-3">
			<div class="nav-wrapper" style="padding-left: 10px;">
				<?php

				if ($nav_params['nav_action'] === 'nothing'){
					echo "<a href='#' class='' style='position: absolute;	color: #fff; margin-left: 18px; font-size: 20px;'>".$nav_params['toolbar']."</a>";
					//echo "<a href='#' class='sidenav-trigger show-on-medium-and-up'><i class='material-icons'>$nav_icon</i></a>";
				} else {
					echo "<a href='#' class='' style='position: absolute;	color: #fff; margin-left: 64px; font-size: 20px;'>".$nav_params['toolbar']."</a>";
					echo "<a href='#' class='sidenav-trigger show-on-medium-and-up' data-target='slide-out'><i class='material-icons'>".$nav_params['nav_icon']."</i></a>";
				}

				?>
			</div>
		</nav>
	</div>
</header>
