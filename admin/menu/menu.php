<?php
    require("../../conexion/conexion.php");

    $cod_menu= $_POST['docu'];

    $estado = $_POST['estado'];

    $comida = $_POST['comida'];

    $oferta = $_POST['oferta'];

    $precio = $_POST['precio'];

    $time = $_POST['time'];

    $foto = $_FILES['foto'] ['name'];

    $ruta = $_FILES['foto'] ['tmp_name'];

    $tamano = $_FILES['foto'] ['size'];

    $ext = $_FILES['foto'] ['type'];

    $destino = "../../foto" . $foto;

    copy($ruta, $destino);

    $insertar = "INSERT INTO menu (cod_menu, id_esta, id_comida, precio_ofert, precio, tiempo_estimado, foto) value (?,?,?,?,?,?,?)";
    $sql = $bd->prepare($insertar);
    $sql->execute(array($cod_menu, $estado, $comida, $oferta, $precio,$time,$foto));




?>