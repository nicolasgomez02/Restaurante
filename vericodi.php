<?php
require("conexion/conexion.php");
    $cedu=$_GET['cedu'];
    $_SESSION['cedu']=$cedu;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar</title>
</head>
<body>
    <form action="codi.php" method="get">
        <input type="number" name="codi" placeholder="Ingrese el codigo">
        <input type="hidden" name="cedu" value="<?php echo $cedu?>">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>