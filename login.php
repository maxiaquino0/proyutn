<?php
	require_once 'core/init.php';
	//esto hace que si la persona esta logueada y quiere ir al login lo envia directamente a index.php
	if (Session::exists("loginTrue") AND Session::get("loginTrue") ){
		//la persona ya esta logueada.
		header("Location: index.php");
	}
	
	if (Session::exists("no")) {
		echo Session::flash("no");
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema ProyUTN</title>
</head>
<body bgcolor="silver">
	<h1>Sistema ProyUTN</h1>
	<br><br>
	<h2>Login</h2>
	<br>
	<form action="procesar_login.php" method="post">
		<label for="">Usuario</label>
		<input type="text" name="usuario">
		<br>
		<label for="">Clave</label>
		<input type="password" name="clave">
		<br>
		<input type="submit" name="btoLogin"> 
	
	</form>
</body>
</html>
