<?php
	require_once 'core/init.php';

	Session::logout();
	header("Location: login.php");


?>