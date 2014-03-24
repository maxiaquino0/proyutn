<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}

	$bto = $_POST["btoProducto"];
	if (!empty($bto) and $bto == "Agregar") {
		//esta funcion me trae todos los valores ingresado por el post en variables $name del formulario html
		extract($_POST);

		$sql = "INSERT INTO productos VALUE (
				null,?,?,?,?,?
			)";

		$query = DB::getInstance()->consultar($sql, array(
				$producto,$cantidad,$precio,"imagen1.jpg",$categoria
			));
		
		if ($query->error()) {
			//error producido - no se inserto
			header("Location: listar_productos.php");
		}else{
			//todo ok - se inserto
			header("Location: listar_productos.php");
		}

	}elseif (!empty($bto) and $bto == "Actualizar" ){

		extract($_POST);
		$sql = "UPDATE productos SET 
					producto = ?,
					cantidad = ?,
					precio = ?,
					imagen = ?,
					id_categoria = ?
				WHERE id = ?
			";
		$query = DB::getInstance()->consultar($sql, array(
				$producto,$cantidad,$precio,"imagen1.jpg",$categoria,$id_producto
			));
	
		if ($query->error()) {
			//error producido - no se inserto
			header("Location: listar_productos.php");
		}else{
			//todo ok - se inserto
			header("Location: listar_productos.php");
		}

	}else{
		echo "No se mandaron datos para insertar";
	}

?>