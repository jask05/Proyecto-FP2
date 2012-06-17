<?php
session_cache_limiter("nocache,private");
session_start();

include("funciones.php");

if(empty($_SESSION["logueo"]) && $_SESSION["logueo"] != TRUE){
    header("Location: " . __URL__ . "/login.php");
}

// BD
$conexion = new Mysql_Connect();
$conexion->selectDB();

// Asociación de Parámetros
$user 	= $_SESSION["usuario"];
$id	= $_SESSION["usuarioID"];
$permiso= $_SESSION["permiso"];
$seccion = @$_GET["d"];
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Seguia - Gestión de Inventariado</title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<?php
    $template = new Template();
    echo $template->loadCSS();
    echo $template->loadJS();
?>
<meta charset="UTF-8"></head>
<body>
<!--Header-->
<header>
    <!--Logo-->
    <div id="logo"><a href="#"><img src="./images/logo.png" alt="" /></a></div>
    <!--Search
    <div class="header_search">
        <form action="">
            <input type="text" name="search" placeholder="Buscar" id="ac">
            <input type="submit" value="">
        </form>
    </div>
    -->
</header>
<!--Dreamworks Container-->
<div id="dreamworks_container">
    <!--Primary Navigation-->
<?php
    include("pages/primary-nav.php");
?>	
<!--Main Content-->
<section id="main_content">
<?php
    include("pages/secondary-nav.php");
?>
<!--Content Wrap-->
<?php
    // Contenido a Incluir    
    switch($seccion)
    {	
	case "stock":
	    include("pages/inventario/index.php");
	    exit;
	    
	case "report":
	    include("pages/reporte/index.php");
	    exit;
	
	case "admin":
	    include("pages/admin/index.php");
	    exit;
    }
?>
</section>

</div>

</body>
</html>