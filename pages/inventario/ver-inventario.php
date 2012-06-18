<?php
$ciudades 	= new City();
$stock 		= new Stock();
$advice 	= new Template();
$upload 	= new Upload();


?>
<div id="activity_stats">
	<h3>Resumen</h3>
    <div class="activity_column">
	<span class="iconsweet">8</span> <span class="big_txt rd_txt">
	<?php
	    $rs_stock = $stock->allStock();
	    $rs_stockTotal = mysql_num_rows($rs_stock);
	?>
	</span>
	<?php echo "Hay un total de " . $rs_stockTotal . " registros"; ?> 
    </div>
</div>


<?php
/*
$regXpag = 20;
$page = 1;
$totalPages = ceil($rs_stockTotal / $regXpag);

$totalReg = $stock->allStockWithLimit($page, $regXpag);
*/
?>

<?php
if(isset($_GET['editareg']) && is_numeric($_GET['editareg'])):
    include('edit-registros.php');
else:
?>

<div class="one_wrap">
    <div class="widget">
	<!-- @@@@@@@ Registros Totales @@@@@@@ -->
	<div class="widget_title"><span class="iconsweet">1</span><h5>Registros</h5></div>
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
		    <th width="12%">Location</th>
		    <th width="13%">Acción</th>
		</tr>
		<?php
		while($showStock = mysql_fetch_assoc($rs_stock)):
		?>
		<tr>
		    <td id="<?php echo $showStock['nID']; ?>"><?php echo $showStock['nID']; ?></td>
		    <td><?php echo $showStock['cItems']; ?></td>
                    <td><?php echo $showStock['cService_Call']; ?></td>
                    <td><?php echo $showStock['cSerial_Number']; ?></td>
                    <td><?php echo $showStock['cStatus']; ?></td>
                    <td><?php echo $showStock['dDelivery_date']; ?></td>
		    <td><?php echo $showStock['ciudad']; ?></td>
		    <td>
			<span class="data_actions iconsweet">
			    <?php
			    if($stock->showEditButton($id, $permiso, $showStock['nLocation'])):
			       echo "<a class='tip_east' original-title='Editar' href='index.php?d=stock&showinventario=1&editareg=" . $showStock['nID'] . "'>a</a>";
			    endif;
			    ?>
			</span>
			<?php
			?>
		    </td>
		</tr>
		<?php
		endwhile;
		?>
	    </table>
	</div>
	<!-- @@@@@@@ FIN Registros Totales @@@@@@@ -->
    </div> 
</div>
<?php
endif;
?>