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
	
	/**
	* Borra los espacios en blanco del comienzo, fin y entre medias de la palabra.	
	*
	* @return string
	*/
	public function deleteSpaces($nom){
	       $this->nombre = $nom;
	       return str_replace(" ", "", trim($this->nombre));
	}
	
	/* Convierte la cadena a minúscula */
	public function toLowerCase($nom){
	       $this->nombre = $nom;
	       return mb_strtolower($this->nombre);
	}
	/* Borra acentos y contenido 'raro' */
	public function deleteSpecialChars($nom){
	       $this->nombre = $nom;
		
	       $this->nombre = $this->toLowerCase($this->nombre);
     
	       $this->nombre = htmlentities($this->nombre, ENT_QUOTES, 'UTF-8');
	       $this->patron = array (
		      // puntos y comas por guion
		      '/[\,`:]+/' => '-',
	       
		      // Vocales
		      '/&agrave;/' => 'a',
		      '/&egrave;/' => 'e',
		      '/&igrave;/' => 'i',
		      '/&ograve;/' => 'o',
		      '/&ugrave;/' => 'u',
	       
		      '/&aacute;/' => 'a',
		      '/&eacute;/' => 'e',
		      '/&iacute;/' => 'i',
		      '/&oacute;/' => 'o',
		      '/&uacute;/' => 'u',
	       
		      '/&acirc;/' => 'a',
		      '/&ecirc;/' => 'e',
		      '/&icirc;/' => 'i',
		      '/&ocirc;/' => 'o',
		      '/&ucirc;/' => 'u',
	       
		      '/&atilde;/' => 'a',
		      '/&etilde;/' => 'e',
		      '/&itilde;/' => 'i',
		      '/&otilde;/' => 'o',
		      '/&utilde;/' => 'u',
	       
		      '/&auml;/' => 'a',
		      '/&euml;/' => 'e',
		      '/&iuml;/' => 'i',
		      '/&ouml;/' => 'o',
		      '/&uuml;/' => 'u',
	       
		      '/&auml;/' => 'a',
		      '/&euml;/' => 'e',
		      '/&iuml;/' => 'i',
		      '/&ouml;/' => 'o',
		      '/&uuml;/' => 'u',
		      
		      '/&#225;/' => 'a',
	       
		      // Otras letras y caracteres especiales
		      '/&aring;/' => 'a',
		      '/&ntilde;/' => 'n',
	       
		      // Agregar aqui mas caracteres si es necesario
	       
	       );
	       
	       $this->nombre = preg_replace(array_keys($this->patron),array_values($this->patron),$this->nombre);
	       return $this->nombre;
	}
	
	/* Utiliza los 3 métodos para cambiar el nombre que se le pase añadiendo tiempo unix para hacer el nombre único.*/
	public function imageProcess($nom){
	       $this->nombre = $nom;
	       $this->nombre = $this->deleteSpaces($this->nombre);
	       $this->nombre = $this->toLowerCase($this->nombre);
	       $this->nombre = $this->deleteSpecialChars($this->nombre);
	       $this->nombre = date('U') . "-" . $this->nombre;
	       return $this->nombre;
	}
	
	
	/**
	* Hace que un campo radio o checkbox esté con la opción 'checked' si existe ese valor en un aray
	*
	* @str		$needle (aguja)
	* @array	$haystack (pajar)
	* @return 	html string
	*/
	public function checkedBox($needle, $haystack){
	    if(in_array($needle, $haystack)){
		return "checked = 'checked'";
	    }
	}
	
	public function changeDate($date){
	    // Cambia de día-mes-año
	    if(!empty($date)){
		$date_xplo = explode("-", $date);
		$rs = $date_xplo[2] ."-".$date_xplo[1]."-".$date_xplo[0];
		return $rs;
	    }
	}
	
}

class Template{

    public function activeMenu($nam){
	$this->name = $nam;
	if($this->name == $_GET['d']){
	    return "active";
	}
    }
    
    
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
    
    public function paintMenuBox($urlCheck, $sections){
	$this->url = $urlCheck;
	$this->section = $sections;
    }
    
    
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

class User extends Mysql_Connect{
	
	private $id;
	private $user;
	
	/**
	* Muestra información de los usuarios.
	* Se le puede pasar parámetros para que ordene o id
	*
	* @ array $param -> [0] (field) and [1] (ASC || DESC) = ORDER BY
	* 		 -> [2] LIMIT
	* @ return mysql array
	*/
	public function getAllInfoUser($param = '', $ide = '')
	{
	    $this->parametros = $param;
	    $this->id = $ide;
	    
	    $this->sentencia = "SELECT * FROM user";
			      
	    if(isset($this->id) && is_numeric($this->id) && $this->id > 0){
		$this->sentencia .= " WHERE nID = " . $this->id ." ";
	    }
	    
	    if(isset($this->parametros) && $this->parametros != ""){
		$this->sentencia .= " ORDER BY " . $this->parametros[0] . " " . $this->parametros[1] . " ";
		
		if(is_numeric($this->parametros[2]) && !empty($this->parametros[2]))
		{
		    $this->sentencia .= "LIMIT " . $this->parametros[2];
		}
	    }
	    
	    return mysql_query($this->sentencia);
	    //return $this->sentencia;
	}

	
	/**
	* Lista las ciudades que pertenecen a un usuario.
	* Si se aplica $onlycityuser solo muestra la relación en la tabla cityuser
	*
	* @ int 	$ide (USER ID)
	* @ bool	$onlycityuser
	* @ return 	mysql array
	*/
	public function getCityUser($ide, $onlycityuser = ""){
	    $this->id = $ide;
	    $this->onlycu = $onlycityuser;
	    if($this->onlycu == 1){
		$this->sentencia = "SELECT nCityID FROM cityuser WHERE nUserID = " . $this->id;
	    }
	    else{
		$this->sentencia = "SELECT city.cName
				    FROM city
				    WHERE city.nID IN (
					SELECT cityuser.nCityID
					FROM cityuser
					WHERE cityuser.nUserID = " . $this->id ."
				    )";			
	    }
	    
	    return mysql_query($this->sentencia);
	    
	}

	/**
	* Comprueba si existe un usuario. De ser así devuelve su ID y su permiso
	*
	* @ string $us
	* @ string $contrasena (optional)
	* @ return mysql array
	*/
	public function checkUser($us, $contrasena = "")
	{
		$this->user = $us;
		$this->pass = $contrasena;
		
		/*
		$this->sentencia = "SELECT nID, bPermission
				    FROM user
				    WHERE cNick = '" . mysql_real_escape_string(trim($this->user)) ."'";
		*/
		$this->sentencia = "SELECT nID, bPermission FROM user ";
		$this->sentencia .= (is_numeric($this->user)) ? "WHERE nID = " . $this->user : "WHERE cNick = '" . mysql_real_escape_string(trim($this->user)) ."'";
		
		
		if(isset($this->pass) AND !empty($this->pass))
		{
		    $this->sentencia .= " AND cPass = '" . mysql_real_escape_string(md5($this->pass)) . "'";   
		}
				    
				    
		return mysql_query($this->sentencia);
		//return $this->sentencia;		    
	}
	
	/**
	* Inserta un nuevo usuario en la BD
	*
	* @ string 	$name
	* @ string 	$pass
	* @ bol 	$admin
	* @ return mysql array
	*/
	public function newUser($name, $pss, $admin, $cty)
	{
	    $this->nick = $name;
	    $this->userPass = $pss;
	    $this->permission = $admin;
	    $this->city = $cty;
	    
	    // Check if user exists
	    $this->checkUser = mysql_num_rows($this->checkUser($this->nick));
	    
	    if($this->checkUser >= 1){
		return FALSE;	// User exists
	    }
	    else{
		$this->sentencia = "INSERT INTO user (cNick, cPass, bPermission) VALUES ('" . $this->nick . "', '" . $this->userPass . "', " . $this->permission . ")";
		
		
		$this->insertUser = mysql_query($this->sentencia)or die(mysql_error());
		$this->insertedUserID = mysql_insert_id();
		$this->sentenciaCityUser = "INSERT INTO cityuser (nCityID, nUserID) VALUES (" . $this->city . ", " . $this->insertedUserID . ")";
		
		if($this->insertedCityUser = mysql_query($this->sentenciaCityUser)){
		    return TRUE;
		}
		else{
		    return FALSE;
		}
	    }
	    
	}
	
	/**
	* Editar el nick, password o permission de un usuario
	*
	* @ string 	$param (nick || pass || perm)
	* @ int 	$ide
	* @ string 	$value
	* @ return mysql array
	*/
	public function editUser($param, $ide, $value)
	{
	    $this->parametros = $param;
	    $this->id = $ide;
	    $this->valor = $value;
	    
	    $this->sentence = "UPDATE user SET ";
	    
	    if($this->parametros == "nick"){
		$this->sentence .= "cNick = '" . $this->valor . "' ";
	    }
	    elseif($this->sentence == "pass"){
		$this->sentence .= "cPass = '" . md5($this->valor) . "' ";
	    }
	    elseif($this->sentence == "perm"){
		$this->sentence .= "bPermission = " . $this->valor . " ";
	    }
	    
	    $this->sentence .= "WHERE nID = " . $this->id;

	    return mysql_query($this->sentence);
	    //return $this->sentence;
	    
	}


	/**
	* Borra un usuario de la BD
	*
	* @ int		$ide
	* @ return TRUE || FALSE 
	*/
	public function deleteUser($ide)
	{
	    $this->id = $ide;
	    $this->sentencia = "DELETE FROM user
				WHERE nID = " . $this->id;
				
	    if(mysql_query($this->sentencia)){
		if($this->deleteCityUser($this->id)){
		    return TRUE;    
		}
		else{
		    return FALSE;
		}
	    }
	    else{
		return FALSE;
	    }
	}

	
	/**
	* Busca un usuario según el valor que se le pasa
	*
	* @ str		$val
	* @ return 	mysql array 
	*/
	public function searchUser($val){
	    $this->value = $val;
	    $this->sentencia = "SELECT * FROM user WHERE cNick LIKE '%$this->value%'";
	    
	    return mysql_query($this->sentencia);
	    //return $this->sentencia;
	}
	
	/**
	* Borra las ciudades que tiene asociada el usuario
	*
	* @ int 	$ideUser
	* @ return TRUE || FALSE
	*/
	private function deleteCityUser($ideUser){
	    $this->idUser = $ideUser;    
	    $this->sentencia = "DELETE FROM cityuser
				WHERE nUserID =" . $this->idUser;
				
	    if(mysql_query($this->sentencia)){
		return TRUE;
	    }
	    else{
		return FALSE;
	    } 
	}
	
	/**
	* Cambia el password de un usuario
	*
	* @ int 	$userIDe
	* @ string	$newPasswd
	* @ return 	TRUE || FALSE
	*/
	public function changePasswd($userIDe, $newPasswd){
	    $this->IDuser = $userIDe;
	    $this->passwd = (strlen($newPasswd) < 16) ? md5($newPasswd) : $newPasswd;
	    
	    $this->sentencia = "UPDATE user SET cPass = '" . $this->passwd . "'
				WHERE nID = " . $this->IDuser;
				
	    return mysql_query($this->sentencia);  
	}
	
	
	/**
	* Cambia de permisos a un usuario.
	*
	* @ int 	$userid
	* @ bool	$val
	* @ return 	TRUE || FALSE
	*/
	public function changePermUser($useride, $val){
	    $this->userID = $useride;
	    $this->value = $val;
	    $this->sentencia = "UPDATE user SET bPermission = " . $this->value  . " WHERE nID = " . $this->userID;
	    return mysql_query($this->sentencia);
	    //return $this->sentencia;
	}
	
	/**
	* Devuelve la cantidad de usuarios creados
	*
	* @ return int
	*/
	public function totalUser(){
	    $this->sentencia = "SELECT nID FROM user";
	    $this->query = mysql_query($this->sentencia);
	    $this->total = mysql_num_rows($this->query);
	    
	    return $this->total;
	}
}

class City extends Mysql_Connect{
	
	private $id;
	private $name;
	
	/**
	* Añade una nueva ciudad a la BD
	*
	* @ string $name
	* @ return TRUE || FALSE
	*/
	public function newCity($nam){
	    $this->name = $nam;
	    
	    // Checking if exist the field
	    $this->check = "SELECT nID
			    FROM city
			    WHERE cName = '" . $this->name . "'";
	    
	    $this->countRow = mysql_query($this->check);
	    
	    if(mysql_num_rows($this->countRow) == 0){
			    
		    // Adding new city name
		    $this->sentencia = "INSERT INTO city (cName) VALUES ('". $this->name ."')";
				    
		    if(mysql_query($this->sentencia)){
			    return TRUE;
		    }
		    else{
			    return FALSE;
		    }
	    }
	    else{
		    return FALSE;
	    }
	}
	
	/**
	* Muestra un listado de todas las ciudades.
	* Se puede filtrar por ID
	*
	* @ int		$ide (Optional)
	* @ return 	mysql array
	*/
	public function showCity($ide = '', $nam = ''){
		
		$this->id = $ide;
		$this->name = $nam;
		
		$this->sentencia = "SELECT nID, cName
				    FROM city";
		
		if(isset($this->id) && is_numeric($this->id)){
		    $this->sentencia .= " WHERE nID = " . $this->id;
		}
		if(!empty($this->name) && is_string($this->name)){
		    $this->sentencia .= " WHERE cName = '" . htmlentities($this->name) . "'";
		}
		
		return mysql_query($this->sentencia);
		//return $this->sentencia;
	}
	
	/**
	* Devuelve la cantidad de ciudades creadas
	*
	* @ return  int
	*/
	public function totalCity(){
	    $this->sentencia = "SELECT nID FROM city";
	    $this->query = mysql_query($this->sentencia);
	    $this->total = mysql_num_rows($this->query);
	    
	    return $this->total;
	}
	
	/**
	* Busca una ciudad según el valor que se le pasa
	*
	* @ str		$val
	* @ return 	mysql array 
	*/
	public function searchCity($val){
	    $this->value = $val;
	    $this->sentencia = "SELECT * FROM city WHERE cName LIKE '%$this->value%'";
	    
	    return mysql_query($this->sentencia);
	    //return $this->sentencia;
	}
	
	/**
	* Modifica la tabla de cityuser añadiendo o borrando nuevos registros
	*
	* @ int		$userIDe
	* @ int		$cityIDe
	* @ return 	mysql array
	*/
	public function changeUserCity($userIDe, $cityIDe){
	    $this->userid = $userIDe;
	    $this->cityid = $cityIDe;
	    
	    // Si existe la ciudad la borro, y si no creo la relación
	    $this->checkIfexists = mysql_query("SELECT nID FROM cityuser WHERE nCityID = " . $this->cityid . " AND nUserID = " . $this->userid);
	    if(mysql_num_rows($this->checkIfexists) == 0){
		// Se inserta
		$this->sentencia = "INSERT INTO cityuser (nCityID, nUserID) VALUES (" . $this->cityid . ", " . $this->userid . ")";
		return mysql_query($this->sentencia);
	    }
	    else{
		// Se borra
		$this->sentencia = "DELETE FROM cityuser WHERE nCityID = " . $this->cityid . " AND nUserID = " . $this->userid;
		return mysql_query($this->sentencia);
	    }
	}
	
	/**
	* Muestra los ID usuarios asociados que tiene una ciudad o viceversa
	*
	* @ int		$ide
	* @ bool	$kind	0 = show cities related as user, 1 = show users in a city
	* @ return 	mysql array
	*/
	public function cityUserRelations($ide, $kind){
	    $this->id = $ide;
	    $this->tipo = $kind;
	    
	    $this->sentencia = "SELECT * FROM cityuser WHERE ";
	    if($this->tipo == 0){
		$this->sentencia .= "nUserID = " . $this->id;
	    }
	    elseif($this->tipo == 1){
		$this->sentencia .= "nCityID = " . $this->id;
	    }
	    
	    return mysql_query($this->sentencia);
	    
	}
	
	public function checkCityAndUser($user, $city){
	    $this->userid = $user;
	    $this->cityid = $city;
	    
	    $this->sentencia = "SELECT * FROM cityuser
			    WHERE  nUserID = " . $this->userid . "
			    AND nCityID = " . $this->cityid;
	    
	    return mysql_query($this->sentencia);
	}
}

class Stock extends Mysql_Connect{
    
    /**
    * Método de búsqueda general. 
    *
    * @ array		$search
    * 		[0] - Campo donde buscar	(Asociado al Where)
    * 		[1] - Valor aplicado al WHERE del campo
    * 		[2] - Order by	(Optional)
    * 			[2]["campo"] 	- Nombre del Campo por el que será ordenado
    * 			[2]["ascordesc"]- Orden ascendente o descendente
    * 		[3] - Limit	(Optional)
    * 			[3]["limit_start"]
    * 			[3]["limit_end"]
    * @ return 	mysql array
    */
    public function showAllStock($search){
	$this->field 	= $search[0];
	$this->value 	= $search[1];
	
	$this->orderby	= $search[2];
	    $this->order_field 	= $this->orderby["campo"];
	    $this->order_kind 	= $this->orderby["ascordesc"];
	
	$this->limit	= $search[3];
	    $this->limit_start 	= $this->limit["start"];
	    $this->limit_end 	= $this->limit["end"];
	    
	$this->sentencia = "SELECT * FROM stock";
	$this->sentencia .= ($this->field != "" && $this->value != "") ? " WHERE " . $this->field . " = " . $this->value : "";
	$this->sentencia .= ($this->orderby != "") ? " ORDER BY " .  $this->order_field . " " . $this->order_kind : $this->orderby = "";
	$this->sentencia .= ($this->limit_start != "" && $this->limit_end != "") ? " LIMIT " . $this->limit_start . ", " . $this->limit_end : $this->limit = ""; 
	
	return mysql_query($this->sentencia)or die(mysql_error());
	//return $this->sentencia;
	
    }
    
    public function allStock(){
	$this->sentencia = "SELECT stock.*, city.cName as ciudad
			    FROM stock 
			    INNER JOIN city ON city.nID = stock.nLocation
			    ORDER BY nID DESC";
	
	return mysql_query($this->sentencia);
    }
    
    public function allStockWithLimit($n1, $n2){
	$this->limit_start 	= $n1;
	$this->limit_end	= $n2;
	
	$this->sentencia = "SELECT stock.*, city.cName as ciudad
			    FROM stock 
			    INNER JOIN city ON city.nID = stock.nLocation
			    ORDER BY nID DESC
			    LIMIT " . $this->limit_start . ", " . $this->limit_end;
	
	return mysql_query($this->sentencia);
	//return $this->sentencia;
    }
    
    /**
    * Devuelve los campos de la tabla "stock" que tiene como valor en nLocation 0
    * Significa que cuando se dispuso a realizar la subida del csv algunas ciudades
    * no estaban cargadas en la base de datos, y que hay que asignarlas manualmente.
    *
    * @ return 	mysql array
    */
    public function stockWithoutLocation(){
	$this->sentencia = "SELECT * FROM stock WHERE nLocation = 0";
	//$search = array("nLocation", 0, array("campo" => "nID", "ascordesc" => "DESC"), array("start" => "", "end" => ""));
	//return $this->showAllStock($search);
	return mysql_query($this->sentencia);
    }
    
    public function showEditButton($userID, $perm, $location){
	$this->user 		= $userID;
	$this->permission 	= $perm;
	$this->locationid	= $location;	
	
	if($this->permission == 1){
	    $this->content = 1;
	}
	else{
	    
	    $checkUser = new City();
	    $rs = $checkUser->checkCityAndUser($this->user, $this->locationid);
	    if(mysql_num_rows($rs) > 0){
		$this->content = 1;
	    }
	    else{
		$this->content = 0;
	    }
	}
	
	return $this->content;
	
    }
    
    public function showOneReg($regid){
	$this->id = $regid;
	$this->sentencia = "SELECT * FROM stock WHERE nID = " . $this->id;
	return mysql_query($this->sentencia);
    }
    
    // Genera Reporte
    public function generateReport($arg){
	$this->buscar = $arg;
	$this->sentencia = "SELECT stock.*, city.cName as ciudad
			    FROM stock 
			    INNER JOIN city ON city.nID = stock.nLocation
			    WHERE stock.cStatus = '" . $this->buscar . "'
			    ORDER BY nID DESC";
			    
	return mysql_query($this->sentencia);
    }
    
    // Últimos 5 registros
    public function last5reg(){
	$this->sentencia = "SELECT stock.*, city.cName as ciudad
			    FROM stock 
			    INNER JOIN city ON city.nID = stock.nLocation
			    ORDER BY nID DESC
			    LIMIT 5";
			    
	return mysql_query($this->sentencia);
    }
    
}

class Upload extends Mysql_Connect{
    
    private $file;
    
    public function insertReg($arg){
	
	$date = new Common();
	$this->sentencia = "INSERT INTO stock(cItems,cVestasID,cService_Call,cFromPO,cSerial_Number,cMAC,dDate_Arrival,cStatus,dDelivery_date,nLocation,cComments)
		VALUES
		('" . $arg["item"] . "',
		'" . $arg["vestasid"] . "',
		'" . $arg["servicecall"] ."',
		'" . $arg["from"] . "',
		'" . $arg["serialnumber"] . "',
		'" . $arg["mac"] . "',
		'" . $date->changeDate($arg["datearrival"]) . "',
		'" . $arg["status"] . "',
		'" . $date->changeDate($arg["deliverydate"]) . "',
		'" . $arg["selectcity"] . "',
		'" . $arg["comments"] . "')";
	
	return mysql_query($this->sentencia);
    }
    
    public function updateReg($arg){
	$date = new Common();
	$this->sentencia = "UPDATE stock SET
			    cItems = '" . $arg["item"] . "',
			    cVestasID = '" . $arg["vestasid"] . "',
			    cService_Call = '" . $arg["servicecall"] ."',
			    cFromPO = '" . $arg["from"] . "',
			    cSerial_Number = '" . $arg["serialnumber"] . "',
			    cMAC = '" . $arg["mac"] . "',
			    dDate_Arrival = '" . $date->changeDate($arg["datearrival"]) . "',
			    cStatus = '" . $arg["status"] . "',
			    dDelivery_date = '" . $date->changeDate($arg["deliverydate"]) . "',
			    nLocation = '" . $arg["city"] . "',
			    cComments = '" . $arg["comments"] . "'
			    WHERE nID = " . $arg["id"];
	
	return mysql_query($this->sentencia);
	//return $this->sentencia;
    }
    
    private function insertCSV($csv, $folder){
	
	$city = new City();
	
	$this->file = $csv;
	
	$handle = fopen($folder . $this->file,'r');
	$row = 0;
	while (($data = fgetcsv($handle,0,";")) !== FALSE) { 
	    $num = count($data);
	    $row++;
                   
	    if($row > 1){
		
		// Asociando la ciudad que se ingresa con un ID
		$city_showCity = $city->showCity("", $data[9])or die(mysql_error());
		if(mysql_num_rows($city_showCity) > 0){
		    $cityID = mysql_fetch_assoc($city_showCity);    
		}
		else{
		    $cityID['nID'] = 0;	// FALSO
		}
	
		$data['cItems'] 		= 	$data[0];
		$data['cVestasID'] 		= 	$data[1];
		$data['cService_Call'] 		=	$data[2];
		$data['cFromPO']		=	$data[3];
		$data['cSerial_Number']		=	$data[4];
		$data['cMAC']			=	$data[5];
		$data['dDate_Arrival']		=	$data[6];
		$data['cStatus']		=	$data[7];
		$data['dDelivery_date']		=	$data[8];
		$data['nLocation']		=	$cityID['nID']; //$data[9];
		$data['cComments']		=	$data[10];
		
		$this->sentencia = "INSERT INTO stock(cItems,cVestasID,cService_Call,cFromPO,cSerial_Number,cMAC,dDate_Arrival,cStatus,dDelivery_date,nLocation,cComments)
		VALUES
		('" . $data['cItems'] . "','" . $data['cVestasID'] . "', '" . $data['cService_Call'] . "','" . $data['cFromPO'] . "','" . $data['cSerial_Number'] . "','" . $data['cMAC'] . "','" . $data['dDate_Arrival'] . "','" . $data['cStatus'] . "','" . $data['dDelivery_date']. "','" . $data['nLocation'] . "','" . $data['cComments'] . "')";
    
		mysql_query($this->sentencia);
		//return $this->sentencia;
	    }
	
	}
	
	fclose($handle);
	return true;

    }
    
    private function checkExtension($file, $ext){
	$this->fileName = $file['name'];	// Only a FILE array
	$this->extension = $ext;
	
	$lowerCase = substr($this->fileName, -4);
	$capital = substr(strtoupper($this->fileName), -4);
	
	if($this->extension == $lowerCase || $this->extension == $capital)
	    return true;
	else
	    return false;
    }
    
    public function checkType($fil, $typ){
	$this->file = $fil;
	$this->type = $typ;
	
	if($this->file["type"] == $this->type)
	    return true;
	else
	    return false;
    }
    
    public function updateRelations($ide, $value){
	$this->id = $ide;
	$this->valor = $value;
	
	$this->sentencia = "UPDATE stock SET nLocation = " . $this->valor = $value . " WHERE nID = " . $this->id;
	return mysql_query($this->sentencia);
    }
    
    public function uploadCSV($csv){
	$this->file = $csv;

	$upload = new Common();
	
	$this->name = $upload->deleteSpecialChars($upload->deleteSpaces($this->file['name']));
	$folder = $_SERVER['DOCUMENT_ROOT'] . "/" . __MAINFOLDER__ . "/tmp/";
	

	if($this->checkExtension($this->file, ".csv")){
	    if($this->checkType($this->file, "text/csv") || $this->checkType($this->file, "application/vnd.ms-excel")){
		if(move_uploaded_file($this->file['tmp_name'], $folder . $this->name)){
		    if($this->insertCSV($this->name, $folder)){
			return true;
		    }
		    else{
			return false;
			//return "Falla \$this->insertCSV(\$this->name, \$folder)";
		    }
		}
		else{
		    return false;
		    //return "falla if(move_uploaded_file(\$this->file['tmp_name'], \$folder . \$this->name)){";
		}
	    }
	    else{
		return false;
		//return "falla \$this->checkType(\$this->file, \"text/csv\")";
		//return $this->file["type"];
	    }  
	}
	else{
	    return false;
	    //return "falla \$this->checkExtension(\$this->file, \".csv\")";
	}
    }
    
}

?>