<?php
$up = new Upload();
$advice = new Template();
$stock = new Stock();

?>
<div id="content_wrap">
	<?php
	if(isset($_GET['n']) && is_numeric($_GET['n']) && $_GET['n'] == 1):
	    include('genera-formulario.php');
	elseif(isset($_GET['showinventario']) && is_numeric($_GET['showinventario']) && $_GET['showinventario'] == 1):
	    include('ver-inventario.php');
	else:
	?>
	
	<!-- Botón ir a inventario -->
	<div id="quick_actions">
	    <a href="index.php?d=stock&showinventario=1" class="button_big btn_grey" id="toggleReturnEditUser">
		<span class="iconsweet">c</span>
		Ver Inventario
	    </a>
	</div>
	
	<!-- Subida de Inventario -->
	<div class="one_two_wrap fl_left">
	    <div class="widget">
		<div class="widget_title"><span class="iconsweet">k</span>
		    <h5>Subir Inventario</h5>
		</div>
		<div class="widget_body">
		    <div class="content_pad">
			<p>Desde este formulario usted puede subir un inventario, siempre y cuando esté en formado csv. Este se añadirá a la base de datos para que usted pueda gestionarlo.</p>
			<form name="uploadInventory" method="post" enctype="multipart/form-data" action="<? echo __URL__ . "/index.php?d=stock&upload=true"; ?>">
			    <p><input type="file" name="uploadCSV"></p>
			    <input type="submit" value="Cargar Inventario" class="dblueBtn button_small">
			</form>
			<?php
			    if(isset($_GET['upload'])){
				
				if($up->uploadCSV($_FILES['uploadCSV'])){
				    $content = array("msg_Success", "=", "El archivo se ha subido satisfactóriamente.");
				    echo $advice->notice($content);
				    
				    // Borrar archivo subido #############################################################
				    
				    // Comprobando si existen nLocations con 0
				    $nLocation = mysql_num_rows($stock->stockWithoutLocation());
				    if(is_numeric($nLocation) && $nLocation > 0){
					$content = array("msg_Alert", "!", "Hay " . $nLocation . " registros sin vincular con una localización. Se ha notificado al administrador");
					echo $advice->notice($content);
				    }
				}
				else{
				    $content = array("msg_Error", "X", "Ha ocurrido un error al subir el archivo. Por favor vuelva a intentarlo.");
				    echo $advice->notice($content);
				    echo $folder = $_SERVER['DOCUMENT_ROOT'] . "/" . __MAINFOLDER__ . "/tmp/";
				}
			    }
			?>
		    </div>
		</div>
	    </div>
	</div>
	<!-- Fin Subida Inventario -->
	
	<div class="one_two_wrap fl_right">
	    <div class="widget">
		<div class="widget_title"><span class="iconsweet">}</span>
		    <h5>Último 5 registros añadidos</h5>
		</div>
		<div class="widget_body">
		    <div class="content_pad">
			<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
			    <tr>
				<th width="8%">ID</th>
				<th width="15%">Item</th>
				<th width="15%">Status</th>
				<th width="12%">Location</th>
			    </tr>
			    <?php
			    $rs_stock = $stock->last5reg();
			    while($showStock = mysql_fetch_assoc($rs_stock)):
			    ?>
			    <tr>
				<td id="<?php echo $showStock['nID']; ?>"><?php echo $showStock['nID']; ?></td>
				<td><?php echo $showStock['cItems']; ?></td>
				<td><?php echo $showStock['cStatus']; ?></td>
				<td><?php echo $showStock['ciudad']; ?></td>
			    </tr>
			    <?php
			    endwhile;
			    ?>
			</table>
		    </div>
		</div>
	    </div>
	</div>
	
	<!-- Insertar Registros -->
	<div class="one_wrap fl_left">
	    <div class="widget">
		<div class="widget_title"><span class="iconsweet">8</span>
		    <h5>Inserccións de Registros</h5>
		</div>
		<div class="widget_body">
		    
		    <form name="generaRegistros" method="post" action="<?php echo __URL__ . "/index.php?d=stock&n=1"; ?>">
		    <div class="content_pad">
			<p>Este formulario le parmitirá generar los campos necesarios para los registros que crea oportunos insertar.</p>
			<ul class="form_fields_container">
			    <li>
				<label>Número de Registros</label>
				<div class="form_input"><input type="text" name="numformu" required id="checkNumber"></div>
			    </li>
			    <li>
				<input type="submit" class="bluishBtn button_small" value="Generar Formulario" id="newFormu">
			    </li>
			</ul>
		    </div>
		    </form>
		</div>
	    </div>
	</div>
	<!-- Fin Insertar Registros -->
	<?php
	endif;
	?>
</div>