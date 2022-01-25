<?php

function comprobar_manager($nombre, $clave) {
    if($nombre === "manager" and $clave === "1234") {
        $usu['nombre'] = "manager";
        $usu['rol'] = 0;
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
      $usu['rol'] = 0;
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
  </head>

  <body>
    <?php if(isset($_GET["redirigido"])) {
      echo "<p>Haga login para continuar <p>";
    }?>
    <?php if(isset($err) and $err == true) {
      echo "<p>Revise usuario y contraseña <p>";
    }?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      Usuario
      <input value="<?php if(isset($usuario)) echo $usuario;?>" id="usuario" name="usuario" type="text"><br><br>
      Clave
      <input value="<?php if(isset($clave)) echo $clave;?>" id="clave" name="clave" type="password"><br><br>
      <input type="submit">
    </form>
  </body>

</html>