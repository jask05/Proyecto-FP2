<?php
	session_start();
	session_cache_limiter('nocache,private'); 
	//var_dump($_SESSION["logueofail"]);

	/*
	$logueoFail = $_SESSION["logueofail"];
	$logueo = $_SESSION["logueo"];
	$usuario = $_SESSION["usuario"];
	
	if(@!empty($logueo) && @!empty($usuario))
	{
		header("Location: index.php");
	}
	else
	{
	*/    
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Dreamworks - Responsive admin template</title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<?php
    include("lib/funciones.php");
    
    $template = new Template();
    echo $template->loadCSS();
    echo $template->loadJS();
?>
<meta charset="UTF-8">
</head>


<body id="login_container">
<!--Container-->
<div id="dreamworks_container">

	<div id="login">
    	<img src="images/logo_login.png" />
        <form method="post" name="login" action="checklogin.php">
			<div class="input_box">
			<span class="iconsweet">a</span>
			<input type="text" placeholder="Usuario" name="user" id="username" required>
	    </div>
        
		<div class="input_box">
			<span class="iconsweet">y</span>
			<input type="password" placeholder="Contraseña" name="pass" id="password" required>
	    </div>
<?php
		if(!empty($_GET["loginfail"])):
?>
			<div style="color:red;">Usuario o Contraseña incorrectos</div>
<?php
		endif;
?>
			<!-- <div> <a class="forgot_password" href="#">Have you forgotten your password?</a> <input name="" type="submit" value="Login"></div> -->
        <div>
			<input type="submit" value="Entrar">
	    </div>
        </form>
    </div>
</div>

</body>
</html>
<?php
//}
?>