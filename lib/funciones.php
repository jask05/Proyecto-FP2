<?php

// DEFINES //

# Cambia el PATH (dependiendo si se usa Windows o Linux)
# y obtiene el nombre del directorio.
if(!defined("__PROYECTO__"))
{
	$path = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") ? "\\" : "/";
	$replace = explode($path, dirname(__FILE__));
	$dir = $replace[count($replace)-2];
	define("__PROYECTO__", $dir);
}

if(!defined("__URL__"))
{
	$url = "http://" . $_SERVER['SERVER_NAME'] . "/" . __PROYECTO__;
	define("__URL__", $url);
}

class Template{

	public function loadCSS()
	{
		$this->load = "<!--Stylesheets-->
		<link rel='stylesheet' href='". __URL__ . "/css/reset.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/main.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/typography.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/tipsy.css' />
		<link rel='stylesheet' href='". __URL__ . "/js/cl_editor/jquery.cleditor.css' />
		<link rel='stylesheet' href='". __URL__ . "/uploadify/uploadify.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/jquery.ui.all.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/fullcalendar.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/bootstrap.css' />
		<link rel='stylesheet' href='". __URL__ . "/js/fancybox/jquery.fancybox-1.3.4.css' />
		<link rel='stylesheet' href='". __URL__ . "/css/highlight.css' />";

		return $this->load;		
	}

	public function loadJS()
	{
		$this->load = "\n
		<!--[if lt IE 9]>
			<script src='". __URL__ . "/js/html5.js'></script>
		<![endif]-->
		<!--Javascript-->
		<script type='text/javascript' src='". __URL__ . "/js/jquery.min.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/js/highcharts.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/js/exporting.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.quicksand.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.easing.1.3.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.tipsy.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/js/cl_editor/jquery.cleditor.min.js'> </script>
		<script type='text/javascript' src='". __URL__ . "/uploadify/swfobject.js'></script>
		<script type='text/javascript' src='". __URL__ . "/uploadify/jquery.uploadify.v2.1.4.min.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.autogrowtextarea.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/form_elements.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.core.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.widget.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.mouse.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.slider.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.progressbar.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.datepicker.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/jquery.ui.tabs.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/fullcalendar.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/gcal.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/bootstrap-modal.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/fancybox/jquery.fancybox-1.3.4.pack.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/fancybox/jquery.mousewheel-3.0.4.pack.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/highlight.js'></script>
		<script type='text/javascript' src='". __URL__ . "/js/main.js'> </script>";

		return $this->load;
	}

}


class Query{
	
	private $table = array();
	private $statement = array();
	private $where = array();
	
	public function conection($host_db, $user_db, $pass_db, $name_db, $prefix = "")
	{
		//require_once("config.php");
		
		$this->host = $host_db;
		$this->user = $user_db;
		$this->pass = $pass_db;
		$this->namedb = $name_db;
		$this->prefix = $prefix;
		
		$this->conection = mysql_connect($this->host, $this->user, $this->pass)or die("<h2>Problemas en la conexión de la base de datos.</h2>");
		return mysql_select_db($this->namedb, $this->conection)or die("<h2>Error al seleccionar la base de datos.</h2>");
	}
	
	public function sentences($tabla, $sentencia, $cuando = "")
	{
		$this->table[] = $tabla;
		$this->statement[] = $sentencia;
		$this->where[] = $cuando;
		
		
	}
	
	
}

class User{
	
	private $id;
	private $user;
	
	public function getInfoUser($ide, $us)
	{
		$this->id = $ide;
		$this->user = $us;
		
	}

	public function changeInfoUser()
	{

	}

	public function checkUser()
	{
	}

	public function newUser()
	{

	}

	public function editUser()
	{

	}

	public function promoteUser()
	{

	}

	public function deleteUser()
	{

	}

	public function banUser()
	{

	}
}

?>