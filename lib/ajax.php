<?php
include("../funciones.php");

$db = new Mysql_Connect();
$db->selectDB();

// Añadiendo una ciudad
if(empty($_POST['newCity']) || strlen($_POST['newCity']) < 3){
    $return = FALSE;
    //$return = "PRIMER IF";
}
else{
    $addCity = new City();
    $delSpaces = new Common();
    $return = $addCity->newCity($delSpaces->deleteSpaces(htmlentities($_POST['newCity'])));
}

// Añadiendo al usuario
if(isset($_POST['newUser']) == 1){
    
    $newUser = new User();
    
    $user = trim($_POST['nick']);
    $password = md5(trim($_POST['pass']));
    $city = trim($_POST['city']);
    $admin = $_POST['admin'];
    
    $return = $newUser->newUser($user, $password, $admin,  $city);
    
}

echo $return;

?>