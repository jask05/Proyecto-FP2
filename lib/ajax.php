<?php
include("../funciones.php");

$db = new Mysql_Connect();
$db->selectDB();

// Añadiendo una ciudad
if(isset($_POST['newCity'])){
    $newCityName = $_POST['newCityName'];
    $addCity = new City();
    $delSpaces = new Common();
    $cityParseada = $delSpaces->deleteSpaces(htmlentities($newCityName));
    if($addCity->newCity($cityParseada)){
        $return = TRUE;
    }
    else{
        $return = FALSE;
    }
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

// Borrando Usuario

if(isset($_POST['delUser']) && is_numeric($_POST['delUser'])){
    $delUser = $_POST['delUser'];
    $byeUser = new User();
    if($byeUser->deleteUser($delUser)){
        $return = TRUE;
    }
    else{
        $return = FALSE;
    }
}

echo $return;

?>