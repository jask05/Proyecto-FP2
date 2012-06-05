<?php
if($permiso != 1):
    $parametros = array("msg_Error", "X", "No tienes permiso para ver esta sección.");
    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
else:
?>
<div id="content_wrap">	<!--Activity Stats-->
    	<div id="activity_stats">
        	<h3>Activity</h3>
            <div class="activity_column">
            	<span class="iconsweet">+</span> <span class="big_txt rd_txt">12</span>Usuarios
            </div>
            <div class="activity_column">
            	<span class="iconsweet">Y</span> <span class="big_txt gr_txt">6</span>Ciudades
            </div>
	    <!--
            <div class="activity_column">
            	<span class="iconsweet">#</span> <span class="big_txt">2</span>Answer pending
            </div>
            -->
        </div>                  
        <!--Quick Actions-->
        <div id="quick_actions">
        	<a class="button_big" href="#"><span class="iconsweet">+</span>Add new Project</a>
            <a class="button_big" href="#"><span class="iconsweet">w</span>Export Report</a>
            <a class="button_big btn_grey" href="#"><span class="iconsweet">f</span>Manage Projects</a>
        </div>
	
	<!-- Listado de Usuarios -->
	<div class="one_wrap">
		<div class="widget">
			<div class="widget_title"><span class="iconsweet">f</span><h5>Últimos 5 usuarios añadidos</h5></div>
			<div class="widget_body">
			    <!--Activity Table-->
			    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
				<tr>
				    <th width="8%">ID</th>
				    <th width="15%">Nombre</th>
				    <th width="12%">Permisos de administración</th>
				    <th width="13%">Acciones</th>
				</tr>
				<?php
				$showUser = new User();
				
				$parametros = array("nID", "DESC", 5);
				
				$getInfoUser = $showUser->getAllInfoUser($parametros);
				while($showInfo = mysql_fetch_assoc($getInfoUser)):
				?>
				<tr>
				    <td><?php echo $showInfo["nID"]; ?></td>
				    <td><?php echo $showInfo["cNick"]; ?></td>
				    <td><?php echo $permisoAdmin = ($showInfo["bPermission"] == 1) ? "Si" : "No"; ?></td>
				    <td>
					<span class="data_actions iconsweet">
						<a class="tip_north" original-title="Perfil" href="./index.php?d=admin&profile=<?php echo $showInfo["nID"]; ?>">a</a>
						<a class="tip_north" original-title="Editar" href="./index.php?d=admin&edit=<?php echo $showInfo["nID"]; ?>">C</a>
						<a class="tip_north" original-title="Borrar" href="./index.php?d=admin&delete=<?php echo $showInfo["nID"]; ?>">X</a>
					</span>
				    </td>
				</tr>
				<?php
				endwhile;
				?>
			    </table>
			</div>
			<div class="widgets_wrap">
			    <!--Añadir Usuario-->
			    <div class="one_two_wrap fl_left">
				<!--Unordered List-->
				<div class="widget">
				    <div class="widget_title"><span class="iconsweet">a</span>
					<h5>Añadir Usuario</h5>
				    </div>
				    <!--Form fields-->
				    <ul class="form_fields_container">
					<li>
					    <label>Nombre </label>
					    <div class="form_input">
						<input name="userNick" id="userNick" type="text">
					    </div>
					</li>
					<li>
					    <label>Clave</label>
					    <div class="form_input">
						<input name="userPass" id="userPass"  type="password">
					    </div>
					</li>
				    </ul>
				    <ul class="form_fields_container">
					<li>
					    <label>Ciudad</label>
					    <div class="form_input">
						<?php
						$verCiudad = new City();
						?>
						<select name="selectCityNewUser" id="selectCityNewUser">
						    <option value="0" selected="selected">Seleccione una ciudad</option>
						    <?php
						    $objCity = $verCiudad->showCity();
						    while($rsCity = mysql_fetch_assoc($objCity))
						    {
							echo "<option value='" . $rsCity['nID'] . "'>" . html_entity_decode($rsCity['cName']) . "</option>";
						    }
						    ?>
						</select>
					    </div>
					</li>
					<li>
					    <label>¿Administrador?</label>
					    <div class="form_input">
						<input id="admin" name="radio" type="radio" value="1">
						<label for="isAdmin">Si</label>
					    </div>
					    <div class="form_input">
						<input id="noAdmin" name="radio" type="radio" value="0">
						<label for="isAdmin">No</label>
					    </div>
					</li>
				    </ul>
				    <div class="action_bar">
					<a class="button_small bluishBtn" id="newUser">
					    <span class="iconsweet">=</span>Guardar
					</a>
				    </div>
				</div>
			    </div>
			    
			    <!-- Añadir Ciudad -->
			    <form action="" id="demoForm" method="post">
				<div class="one_two_wrap fl_right" id="test">
				    <!--List Tick-->
				    <div class="widget">
					<div class="widget_title"><span class="iconsweet">1</span>
					    <h5>Añadir Ciudad</h5>
					</div>
					<ul class="form_fields_container">
					    <li><label>Ciudad</label> <div class="form_input"><input name="cityName" id="nombreCiudad" type="text"></div></li>
					</ul>
					<div class="action_bar">
					    <a class="button_small whitishBtn" id="addCity">
						<span class="iconsweet">=</span>Añadir
					    </a>
					</div>
				    </div>
				</div>
			    </form>
			    
			    <!-- Buscar Usuario -->
			    <div class="one_two_wrap fl_right">
				<!--List Tick-->
				<div class="widget">
				    <div class="widget_title"><span class="iconsweet">\</span>
					<h5>Buscar Usuario</h5>
				    </div>
				    <ul class="form_fields_container">
					<li><label>Nombre</label> <div class="form_input"><input name="" type="text"></div></li>
				    </ul>
				    <div class="action_bar">
					<a href="#" class="button_small whitishBtn">
					    <span class="iconsweet">></span>Buscar
					</a>
				    </div>
				</div>
			    </div>
			</div>
		</div>
	</div>
	<!-- Fin Listado Usuarios -->
	
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
<?php
endif;
?>