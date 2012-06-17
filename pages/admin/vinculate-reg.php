<?php
if($permiso != 1):
    $parametros = array("msg_Error", "X", "No tienes permiso para ver esta sección.");
    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
else:

$ciudades = new City();
$stock = new Stock();
$advice = new Template();
$upload = new Upload();

//$search = array("nLocation", 0, array("campo" => "nID", "ascordesc" => "DESC"), array("start" => "", "end" => ""));
//$stock_showAllStock = $stock->showAllStock($search);
$stock_showAllStock = $stock->stockWithoutLocation();

?>
<div id="activity_stats">
	<h3>Resumen</h3>
    <div class="activity_column">
	<span class="iconsweet">!</span> <span class="big_txt rd_txt">
	<?php
            $order = array("nID", "DESC", "");
            $ciudades_Totales = $ciudades->showCity();
            $ciuTotlaes = mysql_num_rows($ciudades_Totales);
	?>
	</span>
	<?php echo "Hay un total de " . mysql_num_rows($stock_showAllStock) . " registros sin asignar."; ?> 
    </div>
</div>

<!-- Mensaje al actualizar -->
<div class="one_wrap">
<?php

if(isset($_POST['relationSelect'], $_POST['valueofrelated']) && $_POST['relationSelect'] > 0):
    $selectValue    = $_POST['relationSelect'];
    $IDrelation     = $_POST['valueofrelated'];
    
    if($upload->updateRelations($IDrelation, $selectValue)):
        $content = array("msg_Success", "=", "La ficha " . $IDrelation . " se ha actualizado corréctamente.");
        echo $advice->notice($content);
    else:
        $content = array("msg_Error", "X", "Ha ocurrido un error al actualizar la ficha " . $IDrelation);
        echo $advice->notice($content);
    endif;
endif;
?>
</div>
<!-- FIN Mensaje al actualizar -->

<div class="one_wrap">
    <div class="widget">
	<!-- @@@@@@@ Vinculación de registros perdidos @@@@@@@ -->
	<div class="widget_title"><span class="iconsweet">1</span><h5>Registros sin localización</h5></div>
	<div class="widget_body">
	
	    <!--Activity Table-->
	    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
		<tr>
		    <th width="8%">ID</th>
		    <th width="15%">Item</th>
                    <th width="15%">Service Call</th>
                    <th width="15%">Serial Number</th>
                    <th width="15%">Status</th>
                    <th width="15%">Delivery Date</th>
		    <th width="12%">Associate</th>
		    <!-- <th width="13%">Acción</th> -->
		</tr>
		<?php
                $i = 1;
		while($showStock = mysql_fetch_assoc($stock_showAllStock)):
		?>
		<tr>
		    <td id="<?php echo $showStock['nID']; ?>"><?php echo $showStock['nID']; ?></td>
		    <td><?php echo $showStock['cItems']; ?></td>
                    <td><?php echo $showStock['cService_Call']; ?></td>
                    <td><?php echo $showStock['cSerial_Number']; ?></td>
                    <td><?php echo $showStock['cStatus']; ?></td>
                    <td><?php echo $showStock['dDelivery_date']; ?></td>
                    <td>
                        <form name="submitRelated<?php echo $i; ?>" method="post">
                        <select id="associateCity<?php echo $i; ?>" name="relationSelect">
                            <option value="0" selected="selected">Seleccione una ciudad</option>
                            <?php
                            $objCity = $ciudades->showCity();
                            while($rsCity = mysql_fetch_assoc($objCity)):
                                echo "<option value='" . $rsCity['nID'] . "'>" . html_entity_decode($rsCity['cName']) . "</option>";
                            endwhile;
                            ?>
                        </select>
                        <input type="hidden" value="<?php echo $showStock['nID']; ?>" name="valueofrelated">
                        <input type="submit" value="Guardar" class="button_small bluishBtn">
                        </form>
                    </td>
		</tr>
		<?php
                $i++;
		endwhile;
		?>
	    </table>
            <div class="action_bar">
                <a class="button_small bluishBtn" id="newUser"><span class="iconsweet">=</span>Guardar</a>
                <a class="button_small whitishBtn tip_west" original-title="Forma rápida de asignar todos los registros a una misma ciudad"><span class="iconsweet">l</span>Asociación Múltiple</a>
                <select id="associateCity">
                    <option value="0" selected="selected">Seleccione una ciudad</option>
                    <?php
                    $objCity = $ciudades->showCity();
                    while($rsCity = mysql_fetch_assoc($objCity)):
                        echo "<option value='" . $rsCity['nID'] . "'>" . html_entity_decode($rsCity['cName']) . "</option>";
                    endwhile;
                    ?>
                </select> 
            </div>
	</div>
	<!-- @@@@@@@ Vinculación de registros perdidos @@@@@@@ -->
    </div> 
</div>
<?php
endif;
?>