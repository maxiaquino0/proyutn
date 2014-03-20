<?php
	require_once 'core/init.php';

	//$categorias = DB::getInstance()->get('categorias')->results();
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