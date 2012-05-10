<?php
/** El nombre de tu base de datos de WordPress */
define("DB_NAME", "proyecto_fp2");

/** Tu nombre de usuario de MySQL */
define("DB_USER", "root");

/** Tu contraseña de MySQL */
define("DB_PASSWORD", "jaskito");

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

/** URL de la web **/
if(!defined("__URL__"))
{
    if($_SERVER["SERVER_NAME"] == "localhost"){
        $path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";       
        $replace = explode($_SERVER['DOCUMENT_ROOT'], dirname(__FILE__));
        $dir = "http://" . $_SERVER["SERVER_NAME"] . $replace[1];
    }
    else
    {
        $dir = "http://" . $_SERVER["SERVER_NAME"];
    }
	
    define("__URL__", $dir);
}


/** Cambia el PATH (dependiendo si se usa Windows o Linux) y obtiene el nombre del directorio. 
if(!defined("__PROYECTO__"))
{
    if($_SERVER["SERVER_NAME"] == "localhost"){
        $path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";
        $replace = explode($path, dirname(__file__));
        $dir = $replace[count($replace)-1];
    
        $quito1 = explode($_SERVER['DOCUMENT_ROOT'], dirname(__FILE__));
    
        $dir = "http://" . $_SERVER["SERVER_NAME"] . $quito1[1];
    }
    else
    {
        $dir = "http://" . $_SERVER["SERVER_NAME"];
    }
}
**/


/** Ruta absoluta del directorio raíz 
if(!defined("__RAIZ__"))
{
    define("__RAIZ__", $_SERVER['DOCUMENT_ROOT'] . "/" . __PROYECTO__);
}
**/
?>