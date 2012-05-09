<?php
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'proyecto_fp2');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'jaskito');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Cambia el PATH (dependiendo si se usa Windows o Linux) y obtiene el nombre del directorio. **/
if(!defined("__PROYECTO__"))
{
	$path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";
	$replace = explode($path, dirname(__FILE__));
	$dir = $replace[count($replace)-1];
	define("__PROYECTO__", $dir);
}

/** URL de la web **/
if(!defined("__URL__"))
{
	$url = "http://" . $_SERVER['SERVER_NAME'] . "/" . __PROYECTO__;
	define("__URL__", $url);
}

/** Ruta absoluta del directorio raíz **/
if(!defined("__RAIZ__"))
{
    define("__RAIZ__", $_SERVER['DOCUMENT_ROOT'] . "/" . __PROYECTO__);
}

?>