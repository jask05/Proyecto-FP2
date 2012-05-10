<?php

//print_r($_SERVER);

echo $_SERVER['HTTP_HOST'] . " - " . $_SERVER['DOCUMENT_ROOT'];

echo "<br><br><br>" . dirname(__file__);

/*
$path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";
$replace = explode($path, $_SERVER['SCRIPT_NAME']);
$dir = $replace[1];
*/
echo "<br><br>";
if($_SERVER["SERVER_NAME"] == "localhost")
{
    $path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";
    $replace = explode($path, dirname(__file__));
    $dir = $replace[count($replace)-1];
    //echo $dir;
    
    $quito1 = explode($_SERVER['DOCUMENT_ROOT'], dirname(__FILE__));
    
    echo "http://" . $_SERVER["SERVER_NAME"] . $quito1[1];
}
else
{
    $dir = "http://" . $_SERVER["SERVER_NAME"];
}




?>