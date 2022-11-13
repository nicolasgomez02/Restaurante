<?php
    session_start();
    include("../../../conexion/conexion.php");

    $consulta="SELECT * FROM tipo_comida WHERE id_comida>100";
    $res=$bd ->prepare($consulta);
    $res->execute();
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurantes</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../../css/panelU.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            
        </div>
        <div class="restaurante">
            <img src="../../../img/Buensabor.png">
        </div>
        <div class="botones">
                
                <a href="#"><button>Cerrar</button>
        </div>
       
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
        <i class="fal fa-hat-chef"></i>
            <h4>El Buen Sabor</h4>
        </div>

        <div class="options__menu">	

            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4>Contacto</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fa-light fa-hat-chef"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

        </div>

    </div>

    <main>

        <div id="nim">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar bebidas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div><h1>Registro de Bebidas</h1></div>
        <form action="registrarB.php" method="GET" >
            <label for="">Codigo de Bebida:</label>
            <input type="number" name="cod" id="" placeholder="Ingrese el codigo de su Bebida " required>
            <label for="">Nombre de Bebida:</label>
            <input type="text" name="nom" id="" placeholder="Ingrese el nombre " required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="submit" id="enviar" class="btn btn-primary">Agregar bebida</button>
      </div>
      </form> 
    </div>
  </div>
</div>




        </div>
        <div class="input_search">
            <input class="buscar"  type="search" name="busca"  id="" placeholder="Buscar"> 
            <i class="bi bi-search" id="search" title="Buscar"></i>
        </div>
    <div class="container">
            <div class="row">
                <div class="col">
                <table  class="table  table-hover table-striped table-light table-bordered table-sm  caption-top">
                    <caption>Panel de comidas</caption>
        <tr >
            <th>Cod.de Comidas<i class="bi bi-chevron-down"></i></th>
            <th>Nombre de comida <i class="bi bi-chevron-down"></i></th>
            
            <th colspan="3">Accion <i class="bi bi-chevron-down"></i></th>
        </tr>
        <?php
            foreach ($res as $mostrar) {
        ?>
        
        <tr>
            <td><?php echo $mostrar->id_comida;?></td>
            <td><?php echo $mostrar->tipo_comida?></td>
            
            <td>
                    <a  id="elimina" class="btn btn-primary" href="eliminar.php?id=<?php echo $mostrar->id_comida?>">
                        Eliminar
                    </a>
                </td>
                <td>
                    <a  id="modificar" class="btn btn-primary" href="editar.php?id=<?php echo $mostrar->id_comida?>">
                       Editar
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
                </div>
            </div>
        </div>
        
    <table>
		<td>
			<a href="../index.php" onmouseup="window.close()">
                <input  class="btn btn-primary" id="bot" type="button" value="cerrar" name="cerrar" >
            </a>
		</td>
	</table>
    </form>      
    </main>
    <script src="../../../js/script.js"></script>
</body>
</html>