<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0046f31256.js" crossorigin="anonymous"></script>
      
    <link rel="stylesheet" href="../css/admin.css">
    <title>El buen sabor</title>

    <style>
      #cerrar{
        border:0;
        font-size:15.5px;
        width:120px;
        height:30px;
        background-color:#f5f5f5;
      }
      #cerrar:hover{
        color: #f5f5f5;
        background-color:#F83B3B;
      }
      #cer{
        margin-left:1000px;
        width:120px;
        height:30px;  
      }
    </style>
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

            <a href="index.php" class="selected">
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

            <a href="menu/index.php">
                <div class="option">
                <i class="fa-solid fa-kitchen-set" tittle="Menu"></i>
                    <h4>Crear menu</h4>
                </div>
            </a>
            <a href="registros/index.php">
                <div class="option">
                <i class="fa-solid fa-bowl-rice" tittle="Comidas"></i>
                    <h4>Agregar comidas</h4>
                </div>
            </a>
            <a href="registros/bebidas/panelBebidas.php">
                <div class="option">
                <i class="fa-solid fa-wine-bottle" tittle="Bebidas"></i>
                    <h4>Agregar bebidas</h4>
                </div>
            </a>
        </div>

    </div>

    <main>
        <h1>Entrada</h1><br>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam sapiente cumque dicta animi explicabo sequi. Ex amet et, dolor eligendi commodi consectetur quo voluptatibus, cum nemo porro veniam at blanditiis?</p> <br>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident adipisci beatae impedit quia, deleniti quasi sequi iusto exercitationem nihil nulla, laboriosam dolore corrupti fuga officiis? Odit a mollitia id magnam amet delectus quia blanditiis reprehenderit explicabo eveniet! Rem voluptatum explicabo ipsum quae, dolorum, laudantium doloribus a, illum saepe sapiente accusantium dicta reiciendis? Amet iure porro voluptatum error fugit odit voluptas?</p>
    </main>

    <script src="js/script.js"></script>

    


    <script>
        document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Evento para mostrar y ocultar menú
    function open_close_menu(){
        body.classList.toggle("body_move");
        side_menu.classList.toggle("menu__side_move");
    }

//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

if (window.innerWidth < 760){

    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
}

//Haciendo el menú responsive(adaptable)

window.addEventListener("resize", function(){

    if (window.innerWidth > 760){

        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    }

    if (window.innerWidth < 760){

        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }

});

onmousemove = function(e){
  if(document.getElementById("rightEye").dataset.xValue === undefined) {
    document.getElementById("rightEye").dataset.xValue = Math.round(document.getElementById("rightEye").getBoundingClientRect().left) + 9;
    document.getElementById("rightEye").dataset.yValue = Math.round(document.getElementById("rightEye").getBoundingClientRect().top) + 9;
    document.getElementById("leftEye").dataset.xValue = Math.round(document.getElementById("leftEye").getBoundingClientRect().left) + 9;
    document.getElementById("leftEye").dataset.yValue = Math.round(document.getElementById("leftEye").getBoundingClientRect().top) + 9;  
  }
  var rightEyeElement = document.getElementById("rightEye");
  var rightEye = {
    x:document.getElementById("rightEye").dataset.xValue,
    y:document.getElementById("rightEye").dataset.yValue,
  }
  var leftEye = {
    x:document.getElementById("leftEye").dataset.xValue,
    y:document.getElementById("leftEye").dataset.yValue,
  }
 
  /* Variables for right eye */
  var finalRightEyeXOffset = 0;
  var finalRightEyeYOffset = 0;
  var rightEyeXOffset = rightEye.x - e.clientX;
  var rightEyeYOffset = rightEye.y - e.clientY;
 
  /* Set X value for right eye */
  if(rightEyeXOffset > 0  && rightEyeXOffset <= 10) {
    finalRightEyeXOffset = rightEyeXOffset * -1;
    //console.log(e.clientX + " " + rightEye.x + " " + rightEyeXOffset + " small change towards left");
  }
  else if(rightEyeXOffset < 0  && rightEyeXOffset >= -10) {
    finalRightEyeXOffset = rightEyeXOffset * -1;
    //console.log(e.clientX + " " + rightEye.x + " " + rightEyeXOffset + " small change towards right");      
  }
  else if(rightEyeXOffset > 10) {
    finalRightEyeXOffset = -10;
    //console.log(e.clientX + " " + rightEye.x + " " + rightEyeXOffset + " big change towards left");
  }
  else if(rightEyeXOffset < -10) {
    finalRightEyeXOffset = 10;
     //console.log(e.clientX + " " + rightEye.x + " " + rightEyeXOffset + " big change towards right");    
  }
 
  /* Set y value for right eye */
  if(rightEyeYOffset > 0  && rightEyeYOffset <= 10) {
    finalRightEyeYOffset = rightEyeYOffset * -1;
    //console.log(e.clientY + " " + rightEye.y + " " + rightEyeYOffset + " small change towards left");
  }
  else if(rightEyeYOffset < 0  && rightEyeYOffset >= -10) {
    finalRightEyeYOffset = rightEyeYOffset * -1;
    //console.log(e.clientY + " " + rightEye.y + " " + rightEyeYOffset + " small change towards right");      
  }
  else if(rightEyeYOffset > 10) {
    finalRightEyeYOffset = -10;
    //console.log(e.clientY + " " + rightEye.y + " " + rightEyeYOffset + " big change towards left");
  }
  else if(rightEyeYOffset < -10) {
    finalRightEyeYOffset = 10;
     //console.log(e.clientY + " " + rightEye.y + " " + rightEyeYOffset + " big change towards right");    
  }
 
  /* Variables for left eye */
  var finalLeftEyeXOffset = 0;
  var finalLeftEyeYOffset = 0;
  var leftEyeXOffset = leftEye.x - e.clientX;
  var leftEyeYOffset = leftEye.y - e.clientY;
 
  /* Set X value for left eye */
  if(leftEyeXOffset > 0  && leftEyeXOffset <= 10) {
    finalLeftEyeXOffset = leftEyeXOffset * -1;
    //console.log(e.clientX + " " + leftEye.x + " " + leftEyeXOffset + " small change towards left");
  }
  else if(leftEyeXOffset < 0  && leftEyeXOffset >= -10) {
    finalLeftEyeXOffset = leftEyeXOffset * -1;
    //console.log(e.clientX + " " + leftEye.x + " " + leftEyeXOffset + " small change towards right");      
  }
  else if(leftEyeXOffset > 10) {
    finalLeftEyeXOffset = -10;
    //console.log(e.clientX + " " + leftEye.x + " " + leftEyeXOffset + " big change towards left");
  }
  else if(leftEyeXOffset < -10) {
    finalLeftEyeXOffset = 10;
     //console.log(e.clientX + " " + leftEye.x + " " + leftEyeXOffset + " big change towards right");    
  }
 
  /* Set y value for left eye */
  if(leftEyeYOffset > 0  && leftEyeYOffset <= 10) {
    finalLeftEyeYOffset = leftEyeYOffset * -1;
    //console.log(e.clientY + " " + leftEye.y + " " + leftEyeYOffset + " small change towards left");
  }
  else if(leftEyeYOffset < 0  && leftEyeYOffset >= -10) {
    finalLeftEyeYOffset = leftEyeYOffset * -1;
    //console.log(e.clientY + " " + leftEye.y + " " + leftEyeYOffset + " small change towards right");      
  }
  else if(leftEyeYOffset > 10) {
    finalLeftEyeYOffset = -10;
    //console.log(e.clientY + " " + leftEye.y + " " + leftEyeYOffset + " big change towards left");
  }
  else if(leftEyeYOffset < -10) {
    finalLeftEyeYOffset = 10;
     //console.log(e.clientY + " " + leftEye.y + " " + leftEyeYOffset + " big change towards right");    
  }

  //console.log(rightEyeXOffset + " " + finalRightEyeXOffset);
  document.getElementById("rightEye").style.transform = "translate(" + finalRightEyeXOffset + "px, " + finalRightEyeYOffset + "px)";
  document.getElementById("leftEye").style.transform = "translate(" + finalLeftEyeXOffset + "px, " + finalLeftEyeYOffset + "px)";
 
 
  /*if(e.clientX > rightEye.x) {
    e.clientX - 5 > rightEye.X ? document.getElementById("rightEye").style.transform = "translate(" + e.clientX - rightEye.x + "px, 0px)" : document.getElementById("rightEye").style.transform = "translate(" + 5 + "px, 0px)";
    //document.getElementById("rightEye").style.transform = "translate(" + number + "px, 0px)";
  }
  console.log("mouse location:", e.clientX + " and " + rightEye.x);
  console.log(document.getElementById("rightEye").getBoundingClientRect()); */
};

function unSmile() {
  document.getElementById("smile").setAttribute('d','M 124.934 237.689 Q 153.613 249.626 174.083 228.508')
  document.getElementById("smile").style.transform = "translate(0px, 0px) scale(1, 1) rotate(0deg)";
  document.getElementById("smile").style.fill = "transparent";
}

function smile() {
  document.getElementById("smile").style.transform = "translate(24px, 0px) scale(1.5, 1) rotate(10deg)";
}

function oMouth() {
  console.log("TYPING!");
  //document.getElementById("smile").style.transform = "translate(8px, 82px) scale(0.5, 0.1) rotate(10deg)";
  console.log(document.getElementById("smile").getAttribute('d'));
  document.getElementById("smile").setAttribute("d","M 134.5 238 C 134.5 232.481 141.445 228 150 228 C 158.555 228 165.5 232.481 165.5 238 C 165.5 243.519 158.555 248 150 248 C 141.445 248 134.5 243.519 134.5 238 Z");
  document.getElementById("smile").style.fill = "white";
}
    </script>
</body>
</html>