<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		//Session::logout();
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}

	$id = $_GET["id"];
	$sql = "SELECT * FROM usuarios
			WHERE id = ?
			";
	$usuario = DB::getInstance()->consultar($sql, array($id))->
			results();
?>

<form action="procesar_usuario.php" method="post">
	<input type="hidden" name="id_usuario" value="<?php echo $usuario[0]->id ?>">
	<br>
	Usuario: <br>
	<input type="text" name="id_usuario" value="<?php echo $usuario[0]->usuario?>">
	<br>
	Clave: <br>
	<input type="text" name="clave" value="<?php echo $usuario[0]->clave ?>"/>
	<br>
	Privilegio: <br>
	<input type="text" name="privilegio"  value="<?php echo $usuario[0]->privilegio?>" />
	<br>
	Token: <br>
	<input type="text" name="token"  value="<?php echo $usuario[0]->token?>" />
	<br>
	<input type="submit" name="btoUsuario" value="Actualizar">
</form>