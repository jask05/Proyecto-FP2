<?php
    session_start();
    
    // Conexión con la BD
    include("lib/funciones.php");
    
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    if(@!empty($user) && @!empty($pass))
    {
	$conexion = new Mysql_Connect();
	$conexion->selectDB();
	
	// Query para comprobar si existe o no el usuario
	$usuario = new User();
	
	$comprueba = mysql_query($usuario->checkUser($user, $pass));
	
	if(mysql_num_rows($comprueba) === 1)
	{
	    $_SESSION["usuario"] = $user;
	    $_SESSION["logueo"] = TRUE;
	    header("location: index.php");
	}
	else
	{
	    // Definimos una cookie para que el cartel no dure más de 10 segundos
	    $_SESSION["logueofail"] = TRUE;
	    //header("Location: login.php?loginfail=true");
	    header("Location: login.php");
	    //var_dump($_SESSION["logueofail"]);
	}
    }
    else
    {
	unset($_SESSION);
	header("Location: login.php");
	//echo "<h2>No se ha pasado el post user.</h2>";
    }
?>