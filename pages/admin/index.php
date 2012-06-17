<?php
if($permiso != 1):
    $parametros = array("msg_Error", "X", "No tienes permiso para ver esta sección.");
    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
else:
?>
<div id="content_wrap">	<!--Activity Stats-->
    <div id="admin-resume">
	<?php
	include("modal-window.php");
	
	if(isset($_GET['user']) && is_numeric($_GET['user'])):
	    include('user-profile.php');
	elseif(isset($_POST['search']) && !empty($_POST['search'])):
	    include('search.php');
	elseif(isset($_GET['allusers']) && $_GET['allusers']==1):
	    include('all-users.php');
	elseif(isset($_GET['allcities']) && $_GET['allcities']==1):
	    include('all-cities.php');
	elseif(isset($_GET['vinculate']) && $_GET['vinculate']==1):
	    include('vinculate-reg.php');
	else:
	?>
	<div id="activity_stats">
        	<h3>Resumen</h3>
            <div class="activity_column">
            	<span class="iconsweet">+</span> <span class="big_txt rd_txt">
		<?php
		$usuarios = new User();
		echo $usuarios->totalUser();
		?>
		</span>Usuarios
            </div>
            <div class="activity_column">
            	<span class="iconsweet">Y</span> <span class="big_txt gr_txt">
		    <?php
		    $ciudades = new City();
		    echo $ciudades->totalCity();
		    ?>
		</span>Ciudades
            </div>
        </div>                  
	
	<!-- Listado de todos los usuarios -->
	<div id="quick_actions">
	    <a href="index.php?d=admin&allusers=1" class="button_big btn_grey" id="toggleReturnEditUser">
		<span class="iconsweet">f</span>
		Listado de Usuarios
	    </a>
	    <a href="index.php?d=admin&allcities=1" class="button_big" id="toggleReturnEditUser">
		<span class="iconsweet">1</span>
		Listado de Ciudades
	    </a>
	</div>
	
	<!-- Aviso de Stock sin Location -->
	<div class="one_wrap">
	<?php
	$stockWith0 = new Stock();
	$advice = new Template();
	$nLocation = mysql_num_rows($stockWith0->stockWithoutLocation());
	if(is_numeric($nLocation) && $nLocation > 0){
	    $content = array("msg_Alert", "!", "Hay " . $nLocation . " registros sin vincular con una localización. Pinche <a href='index.php?d=admin&vinculate=1'> aquí</a> para editarlos.");
	    echo $advice->notice($content);
	}
	?>
	</div>
		
	<div class="one_wrap">
	    <div class="widget">
		    <!-- @@@@@@@ Listado de Usuarios @@@@@@@ -->
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
				<td id="idUser"><?php echo $showInfo["nID"]; ?></td>
				<td><?php echo $showInfo["cNick"]; ?></td>
				<td><?php echo $permisoAdmin = ($showInfo["bPermission"] == 1) ? "Si" : "No"; ?></td>
				<td>
				    <span class="data_actions iconsweet">
					    <a class="tip_east" original-title="Perfil - Ver o Editar" href="<?php echo $_SERVER['REQUEST_URI'] . "&user=" . $showInfo["nID"]; ?>">a</a>
					    <!-- <a class="tip_north" original-title="Editar" data-toggle="modal" href="#editUser" name="editUser" id="">C</a>-->
					    <a class="tip_west" original-title="Borrar" data-toggle="modal" href="#confirmDelUser" name="deluser" id="<?php echo $showInfo["nID"]; ?>">X</a>
				    </span>
				</td>
			    </tr>
			    <?php
			    endwhile;
			    ?>
			</table>
		    </div>
		    <!-- @@@@@@@ Fin Listado Usuarios @@@@@@@ -->
		  </div>  
		<div class="widgets_wrap">
		    <!-- @@@@@@@ Añadir Usuario @@@@@@@ -->
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
					<input name="userNick" id="userNick" type="text" placeholder="Inserte un nombre de usuario">
				    </div>
				</li>
				<li>
				    <label>Clave</label>
				    <div class="form_input">
					<input name="userPass" id="userPass"  type="password" placeholder="La contraseña debe tener 6 caracteres o más">
				    </div>
				</li>
			    </ul>
			    <ul class="form_fields_container">
				<li>
				    <label>Ciudad</label>
				    <div class="form_input">
					<select name="selectCityNewUser" id="selectCityNewUser">
					    <option value="0" selected="selected">Seleccione una ciudad</option>
					    <?php
					    $objCity = $ciudades->showCity();
					    while($rsCity = mysql_fetch_assoc($objCity)):
						echo "<option value='" . $rsCity['nID'] . "'>" . html_entity_decode($rsCity['cName']) . "</option>";
					    endwhile;
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
		    <!-- @@@@@@@ Fin Añadir Usuario @@@@@@@ -->
		    
		    <!-- @@@@@@@ Añadir Ciudad @@@@@@@ -->
		    <div class="one_two_wrap fl_right" id="test">
			<!--List Tick-->
			<div class="widget">
			    <div class="widget_title"><span class="iconsweet">1</span>
				<h5>Añadir Ciudad</h5>
			    </div>
			    <ul class="form_fields_container">
				<li><label>Ciudad</label> <div class="form_input"><input name="cityName" placeholder="Inserte un nombre de una ciudad" id="nombreCiudad" type="text"></div></li>
			    </ul>
			    <div class="action_bar">
				<a class="button_small whitishBtn" id="addCity">
				    <span class="iconsweet">=</span>Añadir
				</a>
			    </div>
			</div>
		    </div>
		    <!-- @@@@@@@ Fin Añadir Ciudad @@@@@@@ -->
		    
		    <!-- Buscar Usuario -->
		    <div class="one_two_wrap fl_right">
			<!--List Tick-->
			<div class="widget">
			    <div class="widget_title"><span class="iconsweet">\</span>
				<h5>Buscar Usuario o Ciudad</h5>
			    </div>
			    <form name="searcher" method="POST" >
				<ul class="form_fields_container">
				    <li>
					<label>Valor</label>
					<div class="form_input">
					    <input name="search" type="text" id="search" placeholder="Introduce un nombre de ciudad o usuario a buscar">
					</div>
				    </li>
				</ul>
				<div class="action_bar">
				    <input type="submit" value="Buscar" class="button_small whitishBtn" name="showRSearch"/>
				</div>
			    </form>
			</div>
		    </div>
		</div>  
	    </div>
	<?php
	endif;
	?>
	</div>
    </div>
<?php
endif;
?>