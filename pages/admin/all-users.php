<?php
if($permiso != 1):
    $parametros = array("msg_Error", "X", "No tienes permiso para ver esta sección.");
    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
else:

$usuarios = new User();
$ciudades = new City();

?>
<div id="activity_stats">
	<h3>Resumen</h3>
    <div class="activity_column">
	<span class="iconsweet">a</span> <span class="big_txt rd_txt">
	<?php
            $order = array("nID", "DESC", "");
            $usuarios_Totales = $usuarios->getAllInfoUser($order);
            $usuTotlaes = mysql_num_rows($usuarios_Totales);
	?>
	</span>
	<?php echo "Hay un total de " . $usuTotlaes . " usuarios registrados en la base de datos"; ?> 
    </div>
</div>                  

<div id="quick_actions">
    <a href="index.php?d=admin" class="button_big" id="toggleReturnEditUser"><span class="iconsweet">w</span>Volver al panel de Administración</a>
</div>

<div class="one_wrap">
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
		while($showInfo = mysql_fetch_assoc($usuarios_Totales)):
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
</div>
<?php
endif;
?>