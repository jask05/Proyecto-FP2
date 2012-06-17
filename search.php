<?php
if($permiso != 1):
    $parametros = array("msg_Error", "X", "No tienes permiso para ver esta sección.");
    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
else:
?>
<div id="activity_stats">
	<h3>Resumen</h3>
    <div class="activity_column">
	<span class="iconsweet">a</span> <span class="big_txt rd_txt">
	<?php
	$usuarios = new User();
	$ciudades = new City();
	
	$busqueda = $_POST['search'];
	$searchUser = $usuarios->searchUser($busqueda);
	$searchCity = $ciudades->searchCity(htmlentities($busqueda));
	
	$usuariosEncontrados =  mysql_num_rows($searchUser);
	$ciudadesEncontradas = mysql_num_rows($searchCity);
	
	echo $usuariosEncontrados;
	?>
	</span>
	<?php echo $usu = ($usuariosEncontrados == 1) ? "Usuario encontrado" : "Usuarios encontrados"; ?> 
    </div>
    <div class="activity_column">
	<span class="iconsweet">1</span> <span class="big_txt gr_txt">
	    <?php echo $ciudadesEncontradas; ?>
	</span>
	<?php echo $cit = ($ciudadesEncontradas == 1) ? "Ciudad encontrada" : "Ciudades encontradas"; ?> 
    </div>
</div>                  

<div id="quick_actions">
    <a href="index.php?d=admin" class="button_big" id="toggleReturnEditUser"><span class="iconsweet">w</span>Volver al panel de Administración</a>
</div>

<div class="one_wrap">
    <?php
    if($usuariosEncontrados == 0):
	$cartel = new Template();
	$content = array("msg_Alert", "*", "No se ha encontrado ningún <strong>usuario</strong> con ese patrón. Si lo desea, puede crearlo desde el panel de administración.");
	echo $cartel->notice($content);
    else:
	include("modal-window.php");	// Información de usuario en la modal windows
    ?>
    <div class="widget">
	<!-- @@@@@@@ Listado de Usuarios Encontrados@@@@@@@ -->
	<div class="widget_title"><span class="iconsweet">f</span><h5>Usuarios encontrados</h5></div>
	<div class="widget_body">
	    <!--Activity Table-->
	    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
		<tr>
		    <th width="8%">ID</th>
		    <th width="15%">Usuario</th>
		    <th width="12%">Permisos de administración</th>
		    <th width="13%">Acciones</th>
		</tr>
		<?php	
		while($showInfo = mysql_fetch_assoc($searchUser)):
		?>
		<tr>
		    <td id="idUser"><?php echo $showInfo["nID"]; ?></td>
		    <td><?php echo $showInfo["cNick"]; ?></td>
		    <td><?php echo $permisoAdmin = ($showInfo["bPermission"] == 1) ? "Si" : "No"; ?></td>
		    <td>
			<span class="data_actions iconsweet">
				<a class="tip_east" original-title="Perfil - Ver o Editar" href="<?php echo $_SERVER['REQUEST_URI'] . "&user=" . $showInfo["nID"]; ?>">a</a>
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
    <?php
    endif;
    ?>
    
    <?php
    if($ciudadesEncontradas == 0):
	$cartel = new Template();
	$content = array("msg_Alert", "*", "No se ha encontrado ninguna <strong>ciudad</strong> con ese patrón. Si lo desea, puede crearla desde el panel de administración.");
	echo $cartel->notice($content);
    else:
    ?>
    <div class="widget">
	<!-- @@@@@@@ Listado de Ciudades Encontradas @@@@@@@ -->
	<div class="widget_title"><span class="iconsweet">1</span><h5>Ciudades Encontradas</h5></div>
	<div class="widget_body">
	
	    <!--Activity Table-->
	    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
		<tr>
		    <th width="8%">ID</th>
		    <th width="15%">Nombre</th>
		    <th width="12%">Nº de Usuarios Asociados</th>
		    <th width="13%">Acción</th>
		</tr>
		<?php	
		while($showInfo = mysql_fetch_assoc($searchCity)):
		    $usuariosAsociados = $ciudades->cityUserRelations($showInfo["nID"], 1);
		    $cantidadUsuariosAsociados = mysql_num_rows($usuariosAsociados);
		    $rsCantidadUsuariosAsociados = ($cantidadUsuariosAsociados == 0) ? $cantidadUsuariosAsociados : "<a class='tip_west whitishBtn button_small'  href='#showSearch' original-title='Pincha aquí para ver el listado de usuarios asociados' onclick='showAsociatedUsers(this.id)' id='modal-windows-searched' data-toggle='modal'>" . $cantidadUsuariosAsociados . " Usuarios Asociados</a>"; // data-toggle='modal'
		?>
		<tr>
		    <td id="idCity"><?php echo $showInfo["nID"]; ?></td>
		    <td><?php echo html_entity_decode($showInfo["cName"]); ?></td>
		    <td>
			<input type="hidden" name="idCitySelected" value="<?php echo $showInfo["nID"]; ?>" />
			<?php echo $rsCantidadUsuariosAsociados; ?>
		    </td>
		    <td>
			<span class="data_actions iconsweet">
			    <a class="tip_west" original-title="Editar - Solo se puede cambiar el nombre" href="<?php echo $_SERVER['REQUEST_URI'] . "&city=" . $showInfo["nID"]; ?>">8</a>
			</span>
		    </td>
		</tr>
		<?php
		endwhile;
		?>
	    </table>
	</div>
	<!-- @@@@@@@ Fin Listado Ciudades @@@@@@@ -->
    </div>
    <?php
    endif;
    ?>
    
</div>
<?php
endif;
?>