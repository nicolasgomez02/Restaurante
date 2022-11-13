<?php
    require("../../../conexion/conexion.php");
    if(isset($_GET["submit"])){

        
        $codigo=   $_GET["cod"];
        $producto=   $_GET["nom"];
        
		
        

        $sql1= "SELECT * FROM tipo_comida WHERE id_comida = :cod";
        $resultado1= $bd->prepare($sql1);
        $resultado1->execute(array(":cod"=>$codigo));
        $consulta=$resultado1->fetch(PDO::FETCH_ASSOC);

        if($consulta){
            echo"<script>alert('Ya existe esta Comida.')</script>";
            echo"<script>window.location='panelTcomidas.php'</script>";
        }elseif($codigo<=100){
            $sql="INSERT INTO tipo_comida (id_comida,tipo_comida) values (:id, :tip)";
            $resultado=$bd->prepare($sql);//$base es el nombre de la conexión
            $resultado->execute(array(":id"=>$codigo,":tip"=>$producto));
            echo"<script>alert('Se ha realizado con exito su registro')</script>";
            echo"<script>window.location='panelTcomidas.php'</script>";
        }else{
            echo"<script>alert('No es posible crear esta comida.Recuerda que debes registrar el codigo menor a 100.')</script>";
            echo"<script>window.location='panelTcomidas.php'</script>";
        }
        
    }

?>