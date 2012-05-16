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
	$comprueba = $usuario->checkUser($user, $pass);
	
	if(mysql_num_rows($comprueba) === 1)
	{
	    $datos = mysql_fetch_array($comprueba);
	    
	    $_SESSION["usuario"] = $user;			// Nick del Usuario
	    $_SESSION["usuarioID"] = $datos["nID"];		// ID en la BD
	    $_SESSION["permiso"] = $datos["bPermission"];	// Permiso Admin (1) o No (0)
	    $_SESSION["logueo"] = TRUE;				// Logueo correcto
	    
	    header("location: index.php");
	}
	else
	{
	    // Fallo en el login
	    header("Location: login.php?loginfail=true");
	}
    }
    else
    {
	unset($_SESSION);
	header("Location: login.php");
	//echo "<h2>No se ha pasado el post user.</h2>";
    }
?>