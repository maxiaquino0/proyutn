<?php
	require_once 'core/init.php';

	if (!empty( $_POST["btoLogin"] )) {
		extract($_POST);

		$sql = "SELECT * FROM usuarios WHERE
				usuario = ? AND clave = ?
				LIMIT 1
				";

		$query = DB::getInstance()->consultar($sql,array(
				$usuario, sha1($clave)
			));

		if ($query->count() == 1) {
			$user = $query->first();
			//Para trabajar con la clase session creada se hace lo siguiente
			Session::put("usuario",$user->usuario);
			Session::put("id",$user->id);
			Session::put("loginTrue",True);
			Session::flash("ok","Bienvenido al sistema");
			header("Location: index.php");
		}else{
			Session::flash("no","El usuario y clave es incorrecto");
			header("Location: login.php");
		}
	}


?>