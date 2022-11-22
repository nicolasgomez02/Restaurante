<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña</title>
</head>
<body>
    <h1>Para recuperar ingrese su correo electronico</h1>
    <form action="recu.php" method="get">
    <input type="email" name="correo" autocomplete="off" placeholder="Ingrese su correo"> 
    <input type="number" name="cedu" autocomplete="off" placeholder="Ingrese cedula">   
        <input type="submit" name="btn" value="Recuperar">
    </form>
</body>
</html>