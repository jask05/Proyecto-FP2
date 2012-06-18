<?php
session_start();

include("funciones.php");

if(@!empty($_SESSION["logueo"]) && $_SESSION["logueo"] === TRUE)
{
    header("Location: " . __URL__ . "/index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Dreamworks - Responsive admin template</title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<?php   
    $template = new Template();
    //$css = array("reset", "main", "typography", "tipsy");
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
	    <!--
	    <div>
		<a class="forgot_password" href="#">Have you forgotten your password?</a>
		<input name="" type="submit" value="Login">
	    </div>
	    -->
	    <div>
	    <?php
	    if(isset($_GET["loginfail"]) == TRUE):
		$content = array("msg_Error", "X", "Usuario o Contraseña Incorrectos");
		echo $template->notice($content);
	    ?>
	    <?php
	    endif;
	    ?>
		<input type="submit" value="Entrar" id="entrar">
	    </div>
        </form>
    </div>
</div>

</body>
</html>
<?php
//}
?>