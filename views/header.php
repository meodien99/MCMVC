<html>
<head>
	<title>Page title</title>
	<link rel="stylesheet" href="<?=URL;?>public/css/default.css">
	<script type="text/javascript" src="<?=URL;?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?=URL;?>public/js/custom.js"></script>

	<?php 
	if(isset($this->js)){
		
		foreach($this->js as $js){
			echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
		}
	}
	?>
</head>

<body>
	<?php Session::init();?>
<div id="header">
	<?php if(Session::get('loggedIn') == false) : // chua login?>
		<a href="<?=URL;?>index">Index</a>
		<a href="<?=URL;?>help">Help</a>
	<?php endif;?>
	<?php if(Session::get('loggedIn') == true) : // login?>
		<a href="<?=URL;?>dashboard">Dashboard</a>
		
		<?php if(Session::get('role') == 'owner') :?>
			<a href="<?=URL;?>user">User</a>
		<?php endif;?>
		<a href="<?=URL;?>dashboard/logout">Logout</a>
	<?php else:?>
		<a href="<?=URL;?>login">Login</a>
	<?php endif;?>
</div>

<div id="content">
	