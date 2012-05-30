<?php
session_cache_limiter("nocache,private");
session_start();

include("funciones.php");

if(empty($_SESSION["logueo"]) && $_SESSION["logueo"] != TRUE){
    header("Location: " . __URL__ . "/login.php");
    
}

// BD
$conexion = new Mysql_Connect();
$conexion->selectDB();

// Asociación de Parámetros
$user 	= $_SESSION["usuario"];
$id	= $_SESSION["usuarioID"];
$permiso= $_SESSION["permiso"];
$seccion = @$_GET["d"];
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Seguia - Gestión de Inventariado</title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<?php
    $template = new Template();
    echo $template->loadCSS();
    echo $template->loadJS();
?>
<meta charset="UTF-8"></head>
<body>
<!--Header-->
<header>
    <!--Logo-->
    <div id="logo"><a href="#"><img src="./images/logo.png" alt="" /></a></div>
    <!--Search-->
    <div class="header_search">
        <form action="">
            <input type="text" name="search" placeholder="Buscar" id="ac">
            <input type="submit" value="">
        </form>
    </div>
</header>
<!--Dreamworks Container-->
<div id="dreamworks_container">
    <!--Primary Navigation-->
<?php
    include("pages/primary-nav.php");
?>	
<!--Main Content-->
<section id="main_content">
<?php
    include("pages/secondary-nav.php");
?>
<!--Content Wrap-->
<?php
    // Contenido a Incluir    
    switch($seccion)
    {	
	case "stock":
	    include("pages/inventario/index.php");
	    exit;
	    
	case "report":
	    include("pages/reporte/index.php");
	    exit;
	
	case "admin":
	    include("pages/admin/index.php");
	    exit;
    }
/*
<div id="content_wrap">	<!--Activity Stats-->
    	<div id="activity_stats">
        	<h3>Activity</h3>
            <div class="activity_column">
            	<span class="iconsweet">+</span> <span class="big_txt rd_txt">12</span>Added
            </div>
            <div class="activity_column">
            	<span class="iconsweet">Y</span> <span class="big_txt gr_txt">6</span>Flagged
            </div>
            <div class="activity_column">
            	<span class="iconsweet">#</span> <span class="big_txt">2</span>Answer pending
            </div>                         
        </div>                  
        <!--Quick Actions-->
        <div id="quick_actions">
        	<a class="button_big" href="#"><span class="iconsweet">+</span>Add new Project</a>
            <a class="button_big" href="#"><span class="iconsweet">w</span>Export Report</a>
            <a class="button_big btn_grey" href="#"><span class="iconsweet">f</span>Manage Projects</a>
        </div>
	<!--Notification Message-->
    	<div class="msgbar msg_Info hide_onC">
            <span class="iconsweet">*</span><p>Thanks for choosing Dreamworks!</p>
        </div>
	<!--One_TWO-->
 	<div class="one_two_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>Projects graph</h5></div>
            <div class="widget_body">
            	<!--Projects Graph--> 
                <div id="chart_linear" class="no_overflow">
                </div>
            </div>
        </div>
    </div>
	<!--One_TWO-->
 	<div class="one_two_wrap fl_right">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">t</span><h5>Statistics</h5></div>
            <div class="widget_body">
            	<!--Stastics-->
            	<ul class="dw_summary">
                            <li>
                                <span class="percentage_done">12%</span> New registrations  <div class="progress_wrap"><div title="12%" class="tip_north progress_bar" style="width:12%"></div></div>
                            </li>
                            <li>
                                 <span class="percentage_done">9%</span> Re-opened tasks  <div class="progress_wrap"><div title="9%" class="tip_north progress_bar" style="width:9%"></div></div>
                            </li>
                            <li>
                                 <span class="percentage_done">46%</span> Task completed  <div class="progress_wrap"><div title="46%" class="tip_north progress_bar" style="width:46%"></div></div>
                            </li>
                            <li>
                                 <span class="percentage_done">82%</span> New visitors  <div class="progress_wrap"><div title="82%" class="tip_north progress_bar" style="width:82%"></div></div>
                            </li>
                            <li>
                                 <span class="percentage_done">27%</span> Unique visitors  <div class="progress_wrap"><div title="27%" class="tip_north progress_bar" style="width:27%"></div></div>
                            </li> 
                            <li>
                                 <span class="percentage_done">0%</span> Affiliate registration  <div class="progress_wrap"><div title="0%" class="tip_north progress_bar" style="width:0%"></div></div>
                            </li>                                                       
                 </ul>
            </div>
        </div>
    </div>   
	<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">H</span><h5>Projects</h5></div>
            <div class="widget_body">
            	<div class="project_sort">
                	<ul class="filter_project">
                    	<li class="segment  selected"><a class="all" href="#">All <span class="count">10</span></a></li>
                        <li class="segment"><a class="incomplete" href="#">Incomplete<span class="count">6</span></a></li>
                        <li class="segment"><a class="Resolved" href="#">Resolved<span class="count">4</span></a></li>
                     </ul>
                     <ul class="project_list">
                        <li data-id="id-1" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-2" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-3" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                BBC
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>  
                        <li data-id="id-4" data-type="incomplete">
                        	<span class="project_badge grey iconsweet">
                            8
                            </span>
                            <a href="#" class="project_title">
                            	j&D <br />
                                Appstorm
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Carla
                            </a>                        
                        </li>        
                        <li data-id="id-5" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-6" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-7" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                Raje
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>  
                        <li data-id="id-8" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                iCAN
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li> 
                        <li data-id="id-7" data-type="incomplete">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                BBC
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>  
                        <li data-id="id-8" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                MAZE
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>                                                                 
                                                                                        
                     </ul>
                </div>
            </div>
        </div>
    </div>     
	<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Activity across your projects</h5></div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="8%">ID</th>
                        <th width="15%">Category</th>
                        <th width="32%">Project(s)</th>
                        <th width="12%">Status</th>
                        <th width="20%">Remarks</th>
                        <th width="13%">Actions</th>
                    </tr>
                    <tr>
                        <td>4923</td>
                        <td><span class="green_highlight pj_cat">Android</span></td>
                        <td><a href="#">Eodem modo typi, qui nunc nobi...</a></td>
                        <td><span class="stat_up">72% <span class="arrow_up iconsweet">]</span></span></td>
                        <td>Assigned to - <a href="#">SA</a></td>
                        <td><span class="data_actions iconsweet"><a class="tip_north" original-title="User" href="#">a</a> <a class="tip_north" original-title="Edit" href="#">C</a> 						<a class="tip_north" original-title="Delete" href="#">X</a></span></td>
                    </tr>
                    <tr>
                        <td>3568</td>
                        <td><span class="grey_highlight pj_cat">Flex</span></td>
                        <td><a href="#">Eodem modo typi, qui nunc nobi...</a></td>
                        <td><span class="stat_down">12% <span class="arrow_up iconsweet">[</span></span></td>
                        <td>Assigned to - <a href="#">SA</a></td>
                        <td><span class="data_actions iconsweet"><a class="tip_north" original-title="User" href="#">a</a> <a class="tip_north" original-title="Edit" href="#">C</a> 						<a class="tip_north" original-title="Delete" href="#">X</a></span></td>                    </tr>
                    <tr>
                        <td>4923</td>
                        <td><span class="green_highlight pj_cat">Android</span></td>
                        <td><a href="#">Eodem modo typi, qui nunc nobi...</a></td>
                        <td><span class="stat_down">72% <span class="arrow_up iconsweet">[</span></span></td>
                        <td>Assigned to - <a href="#">SA</a></td>
                        <td><span class="data_actions iconsweet"><a class="tip_north" original-title="User" href="#">a</a> <a class="tip_north" original-title="Edit" href="#">C</a> 						<a class="tip_north" original-title="Delete" href="#">X</a></span></td>                    </tr>
                    <tr>
                        <td>4923</td>
                        <td><span class="grey_highlight pj_cat">Flex</span></td>
                        <td><a href="#">Eodem modo typi, qui nunc nobi...</a></td>
                        <td><span class="stat_up">72% <span class="arrow_up iconsweet">]</span></span></td>
                        <td>Assigned to - <a href="#">SA</a></td>
                        <td><span class="data_actions iconsweet"><a class="tip_north" original-title="User" href="#">a</a> <a class="tip_north" original-title="Edit" href="#">C</a> 						<a class="tip_north" original-title="Delete" href="#">X</a></span></td>                    </tr>
                    <tr>
                        <td>4923</td>
                        <td><span class="blue_highlight pj_cat">JAVA</span></td>
                        <td><a href="#">Eodem modo typi, qui nunc nobi...</a></td>
                        <td><span class="stat_down">44% <span class="arrow_up iconsweet">[</span></span></td>
                        <td>Assigned to - <a href="#">SA</a></td>
                        <td><span class="data_actions iconsweet"><a class="tip_north" original-title="User" href="#">a</a> <a class="tip_north" original-title="Edit" href="#">C</a> 						<a class="tip_north" original-title="Delete" href="#">X</a></span></td>                    
                     </tr>                          
                    <tr>
                        <td>4923</td>
                        <td><span class="green_highlight pj_cat">Android</span></td>
                        <td><a href="#">Eodem modo typi, qui nunc nobi...</a></td>
                        <td><span class="stat_down">72% <span class="arrow_up iconsweet">[</span></span></td>
                        <td>Assigned to - <a href="#">SA</a></td>
                        <td><span class="data_actions iconsweet"><a class="tip_north" original-title="User" href="#">a</a> <a class="tip_north" original-title="Edit" href="#">C</a> 						<a class="tip_north" original-title="Delete" href="#">X</a></span></td>                    
                     </tr>                   
                </table>
				<div class="action_bar">
                    <a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export Table</a>
                </div>
            </div>
        </div>
    </div>          
</div>

FIN
*/
?>
</section>

</div>

</body>
</html>