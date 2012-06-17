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
	<span class="iconsweet">1</span> <span class="big_txt rd_txt">
	<?php
            $order = array("nID", "DESC", "");
            $ciudades_Totales = $ciudades->showCity();
            $ciuTotlaes = mysql_num_rows($ciudades_Totales);
	?>
	</span>
	<?php echo "Hay un total de " . $ciuTotlaes . " ciudades registrados en la base de datos"; ?> 
    </div>
</div>                  

<div id="quick_actions">
    <a href="index.php?d=admin" class="button_big" id="toggleReturnEditUser"><span class="iconsweet">w</span>Volver al panel de Administración</a>
</div>

<div class="one_wrap">
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
		    <!-- <th width="13%">Acción</th> -->
		</tr>
		<?php
		$i = 1;
		while($showInfo = mysql_fetch_assoc($ciudades_Totales)):
		    $usuariosAsociados = $ciudades->cityUserRelations($showInfo["nID"], 1);
		    $cantidadUsuariosAsociados = mysql_num_rows($usuariosAsociados);
		    $rsCantidadUsuariosAsociados = ($cantidadUsuariosAsociados == 0) ? $cantidadUsuariosAsociados : "<a class='tip_west whitishBtn button_small'  href='#showSearch' original-title='Pincha aquí para ver el listado de usuarios asociados' onclick='showAsociatedUsers(this.id)' id='modal-windows-searched" . $i . "' data-toggle='modal'>" . $cantidadUsuariosAsociados . " Usuarios Asociados</a>"; // data-toggle='modal'
		    $i++;
		?>
		<tr>
		    <td id="idCity"><?php echo $showInfo["nID"]; ?></td>
		    <td><?php echo html_entity_decode($showInfo["cName"]); ?></td>
		    <td>
			<input type="hidden" name="idCitySelected" value="<?php echo $showInfo["nID"]; ?>" />
			<?php echo $rsCantidadUsuariosAsociados; ?>
		    </td>
		    <!--
		    <td>
			<span class="data_actions iconsweet">
			    <a class="tip_west" original-title="Editar - Solo se puede cambiar el nombre" href="<?php //echo $_SERVER['REQUEST_URI'] . "&city=" . $showInfo["nID"]; ?>">8</a>
			</span>
		    </td>
		    -->
		</tr>
		<?php
		endwhile;
		?>
	    </table>
	</div>
	<!-- @@@@@@@ Fin Listado Ciudades @@@@@@@ -->
    </div> 
</div>
<?php
endif;
?>