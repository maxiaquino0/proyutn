<?php
	require_once 'core/init.php';

	//$categorias = DB::getInstance()->get('categorias')->results();
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