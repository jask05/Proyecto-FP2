<?php
/** El nombre de tu base de datos de WordPress */
define("DB_NAME", "proyecto_fp2");

/** Tu nombre de usuario de MySQL */
define("DB_USER", "root");

/** Tu contraseña de MySQL */
define("DB_PASSWORD", "jask");

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define("DB_HOST", "localhost");

/**
 *
 * Los siguientes parámetros NO SE DEBEN MODIFICAR
 * a no ser que se conozca con exactitud
 * lo que se está realizando.
 * Puede afectar a la integridad del sitio.
 *
 **/

/** Directorio de las librerías Javascript */
define("JS", "js/");

/** Directorio de las hojas de estilo CSS */
define("CSS", "css/");

// Comprueba si es una IP
function isIpaddr ($ipaddr){
    if(filter_var($ipaddr, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return true;
    }
    else{
        return false;
    }
}

/** URL de la web **/
if(!defined("__URL__"))
{
    if($_SERVER["SERVER_NAME"] == "localhost" || isIpaddr($_SERVER["SERVER_NAME"])){
        $path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";       
	$replace = explode($path, dirname(__FILE__));
	$countReplace = count($replace);
	$dir = "http://" . $_SERVER["SERVER_NAME"] . "/" . $replace[$countReplace-1];
        
        define("__MAINFOLDER__", $replace[$countReplace-1]);
    }
    else
    {
        $dir = "http://" . $_SERVER["SERVER_NAME"];
        define("__MAINFOLDER__", "");
    }
	
    define("__URL__", $dir);
}

?>
