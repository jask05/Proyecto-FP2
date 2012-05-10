<?php
    session_start();
    
    // Conexión con la BD
    include("lib/funciones.php");
    
    if(isset($_POST["user"]))
    {
	$conexion = new Mysql_Connect();
	$conexion->selectDB();
	
	// Query para comprobar si existe o no el usuario
	$usuario = new User();
	
	$comprueba = mysql_query($usuario->checkUser($_POST['user'], $_POST['pass']));
		
	if(mysql_num_rows($comprueba) === 1)
	{
	    $_SESSION["usuario"] = $_POST["user"];
	    $_SESSION["logueo"] = TRUE;
	    header("location: index.php");
	}
	else
	{
	    // Definimos una cookie para que el cartel no dure más de 10 segundos
	    $_SESSION["logueofail"] = TRUE;
	    header("Location: login.php?loginfail=true");
	    //var_dump($_SESSION["logueofail"]);
	}
    }
    else
    {
	//header("Location: login.php");
	echo "<h2>No se ha pasado el post user.</h2>";
    }
?>