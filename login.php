<?php
    include("lib/funciones.php");
    echo __PROYECTO__;
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Dreamworks - Responsive admin template</title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<?php
    $template = new Template();
    echo $template->loadCSS();
    echo $template->loadJS();
?>
<meta charset="UTF-8">
</head>


<body id="login_container">
<!--Dreamworks Container-->
<div id="dreamworks_container">

	<div id="login">
    	<img src="./images/logo_login.png" />
        <form action="index.php" method="post">
        	<div class="input_box"> <span class="iconsweet">a</span><input placeholder="Usuario" name="user" type="text" id="username"></div>
            <div class="input_box"> <span class="iconsweet">y</span><input placeholder="Contraseña" name="pass" type="password" id="password"></div>
            <!-- <div> <a class="forgot_password" href="#">Have you forgotten your password?</a> <input name="" type="submit" value="Login"></div> -->
            <div><input name="" type="submit" value="Entrar"></div>
        </form>
    </div>
</div>

</body>
</html>
