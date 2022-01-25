<?php

function comprobar_manager($nombre, $clave) {
    if($nombre === "manager" and $clave === "1234") {
        $usu['nombre'] = "manager";
        // $usu['rol'] = 0;
        return $usu;
    }
    else return FALSE;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $usu = comprobar_manager($_POST['usuario'], $_POST['clave']);
 if($usu==FALSE) {
     $err = TRUE;
     $usuario = $_POST['usuario'];
 }else{
     session_start();
     $_SESSION['usuario'] = $_POST['usuario'];
     header("Location:manager/clients.php");
 }
}

function comprobar_employee($nombre, $clave) {
  if($nombre === "employee" and $clave === "1234") {
      $usu['nombre'] = "employee";
      // $usu['rol'] = 0;
      return $usu;
  }
  else return FALSE;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usu = comprobar_employee($_POST['usuario'], $_POST['clave']);
if($usu==FALSE) {
   $err = TRUE;
   $usuario = $_POST['usuario'];
}else{
   session_start();
   $_SESSION['usuario'] = $_POST['usuario'];
   header("Location:employee/tasks.php");
}
}
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Formulario de login</title>
    <meta charset = "UTF-8">
    <style>
      body{
        background-color: #DFFBF3;
      }
      .container{
        background-color: #ABCDC4;
        position: absolute;
        top: 30vh;
        left: 35%;
        right:35%;
        width: 30%;
        height: 30vh;
        border: 5px solid black;
        border-radius: 20%;
        justify-content: center;
        align-items: center;
      }
      .campo{
        width: 25%;
        height: 20%;
        margin-left:30%;
        margin-top: 5%;
        font-size: 1.2em;
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <?php if(isset($_GET["redirigido"])) {
      echo "<p>Haga login para continuar <p>";
    }?>
    <?php if(isset($err) and $err == true) {
      echo "<p>Revise usuario y contraseña <p>";
    }?>
    <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <div class="campo">
        <label for="usuario">Usuario</label>
        <input value="<?php if(isset($usuario)) echo $usuario;?>" id="usuario" name="usuario" type="text"><br><br>
      </div>
      <div class="campo">
        <label for="clave">Clave</label>
        <input value="<?php if(isset($clave)) echo $clave;?>" id="clave" name="clave" type="password"><br><br>
      </div>
      <div class="campo"><input type="submit"></div>
    </form>
  </body>

</html>