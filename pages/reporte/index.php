<?php
$reporte = new Stock();
$template = new Template();
?>
<div id="content_wrap">	<!--Activity Stats-->
    	<div id="activity_stats">
	    <h3>Generador de Reportes</h3>                        
        </div>                  
   
    <div class="one_wrap">
	<div class="widget">
	    <div class="widget_title"><span class="iconsweet">8</span>
		<h5>Explicación</h5>
	    </div>
	    
	    <form name="generareporte" method="post">
		<div class="widget_body">
		    <div class="content_pad">
			<h5>En este apartado usted podrá generar reportes relacionado con el campo Status y lo podrá exportar a un fichero csv</h5>
			<ul class="form_fields_container">
			    <li>
				<label>Status </label>
				<div class="form_input">
				    <input type="text" maxlength="18" placeholder="Inserte un Status para generar el informe" name="statusInforme">
				</div>
			    </li>
			    <li>
				<div class="form_input">
				    <input type="hidden" value="1" name="newinform">
				    <input type="submit" value="Generar Informe" class="button_small whitishBtn" style="width: 150px;">
				</div>
			    </li>
			</ul>
		    </div>
		</div>
	    </form>
	    
	</div>
    </div>
<?php
if(isset($_POST['newinform']) && $_POST['newinform'] == 1):
    $status = $reporte->generateReport($_POST['statusInforme']);
    
    if(mysql_num_rows($status) == 0):
?>
    <div class="one_wrap fl_left">
<?php
	$parametros = array("msg_Error", "X", "El status que ha insertado no se encuentra en la base de datos.");
	echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
?>
    </div>
<?php
    else:
?>
<div class="one_wrap">
    <div class="widget">
	    <div class="widget_title"><span class="iconsweet">f</span><h5>Reporte Generado</h5></div>
	<div class="widget_body">
	    
	    <?php
	    
	    
	    ?>
	    
	    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
		<tr>
		    <th width="15%">Items</th>
		    <th width="32%">Vestas ID</th>
		    <th width="12%">Service Call</th>
		    <th width="20%">From PO</th>
		    <th width="13%">Serial Number</th>
		    <th width="13%">MAC</th>
		    <th width="13%">Date Arrival</th>
		    <th width="13%">Status</th>
		    <th width="13%">Delivery Date</th>
		    <th width="13%">Location</th>
		    <th width="13%">Comments</th>
		</tr>
		<?php
		    while($reg = mysql_fetch_assoc($status)):
			$tabla[] = $reg['cItems'];
			$tabla[] = $reg['cVestasID'];
			$tabla[] = $reg['cService_Call'];
			$tabla[] = $reg['cFromPO'];
			$tabla[] = $reg['cSerial_Number'];
			$tabla[] = $reg['cMAC'];
			$tabla[] = $reg['dDate_Arrival'];
			$tabla[] = $reg['cStatus'];
			$tabla[] = $reg['dDelivery_date'] ;
			$tabla[] = $reg['ciudad'];
			$tabla[] = $reg['cComments'];
			$tabla[] = "\r\n";
		?>
		<tr>
		    <td><span><?php echo $reg['cItems']; ?></span></td>
		    <td><?php echo $reg['cVestasID']; ?></td>
		    <td><?php echo $reg['cService_Call']; ?></td>
		    <td><?php echo $reg['cFromPO']; ?></td>
		    <td><?php echo $reg['cSerial_Number']; ?></td>
		    <td><?php echo $reg['cMAC']; ?></td>
		    <td><?php echo $reg['dDate_Arrival']; ?></td>
		    <td><?php echo $reg['cStatus']; ?></td>
		    <td><?php echo $reg['dDelivery_date']; ?></td>
		    <td><?php echo $reg['ciudad']; ?></td>
		    <td><?php echo $reg['cComments']; ?></td>
		</tr>
		<?php
		    endwhile;
		?>
	    </table>
	    <div class="action_bar">
		<?php
		$tabla[] = join(";",$tabla);
		$reportes_file_name = "reportes.csv";
		$dir = "pages/reporte/";
                file_put_contents($dir . $reportes_file_name, $tabla, FILE_APPEND);
		?>
		<a class="button_small whitishBtn" href="<?php echo __URL__ ."/". $dir . $reportes_file_name; ?>"><span class="iconsweet">l</span>Exportar Tabla</a>
	    </div>
	</div>
    </div>
</div>
<?php
    endif;
endif;
?>
</div>