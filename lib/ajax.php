<?php
include("../funciones.php");

$db = new Mysql_Connect();
$db->selectDB();

// Añadiendo una ciudad
if(empty($_POST['city']) || strlen($_POST['city']) < 3){
    //$return = FALSE;
    $return = "PRIMER IF";
}
else{
    $addCity = new City();
    $delSpaces = new Common();
    $return = $addCity->newCity($delSpaces->deleteSpaces(htmlentities($_POST['city'])));
}

echo $return;

?>