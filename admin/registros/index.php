<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/indexcomidas.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    
</head>
<body id="body">
    
<header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            
        </div>
         
        <a id="cer" href="../includes/cerrar.php"> <input id="cerrar" type="submit" value="cerrar sesion"></a>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
        <i class=" fa-hat-chef"></i>
            <h4><a href="index.php">El Buen Sabor</a></h4>
        </div>

        <div class="options__menu"> 

            <a href="../index.php" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="usuarios/panelU.php">
                <div class="option">
                    <i class="far fa-id-badge" title="Usuarios"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>

            <a href="../menu/index.php">
                <div class="option">
                <i class="fa-solid fa-kitchen-set" tittle="Menu"></i>
                    <h4>Crear menu</h4>
                </div>
            </a>
            <a href="index.php">
                <div class="option">
                <i class="fa-solid fa-bowl-rice" tittle="Comidas"></i>
                    <h4>Agregar comidas</h4>
                </div>
            </a>
            <a href="index.php">
                <div class="option">
                <i class="fa-solid fa-wine-bottle" tittle="Bebidas"></i>
                    <h4>Agregar bebidas</h4>
                </div>
            </a>
        </div>

    </div>
    <main>
    
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header"><h4>Bienvenido Administrador</h4></div>
  </div>
</div>
<div class="container">
  
    <div class="card">
        <div class="col-xs-3">
            <p class="page-header">Comidas</p>
                <img src="../../img/comidas.jpg" class="img-rounded" width="250px" height="250px" />
                <a href="" title="registrar" onclick="return confirm('¿Esta  seguro de registrar una nueva bebida?')"><button >Registrar</button> </a> <a  href="./comidas/panelTcomidas.php" title="Ver" onclick="return confirm('¿Desea ver los registros de todas las comidas?')"><button>Ver registros</button></a> 
        </div> 
    </div>
    <div class="card">
        <div class="col-xs-3">
            <p class="page-header">Sopas</p>
                <img src="../../img/sopas.jpg" class="img-rounded" width="250px" height="250px" />
                <a  title="registrar" onclick="return confirm('¿Esta  seguro de registrar una nueva sopa?')"><button >Registrar</button> </a> <a  href="./sopas/panelSopas.php" title="Ver" onclick="return confirm('¿Desea ver los registros de todas las sopas?')"><button>Ver registros</button></a> 
        </div> 
    </div>
    <div class="card">
        <div class="col-xs-3">
            <p class="page-header">Bebidas</p>
                <img src="../../img/bebidas.jpg" class="img-rounded" width="250px" height="250px" />
                <a  title="registrar" id="bebida" onclick="confirmacion('¿Esta  seguro de registrar una nueva bebida?')"><button >Registrar</button> </a> <a  href="./bebidas/panelBebidas.php"  class="bebida"  title="Ver" onclick="return confirm('¿Desea ver los registros de todas las bebidas?')"><button>Ver registros</button></a> 
        </div> 
    </div>
    <div class="card">
        <div class="col-xs-3">
            <p class="page-header">Jugos</p>
                <img src="../../img/jugos.jpg" class="img-rounded" width="250px" height="250px" />
                <a  title="registrar" onclick="return confirm('¿Esta  seguro de registrar una nuevo jugo?')"><button >Registrar</button> </a> <a  href="./jugos/PanelJugos.php" title="Ver" onclick="return confirmacion('¿Desea ver los registros de todas los jugos?')"><button>Ver registros</button></a> 
        </div> 
    </div>
    
</div>
    </main>
    <script src="../../js/script.js"></script>
    <script src="./js/function.js"></script>
</body>
</html>