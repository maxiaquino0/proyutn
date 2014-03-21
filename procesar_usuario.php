<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		//Session::logout();
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}

	$bto = $_POST["btoUsuario"];
	if (!empty($bto) and $bto == "Agregar") {
		//esta funcion me trae todos los valores ingresado por el post en variables $name del formulario html
		extract($_POST);

		$sql = "INSERT INTO usuarios VALUE (
				null,?,?,?,?
			)";

		$query = DB::getInstance()->consultar($sql, array(
				$usuario,$clave,$privilegio,$token
			));
		
		if ($query->error()) {
			//error producido - no se inserto
			header("Location: listar_usuarios.php");
		}else{
			//todo ok - se inserto
			header("Location: listar_usuarios.php");
		}

	}elseif (!empty($bto) and $bto == "Actualizar" ){

		extract($_POST);
		$sql = "UPDATE usuarios SET 
					usuario = ?,
					clave = ?,
					privilegio = ?,
					token = ?,
				WHERE id = ?
			";
		$query = DB::getInstance()->consultar($sql, array(
				$usuario,$clave,$privilegio,$token,$id_usuario
			));
	
		if ($query->error()) {
			//error producido - no se inserto
			header("Location: listar_usuarios.php");
		}else{
			//todo ok - se inserto
			header("Location: listar_usuarios.php");
		}

	}else{
		echo "No se mandaron datos para insertar";
	}


?>