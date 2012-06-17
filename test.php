<?php
// Comprueba si es una IP

if(filter_var($_SERVER['SERVER_NAME'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
  echo "it's valid";
}
else {
  echo "it's not valid";
}

/** URL de la web **/
if(!defined("__URL__"))
{
    if($_SERVER["SERVER_NAME"] == "localhost"){
        $path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";       
	$replace = explode($path, dirname(__FILE__));
	$countReplace = count($replace);
	$dir = "http://" . $_SERVER["SERVER_NAME"] . "/" . $replace[$countReplace-1];
    }
    else
    {
        $dir = "http://" . $_SERVER["SERVER_NAME"];
    }
	
    define("__URL__", $dir);
}

echo __URL__;

?>