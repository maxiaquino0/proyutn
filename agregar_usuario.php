<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		//Session::logout();
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}
?>

<form action="procesar_usuario.php" method="post">
	Usuario: <br>
	<input type="text" name="usuario"/>
	<br>
	Clave: <br>
	<input type="text" name="clave"/>
	<br>
	Privilegio: <br>
	<input type="text" name="privilegio"/>
	<br>
	Token: <br>
	<input type="text" name="token"/>
	<br>
	<input type="submit" name="btoUsuario" value="Agregar">
</form>