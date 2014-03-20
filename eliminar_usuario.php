<?php
	require_once 'core/init.php';

	$id = $_GET["id"];
	if (!empty($id)) {
		$sql = "DELETE FROM usuario WHERE id = ?";
		$query = DB::getInstance()->consultar($sql, array($id));
		if ($query->error) {
			//error
			header("Location: listar_usuarios.php");
		}else{
			//ok
			header("Location: listar_usuarios.php");
		}
	}


?>