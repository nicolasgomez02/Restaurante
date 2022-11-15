<?php
    require("../../conexion/conexion.php");
    $cons = "SELECT * FROM menu,estado,tipo_comida WHERE menu.id_esta=estado.id_esta and menu.id_comida=tipo_comida.id_comida";
    $sql = $bd->prepare($cons);
    $sql->execute(array());

    $registros=3;//indica que se van a ver 3 registro por págin
    
    $total=$sql->rowCount();
   // echo $total;
   $paginas=$total/4;
   $paginas=ceil($paginas);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/menu.css">
    <title>Document</title>
</head>
<body>

<?php
                    if (!$_GET){
                        header("Location:index.php?pagina=1");
                    }
                    if ($_GET['pagina']>$paginas|| $_GET['pagina']<=0) {
                        header("Location:index.php?pagina=1");
                    }

                    $iniciar=($_GET['pagina']-1)*$registros;
                    //echo $iniciar;

                    $cons1= "SELECT * FROM menu,estado,tipo_comida WHERE menu.id_esta=estado.id_esta and menu.id_comida=tipo_comida.id_comida LIMIT :iniciar,:nregistros";
                    $fell=$bd->prepare($cons1);
                    $fell->bindParam(":iniciar",$iniciar,PDO::PARAM_INT);
                    $fell->bindParam(":nregistros",$registros,PDO::PARAM_INT);
                    $fell->execute();

                    $camb=$fell->fetchAll();
                    ?>
<header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            
        </div>
         
        <a id="cer" href="../includes/cerrar.php"> <input id="cerrar" type="submit" value="cerrar sesion"></a>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
        <i class=" fa-hat-chef"></i>
            <h4><a href="../index.php">El Buen Sabor</a></h4>
        </div>

        <div class="options__menu"> 

            <a href="../index.php" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="../usuarios/panelU.php">
                <div class="option">
                    <i class="far fa-id-badge" title="Usuarios"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>

            <a href="index.php">
                <div class="option">
                <i class="fa-solid fa-kitchen-set" tittle="Menu"></i>
                    <h4>Crear menu</h4>
                </div>
            </a>
            <a href="../registros/index.php">
                <div class="option">
                <i class="fa-solid fa-bowl-rice" tittle="Comidas"></i>
                    <h4>Agregar comidas</h4>
                </div>
            </a>
            <a href="../registros/bebidas/panelBebidas.php">
                <div class="option">
                <i class="fa-solid fa-wine-bottle" tittle="Bebidas"></i>
                    <h4>Agregar bebidas</h4>
                </div>
            </a>
        </div>

    </div>

    <div class="box-body"> 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Registrar
            </button>

            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crea Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1>Menu</h1>
      <?php

    try {

        $sql2="SELECT * FROM estado WHERE id_esta = 3";
        $resultado2=$bd->prepare($sql2);
        $resultado2->execute(array());

        if ($menu=$resultado2->fetch(PDO::FETCH_ASSOC)) {
            ?>
        <div>
            <form action="" method="post" enctype="multipart/form-data" id="formulario">
                <label for="">Numero de menu:</label><br>
                <input type="number" name="docu" id="" placeholder="Numero de Menu">
                <input type="hidden" name="estado" value="<?php echo($menu['id_esta'])?>" id=""><br>
                <label for="">Comida o bebida</label><br>
                <select name="comida" id="">
                    <option>Seleccione...</option>
                    <?php
                        $sql1="SELECT * FROM tipo_comida WHERE id_comida <= 100";
                        $result1=$bd->prepare($sql1);
                        $result1->execute(array());

                        while ($menus=$result1->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php echo($menus['id_comida'])?>"><?php echo($menus['tipo_comida'])?></option>
                            <?php
                        }
                    ?>
                </select><br>
                <label for="">Precio oferta</label><br>
                <input type="number" name="oferta" id="" placeholder="Ingrese precio oferta"><br>
                <label for="">Precio</label><br>
                <input type="email" name="precio" id="" placeholder="Ingrese el precio"><br>
                <label for="">Tiempo estimado</label>
                <input type="text" name="time" placeholder="Ingrese el tiempo estimado">
                <label for="">foto</label><br>
                <input type="file" name="foto" id=""><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" id="enviar" class="btn btn-primary">Crear menu</button>
      </div>
      </form>
      <script src="../../js/app.js"></script>
    </div>
  </div>
</div>
        
        <form method="post" name="form6" action="">
            <div class="form-group">    
                <table class="table  table-hover table-striped table-light table-bordered table-sm  caption-top"> 
                    <tr>
                        <th>Nº Menu<i class="bi bi-chevron-down"></i></th>
                        <th>Estado<i class="bi bi-chevron-down"></i></th>
                        <th>Comida<i class="bi bi-chevron-down"></i></th>
                        <th>Precio oferta<i class="bi bi-chevron-down"></i></th>
                        <th>Precio<i class="bi bi-chevron-down"></i></th>
                        <th>Tiempo estimado<i class="bi bi-chevron-down"></i></th>
                        <th>Foto<i class="bi bi-chevron-down"></i></th>
                        <th colspan="3">Acción<i class="bi bi-chevron-down"></i></th>
                    </tr>
                    <?php

                            foreach ($camb as $resul) 
                            {
                                $d=$resul->cod_menu;
                                $no=$resul->tipo_estado;
                                $ap=$resul->tipo_comida;
                                $ed=$resul->precio_ofert;
                                $te=$resul->precio;
                                $co=$resul->tiempo_estimado;
                                $fo=$resul->foto;
                    ?>
                    <tr>
          				<td><?php echo $d?></td>
          				<td><?php echo $no?></td>
                        <td><?php echo $ap?></td>
                        <td><?php echo $ed?></td>
                        <td><?php echo $te?></td>
                        <td><?php echo $co?></td>
                        <td><?php echo (' <img src="../../foto/'.$fo.'" width="100"> ') ?></td>
                        <td><a href=# class="button">Modificar</a></td>
                        <td><a href=# class="button green">Eliminar</a></td>
                        <td><a href=# class="button red">Ver</a></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </form>
        <?php
        }

    } catch (Exception $e) {
        die("Error" . $e->GetMessage());
    }finally{
        $bd=null;
    }
?>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php  echo $_GET['pagina']<=1? 'disabled' : '' ?> ">
        <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a>
    </li>
    <?php
        for($i=0; $i<$paginas; $i++):?>
            <li class="page-item <?php echo $_GET ['pagina']==$i+1? 'active': ''?>">
                <a class="page-link" 
                href="index.php?pagina=<?php echo $i+1?>">
                <?php echo $i+1?></a>
            </li>
            <?php endfor?>


    <li class="page-item <?php  echo $_GET['pagina']>=$paginas? 'disabled' : '' ?> "><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Next</a></li>
  </ul>
</nav>
</body>
</html>