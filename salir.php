<?php
	require_once 'core/init.php';

	//Llama a la funcion de la clase Session para destruir la sesion.
	Session::logout();
	header("Location: login.php");


?>