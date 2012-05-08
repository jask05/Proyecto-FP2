<?php

// DEFINES
if(!defined(__PROYECTO__))
{
	$replace = explode("/", dirname(__FILE__));
	$count = count($replace)-2;
	define("__PROYECTO__", $replace[$count]);
}

if(!defined(__URL__))
{
	$url = "http://" . $_SERVER['SERVER_NAME'] . "/" . __PROYECTO__;
	define("__URL__", $url);
}

class Template{

	public function loadCSS()
	{
		$this->load = "<link rel='stylesheet' href='". __URL__ . "/css/reset.css' />
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
		$this->load = "\n <!--[if lt IE 9]>
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

class User{
	
	public function getInfoUser($nick, $email)
	{

	}

	public function changeInfoUser()
	{

	}

	public function checkUser($nick, $pass, $email = '')
	{
		$this->user = $nick;
		$this->pass = $pass;
		$this->email = $email;
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