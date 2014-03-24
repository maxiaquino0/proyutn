<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}

	$categorias = DB::getInstance()->get('categorias')->results();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Producto</title>
</head>
<body bgcolor="silver">
	<a href="index.php">Inicio</a>
	<br><br>
	<form action="procesar_producto.php" method="post">
		Producto: <br>
		<textarea name="producto" id="producto" cols="30" rows="10"></textarea>
		<br>
		Cantidad: <br>
		<input type="text" name="cantidad"/>
		<br>
		Precio: <br>
		<input type="text" name="precio"/>
		<br>
		Categoria: <br>
		<select name="categoria">
			<?php foreach ($categorias as $row) {?>
			<option value="<?php echo $row->id ?>">
				<?php echo $row->descripcion  ?>
			</option>
			<?php }  ?>
		</select>
		<br>
		<input type="submit" name="btoProducto" value="Agregar">
	</form>
</body>
</html>
