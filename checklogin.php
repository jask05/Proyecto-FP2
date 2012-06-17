<?php
	session_start();
    
	// Conexión con la BD
	include("funciones.php");
  
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    if(!empty($user) && !empty($pass))
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
		    
		    header("Location: " . __URL__ . "/index.php?d=stock");
		}
		else{
		    // Fallo en el login
		    header("Location: " . __URL__ . "/login.php?loginfail=true");
		}
    }
    else{
		unset($_SESSION);
		header("Location: " . __URL__ . "/login.php");
    }

    $template = new Template();
    //$css = array("reset", "main", "typography", "tipsy");
    echo $template->loadCSS();
    echo $template->loadJS();

?>
