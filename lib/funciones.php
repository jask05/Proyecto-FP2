<?php
// CONFIG DE LA BD //
require_once("config.php");

class Common{
	private $url;
	
	public function setImage($ur, $al, $tit)
	{
		$this->url = $ur;
		$this->alt = $al;
		$this->title = $tit;
		
		$this->rs = "<img src='" . $this->url . "' alt='" . $this->alt ."' title='" . $this->title ."' />";
		return $this->rs;
	}
	
}

class Template{


    public function loadCSS()
    {
	    $this->load = "<!--Stylesheets--> \n
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

    
    /**
    * Imprime el código javascrip para cargar las librerías
    *
    * @return string
    */
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
	    <script type='text/javascript' src='". __URL__ . "/js/main.js'> </script>
	    <script type='text/javascript' src='". __URL__ . "/js/ajax.js'> </script>";
	    
	    return $this->load;
    }

    /*
     <div class="msgbar msg_Info hide_onC">
	<span class="iconsweet">*</span><p>This is a Information message.</p>
    </div>
    <div class="msgbar msg_Success hide_onC">
	<span class="iconsweet">=</span><p>This is a Success message.</p>
    </div>  
    <div class="msgbar msg_Error hide_onC">
	<span class="iconsweet">X</span><p>This is a Error message.</p>
    </div>      
    <div class="msgbar msg_Alert hide_onC">
	<span class="iconsweet">!</span><p>This is a Warning message.</p>
    </div> 
    */
    
    /**
    * Muestra un cartel según se le vayan pasando diferentes parámetros
    *
    * @par array
    * 	[0] = Class name -> msg_Info, msg_Success, msg_Error, msg_Alert
    * 	[1] = icon (* Information, = Success, X Error, ! Warning)
    * 	[2] = notice text
    * @return html string
    */
    public function notice($par)
    {
	$this->parametros = $par;
	$this->html = "
	<div class='msgbar " . $this->parametros[0] . " hide_onC'>
	    <span class='iconsweet'>" . $this->parametros[1] . "</span><p>" . $this->parametros[2] . "</p>
	</div>";
	
	return $this->html;
    }
    
    /*
     array de primary-nav.php
     Falta por terminar
    
    public function primaryNav()
    {
	$li = array(
	    0 => array("nav_dashboard", "", "Inicio", 0),
	    1 => array("nav_graphs", "stock", "Invertario", 0),
	    2 => array("nav_uielements", "report", "Reporte", 0),
	    3 => array("nav_pages", "admin", "Administración", 1)
	);
	
	foreach($li as $clave => $valor)
	{
	    foreach($valor as $c2 => $v2)
	    {
		echo $valor . ": " . $c2 . " --> " . $v2 . "<br>";
	    }
	}
	
    }
    
    public function secondaryNav($h2title, $url, $cssClass)
    {
	
    }
	
    */
}



class Mysql_Connect{
	
	/**
	* Realiza la conexión a la base de datos
	*
	* @return array
	*/
	public function connect()
	{
	    $this->conection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("<h1>No se pudo realizar la conexión a la BD.</h1>");
	    return $this->conection;
	}
	
	public function selectDB()
	{
	    $this->select_db = mysql_select_db(DB_NAME, $this->connect())or die("<h1>Error al seleccionar la base de datos.</h1>");
	    return $this->select_db;
	}
}

class Query extends Mysql_Connect{
	
	private $table = array();
	private $statement = array();
	private $where = array();

	public function select($tabla, $sentencia, $cuando = "")
	{

	}
	
	public function update()
	{
		
	}
	
	public function insert()
	{
		
	}
	
	public function delete()
	{
		
	}
	
	public function drop()
	{
		
	}
	
	
}




class User extends Mysql_Connect{
	
	private $id;
	private $user;
	
	/*
	public function getInfoUser($ide = "", $us = "", $lim = "", $orden = "")
	{
		$this->id = $ide;
		$this->user = $us;
		$this->limit = $lim;
		$this->order = $orden;

		$this->sentencia = "SELECT *
				    FROM user ";
				    
		if(!empty($this->id) || !empty($this->user))
		{
		    $this->sentencia .= (is_numeric($this->id)) ? "WHERE nID = " . $this->id : "WHERE cNick = '" . $this->user . "'";
		}
		
		if(isset($this->order) && $this->order != "")
		{
		    $this->sentencia .= " ORDER BY " . $this->order[0] . " " . $this->order[1] . " ";
		}
		
		if(isset($this->limit) && is_numeric($this->limit))
		{
		    $this->sentencia .= "LIMIT " . $this->limit;
		}

		//return mysql_query($this->sentencia);
		return $this->sentencia;
	}
	*/
	
	public function getAllInfoUser($param)
	{
	    $this->parametros = $param;
	    $this->sentencia = "SELECT *
			      FROM user
			      ORDER BY " . $this->parametros[0] . " " . $this->parametros[1] . " ";
			      
	    if(is_numeric($this->parametros[2]) && !empty($this->parametros[2]))
	    {
		$this->sentencia .= "LIMIT " . $this->parametros[2];
	    }
	    
	    return mysql_query($this->sentencia);
	    //return $this->sentencia;
	}

	public function changeInfoUser()
	{

	}

	/**
	* Comprueba si existe un usuario. De ser así devuelve su ID y su permiso
	*
	* @ string $us
	* @ string $con (optional)
	* @ return mysql array
	*/
	public function checkUser($us, $con = "")
	{
		$this->user = $us;
		$this->pass = $con;
		
		$this->sentencia = "SELECT nID, bPermission
				    FROM user
				    WHERE cNick = '" . mysql_real_escape_string(trim($this->user)) ."'";
				    
		if(isset($this->pass) AND !empty($this->pass))
		{
		    $this->sentencia .= " AND cPass = '" . mysql_real_escape_string(md5($this->pass)) . "'";   
		}
				    
				    
		return mysql_query($this->sentencia);
		//return $this->sentencia;
				    
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