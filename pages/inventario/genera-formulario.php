<div id="quick_actions">
    <a href="index.php?d=stock" class="button_big"><span class="iconsweet">w</span>Volver a la sección Inventario</a>
</div>
<?php

// Insercción de Registros
if(isset($_GET['newinsert']) && $_GET['newinsert'] == 1):
    $numReg = $_POST['numeroregistros'];    // Nº de registros
    
    $i = 1;
    $regnum = 0;
    while($i <= $numReg):
        
        $arg["item"]           =   $_POST['item' . $i];
        $arg["vestasid"]       =   $_POST['vestasid' . $i];
        $arg["servicecall"]    =   $_POST['servicecall' . $i];
        $arg["from"]           =   $_POST['from' . $i];
        $arg["serialnumber"]   =   $_POST['serialnumber' . $i];
        $arg["mac"]            =   $_POST['mac' . $i];
        $arg["datearrival"]    =   $_POST['datearrival' . $i];
        $arg["status"]         =   $_POST['status' . $i];
        $arg["deliverydate"]   =   $_POST['deliverydate' . $i];
        $arg["selectcity"]  =   $_POST['selectcity' . $i];
        $arg["comments"]       =   $_POST['comments' . $i];
        
        $insertRegister = new Upload();
        if($insertRegister->insertReg($arg)){
            $regnum++;   
        }

        $i++;
    endwhile; 
?>
<div class="one_wrap fl_left">
    <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Registros</h5></div>
        <div class="widget_body">
            <div class="content_pad">
                <?php
                // Mensaje de insercción
                $advice = new Template();
                if($regnum == $numReg){
                    $content = array("msg_Success", "=", "Los registros se insertaron corréctamente");
                    echo $advice->notice($content);
                }
                else{
                    $content = array("msg_Error", "X", "Ocurrió un problema al insertar los registros");
                    echo $advice->notice($content);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?
else:

$numFormu = $_POST['numformu'];
?>

<!-- Comienza el Formulario -->
<form name="upReg" method="post" action="<?php echo __URL__ . "/index.php?d=stock&n=1&newinsert=1"; ?>">

    <input type="hidden" name="numeroregistros" value="<?php echo $numFormu; ?>">

<div class="one_wrap fl_left">
    <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Guardar</h5></div>
        <div class="widget_body">
            <input type="submit" value="Insertar Registros" class="bluishBtn button_small" style="margin:10px">
        </div>
    </div>
</div>
<?php
    $i = 1;
    
    //cambia la clase dependiendo del nº de iteración
    function changeClass($num){
        echo $rs = ($num % 2 == 0) ? "fl_right" : "fl_left";
    }
    
    while($i <= $numFormu):
?>
<div class="one_two_wrap <?php echo changeClass($i);?>">

    <div class="widget">
        <div class="widget_title"><span class="iconsweet">}</span>
            <h5>Formulario Número <?php echo $i;?></h5>
        </div>
        <div class="widget_body">
            <div class="content_pad">
                <ul class="form_fields_container">
                    <li>
                        <label>Item</label>
                        <div class="form_input"><input type="text" name="item<?php echo $i;?>" maxlength="40" required></div>
                    </li>
                    <li>
                        <label>Vestas ID</label>
                        <div class="form_input"><input type="text" name="vestasid<?php echo $i;?>" maxlength="15"></div>
                    </li>
                    <li>
                        <label>Service Call</label>
                        <div class="form_input"><input type="text" name="servicecall<?php echo $i;?>" maxlength="15"></div>
                    </li>
                    <li>
                        <label>From</label>
                        <div class="form_input"><input type="text" name="from<?php echo $i;?>" maxlength="15"></div>
                    </li>
                    <li>
                        <label>Serial Number</label>
                        <div class="form_input"><input type="text" name="serialnumber<?php echo $i;?>" maxlength="18"></div>
                    </li>
                    <li>
                        <label>Mac</label>
                        <div class="form_input"><input type="text" name="mac<?php echo $i;?>" maxlength="15"></div>
                    </li>
                    <li>
                        <label>Date Arrival</label>
                        <div class="form_input"><input type="text" name="datearrival<?php echo $i;?>" style="width:20%"> (dd-mm-yyyy)</div>
                    </li>
                    <li>
                        <label>Status</label>
                        <div class="form_input"><input type="text" name="status<?php echo $i;?>" required maxlength="18"></div>
                    </li>
                    <li>
                        <label>Delivery Date</label>
                        <div class="form_input"><input type="text" name="deliverydate<?php echo $i;?>" style="width:20%"> (dd-mm-yyyy)</div>
                    </li>
                    <li>
                        <label>Location </label>
                        <div class="form_input">
                            <select name="selectcity<?php echo $i;?>">
                                <option value="0" selected="selected">Seleccione una ciudad</option>
                                <?php
                                $ciudades = new City();
                                $objCity = $ciudades->showCity();
                                while($rsCity = mysql_fetch_assoc($objCity)):
                                    echo "<option value='" . $rsCity['nID'] . "'>" . html_entity_decode($rsCity['cName']) . "</option>";
                                endwhile;
                                ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Comments</label>
                        <div class="form_input"><input type="text" name="comments<?php echo $i;?>" maxlength="40"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
    $i++;
endwhile;
?>
<div class="one_wrap fl_left">
    <div class="widget">
            <div class="widget_title"><span class="iconsweet">r</span><h5>Guardar</h5></div>
        <div class="widget_body">
            <input type="submit" value="Insertar Registros" class="bluishBtn button_small" style="margin:10px">
        </div>
    </div>
</div>
<input type="hidden" value="1" name="nuevosreg">
</form>
<?php
endif;
?>