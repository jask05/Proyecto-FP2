<div id="quick_actions">
    <a href="index.php?d=stock&amp;showinventario=1" class="button_big btn_grey" id="toggleReturnEditUser">
        <span class="iconsweet">c</span>
        Ver Inventario
    </a>
</div>
<?php
$template = new Template();
$content = mysql_fetch_assoc($stock->showOneReg($_GET['editareg']));

$location   = $content['nLocation'];

$date2 = new Common();

?>
<form name="updateregistro" method="post" enctype="">
    <div class="one_wrap">
        <?php
        if($stock->showEditButton($id, $permiso, $location)):
        
            // Subiendo...
            if(isset($_POST['envioupdate']) && $_POST['envioupdate'] == 1):
		$arg["id"]             =   $_GET['editareg'];
                $arg["item"]           =   $_POST['item'];
                $arg["vestasid"]       =   $_POST['vestasid'];
                $arg["servicecall"]    =   $_POST['servicecall'];
                $arg["from"]           =   $_POST['from'];
                $arg["serialnumber"]   =   $_POST['serialnumber'];
                $arg["mac"]            =   $_POST['mac'];
                $arg["datearrival"]    =   $_POST['datearrival'];
                $arg["status"]         =   $_POST['status'];
                $arg["deliverydate"]   =   $_POST['deliverydate'];
                $arg["city"]           =   $_POST['newcity'];
                $arg["comments"]       =   $_POST['comments'];
                                
                $update = new Upload();
                
                if($update->updateReg($arg)):
                    $parametros = array("msg_Success", "=", "El registro se ha actualizado corréctamente.");
                    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
                else:
                    $parametros = array("msg_Error", "X", "Ha ocurrido un error al actualizar el registro.");
                    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
                endif;
                
            else:
        ?>
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">}</span>
                <h5>Modificando el registro <?php echo $_GET['editareg'];?></h5>
            </div>
            <div class="widget_body">
                <div class="content_pad">
                    <ul class="form_fields_container">
                        <li>
                            <label>Item</label>
                            <div class="form_input"><input type="text" name="item" maxlength="40" value="<?php echo $content['cItems']; ?>" required></div>
                        </li>
                        <li>
                            <label>Vestas ID</label>
                            <div class="form_input"><input type="text" name="vestasid" value="<?php echo $content['cVestasID']; ?>" maxlength="15"></div>
                        </li>
                        <li>
                            <label>Service Call</label>
                            <div class="form_input"><input type="text" name="servicecall" value="<?php echo $content['cService_Call']; ?>" maxlength="15"></div>
                        </li>
                        <li>
                            <label>From</label>
                            <div class="form_input"><input type="text" name="from" value="<?php echo $content['cFromPO']; ?>" maxlength="15"></div>
                        </li>
                        <li>
                            <label>Serial Number</label>
                            <div class="form_input"><input type="text" name="serialnumber" value="<?php echo $content['cSerial_Number']; ?>" maxlength="18"></div>
                        </li>
                        <li>
                            <label>Mac</label>
                            <div class="form_input"><input type="text" name="mac" value="<?php echo $content['cMAC']; ?>" maxlength="15"></div>
                        </li>
                        <li>
                            <label>Date Arrival</label>
                            <div class="form_input"><input type="text" name="datearrival" value="<?php echo $date2->changeDate($content['dDate_Arrival']); ?>" style="width:20%"> (dd-mm-yyyy)</div>
                        </li>
                        <li>
                            <label>Status</label>
                            <div class="form_input"><input type="text" name="status" value="<?php echo $content['cStatus']; ?>" required maxlength="18"></div>
                        </li>
                        <li>
                            <label>Delivery Date</label>
                            <div class="form_input"><input type="text" name="deliverydate" value="<?php echo $date2->changeDate($content['dDelivery_date']); ?>" style="width:20%"> (dd-mm-yyyy)</div>
                        </li>
                        <li>
                            <label>Location </label>
                            <div class="form_input">
                                <select name="newcity">
                                    <option value="0">Seleccione una ciudad</option>
                                    <?php
                                    $ciudades = new City();
                                    $objCity = $ciudades->showCity();
                                    while($rsCity = mysql_fetch_assoc($objCity)):
                                        if($content['nLocation'] == $rsCity['nID']):
                                            echo "<option value='" . $rsCity['nID'] . "' selected='selected'>" . html_entity_decode($rsCity['cName']) . "</option>";
                                        else:
                                            echo "<option value='" . $rsCity['nID'] . "'>" . html_entity_decode($rsCity['cName']) . "</option>";
                                        endif;
                                        
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>Comments</label>
                            <div class="form_input"><input type="text" name="comments" value="<?php echo $content['cComments']; ?>" maxlength="40"></div>
                        </li>
                    </ul>
                </div>
                <div class="action_bar">
                    <input type="submit" value="Modificar Registro" class="bluishBtn button_small" style="margin:10px">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="1" name="envioupdate">
</form>

<?php
    endif;
else:    
    $parametros = array("msg_Error", "X", "No tienes permiso para ver esta sección.");
    echo "<div id='content_wrap'>" . $template->notice($parametros) . "</div>";
endif;
?>
