<?php
include("../lib/funciones.php");
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Error con la base de datos</title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<?php   
    $template = new Template();
    //$css = array("reset", "main", "typography", "tipsy");
    echo $template->loadCSS();
    echo $template->loadJS();
?>
<meta charset="UTF-8"></head>
<body>
<!--Dreamworks Container-->
<div id="dreamworks_container">
  <div class="error_pages error_full_page"> <span class="iconsweet">s</span>
    <h1>Site Offline</h1>
    <p> We are trying to fix something! <br />
      Don't worry... check back soon! </p>
    <a href="./index.html" class="redishBtn button_small" style="margin:5px;">Back to Dashboard</a> </div>
</div>
</body>
</html>