<?php

require("../../conexion/conexion.php");

$sql="SELECT * FROM menu,estado,tipo_comida WHERE menu.id_esta=estado.id_esta and menu.id_comida=tipo_comida.id_comida";
$sentencia=$bd->prepare($sql);
$sentencia->execute(array());
?>

    <form action="detalle.php" method="get">
    <?php
    $contador=0;
    $total = 0;
    foreach ($sentencia as $menu) {
        ?>
            <input type="text" name="codi" readonly value="<?php echo $menu->cod_menu?>">
            <input type="text" name="estado" readonly value="<?php echo $menu->tipo_estado ?>">
            <input type="text" name="comida" readonly value="<?php echo $menu->tipo_comida?>">
            <input type="text" name="precio" readonly value="<?php echo $menu->precio?>">
            <input type="text" name="tiempo" readonly value="<?php echo $menu->tiempo_estimado?>">
            <input type="number" name="cantidad" placeholder="Cantidad">
            <a href="detalle.php?cod=<?php echo $menu->cod_menu?> &estado=<?php echo $menu->tipo_estado?> &comida=<?php echo $menu->tipo_comida?> &precio=<?php echo $menu->precio?>  "><input type="button" name="btn" value="Agregar al pedido"></a>
            <?php
    }
?>

</form>