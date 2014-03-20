<?php
	require_once 'core/init.php';

	//$productos = DB::getInstance()->get('productos')->results();
	$sql = "SELECT u.id, u.usuario, u.clave, u.privilegio, u.token
			FROM usuarios as u
			ORDER BY u.id DESC
			";

	$usuarios = DB::getInstance()->consultar($sql,array())->results();


	/*foreach ($productos as $row) {
		echo "Producto: " . $row->producto;
		echo "<br>Cantidad: " . $row->cantidad;
		echo "<br>Precio: " . $row->precio;
		echo "<br>Identificador: " . $row->id;
		echo "<br>Categoria: " . $row->descripcion;
		echo "<hr>";

	}
	*/
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pantalla de inicio</title>
</head>
<body>
	<a href='index.php'>Inicio</a>
	<br>
	<a href='agregar_usuario.php'>Agregar Usuario</a>
	<br><br>
	<form action="buscar.php" method="get">
		Buscar <input type="search" name="q" id="q">
		<input type="submit" name="btoBuscar" value="Buscar">
	</form>
	<table border=1 class="mitabla">
		<tr>
			<th>Identificador</th>
			<th>Usuario</th>
			<th>Clave</th>
			<th>Privilegio</th>
			<th>Token</th>
		</tr>
		<?php foreach ($usuarios as $row) { ?>
		<tr>
			<td><?php echo $row->id  ?></td>
			<td><?php  echo $row->usuario ?></td>
			<td><?php  echo $row->clave ?></td>
			<td><?php  echo $row->privilegio ?></td>
			<td><?php  echo $row->token ?></td>
			<td><a href="<?php echo URL_BASE?>modificar_usuario.php?id=<?php echo $row->id  ?>">Modificar</a></td>
			<td><a href="<?php echo URL_BASE?>eliminar_usuario.php?id=<?php echo $row->id  ?>">Eliminar</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
