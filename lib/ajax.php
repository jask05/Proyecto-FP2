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

// Actualizando Nombre de Usuario
if(isset($_POST['changeusername'])){
    $changeusername = $_POST['changeusername'];
    $id = $_POST['id'];
    $changeUser = new User();
    
    // Comprueba que el usuario no exista
    $check = mysql_num_rows($changeUser->checkUser($changeusername));
    if($check == 0){
        $return = $changeUser->editUser("nick", $id, $changeusername);
    }
    else{
        $return = "error";
    }   
}

// Actualiza contraseña de Usuario
if(isset($_POST['newpasswd'], $_POST['userid'])){
    $newpasswd = $_POST['newpasswd'];
    $userid = $_POST['userid'];
    $newPass = new User();
    $return = $newPass->changePasswd($userid, $newpasswd);
}


// Cambia de permisos a un usuario
if(isset($_POST['changeperm'])){
    $perm = $_POST['changeperm'];
    $userid = $_POST['id'];
    $changePerm = new User();
    $return = $changePerm->changePermUser($userid, $perm);
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

// Modifica la ciudad del usuario, añadiendo o quitando
if(isset($_POST['changecity']) && isset($_POST['userid'])){
    $userID = $_POST['userid'];
    $cityID = $_POST['changecity'];
    
    $change = new City();
    $return = $change->changeUserCity($userID, $cityID);
}

echo $return;

?>