<?php
  session_start();
  require('../conexion/conexion.php');

  $nombre=$_SESSION['nombre'];
  $apellido=$_SESSION['apellido'];
  $tipo=$_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Fast Order</title>
  
	<link rel="stylesheet" href="../css/index.css">
</head>
<body>
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>Logotipo</h1>
			</div>
			<nav class="menu">
				<a href="../includes/cerrar.php">Cerrar sesion</a>      
			</nav>
      <main>
        <h1>Bienvenido</h1><br>
        <p><?php  echo $nombre?> <?php echo  $apellido?></p> <br>

        <p><?php echo $tipo ?></p>
    </main>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="index.php">Inicio</a>
			<a href="orden/crearo.php">Usuarios</a>
			<a href="clientes/panelC.php">Clientes</a>
			<a href="menu/index.php">Menu</a>
			<a href="registros/index.php">Registros</a>
			<a href="reportes/index.php">Reportes</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
</body>
</html>
