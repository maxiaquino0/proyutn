<?php
	require_once 'core/init.php';

	//esto es para que un usuario no logueado vea el archivo.!!
	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		//Session::logout();
		Session::flash("no","Aca hackersito anda a tomar mate!!");

		header("Location: login.php");
	}

	$categorias = DB::getInstance()->get('categorias')->results();
	$id = $_GET["id"];
	$sql = "SELECT * FROM productos
			WHERE id = ?
			";
	$producto = DB::getInstance()->consultar($sql, array($id))->
			results();
?>

<form action="procesar_producto.php" method="post">
	<input type="hidden" name="id_producto" value="<?php echo $producto[0]->id ?>">
	Producto: <br>
	<textarea name="producto" id="producto" cols="30" rows="10"><?php echo $producto[0]->producto ?></textarea>
	<br>
	Cantidad: <br>
	<input type="text" name="cantidad" value="<?php echo $producto[0]->cantidad ?>"/>
	<br>
	Precio: <br>
	<input type="text" name="precio"  value="<?php echo $producto[0]->precio?>" />
	<br>
	Categoria: <br>
	<select name="categoria">
		<?php foreach ($categorias as $row){ ?>
			<?php if ($row->id == $producto[0]->id_categoria) { ?>
				<option selected value="<?php echo $row->id ?>">
					<?php echo $row->descripcion ?>
				</option>
			<?php }else{ ?>
				<option value="<?php echo $row->id ?>">
					<?php echo $row->descripcion ?>
				</option>
			<?php } ?>
		<?php }  ?>
	</select>
	<br>
	<input type="submit" name="btoProducto" value="Actualizar">
</form>