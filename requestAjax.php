<?php
include("lib/funciones.php");

$user = $_POST["usuario"];
$pass = $_POST["contrasena"];

if(isset($user, $pass)){
    $conexion = new Mysql_Connect();
    $conexion->selectDB();
    
    // Query para comprobar si existe o no el usuario
    $usuario = new User();
    
    $comprueba = mysql_query($usuario->checkUser($user, $pass));
    $numrow = mysql_num_rows($comprueba);
    
    if($numrow == 1) {
        echo $jsondata['mensaje'] = header("Location: index.php");
    }else{
        echo $jsondata['mensaje'] = "Usuario o Contraseña incorrectos";
    }
}

?>