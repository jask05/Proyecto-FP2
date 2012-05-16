<?php
session_start();

include("lib/funciones.php");

session_unset($_SESSION);
session_destroy();

header("Location: " . __URL__ . "/login.php");
?>