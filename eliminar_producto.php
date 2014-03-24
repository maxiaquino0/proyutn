<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}

	$id = $_GET["id"];
	if (!empty($id)) {
		$sql = "DELETE FROM productos WHERE id = ?";
		$query = DB::getInstance()->consultar($sql, array($id));
		if ($query->error) {
			//error
			header("Location: listar_productos.php");
		}else{
			//ok
			header("Location: listar_productos.php");
		}
	}


?>