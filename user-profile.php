<div id="info-user"> 
    <div id="activity_stats">
        <?php
        $userName = new User();
        $rsUser = $userName->getAllInfoUser("", $_GET["user"]);
        $showuser = mysql_fetch_row($rsUser);
        $username = ucfirst($showuser[1]);
        
        // Muestra un cartel indicativo si es administrador o no
        $rsCheckPermm = mysql_fetch_array($userName->checkUser($_GET['user']));
        $checked = ($rsCheckPermm[1] == 1) ? "<a class='greenishBtn button_small' style='margin:5px;'>Administrador</a>" : "<a class='whitishBtn button_small' style='margin:5px;'>Usuario</a>";
        
        ?>
        <h3>Viendo el perfil de <?php echo  $username . " " . $checked; ?></h3>
    </div>
    <div id="quick_actions">
        <a href="index.php?d=admin" class="button_big" id="toggleReturnEditUser"><span class="iconsweet">w</span>Volver</a>
    </div>
    <div class="one_two_wrap fl_left">
        <!--Unordered List-->
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">a</span>
                <h5>Datos</h5>
            </div>
            <div class="widget_body">
                <div class="content_pad">
                    <ul class="form_fields_container">
                        <li>
                            <label>Usuario</label>
                            <div class="form_input">
                                <input type="text" id="currentUserName" onclick="saveButton('#saveNewUsername')" placeholder="Inserte un nuevo nombre de usuario para modificarlo"/>
                                <input type="hidden" id="currentUserID" value="<?php echo $_GET['user']; ?>" />
                                <a id="saveNewUsername" class="bluishBtn button_small" style="margin-top:10px; display: none;" onClick="updateUsername()">
                                    <span class="iconsweet">=</span>Guardar
                                </a>
                            </div>
                        </li>
                        <li>
                            <label>Clave</label>
                            <div class="form_input">
                                <input type="password" placeholder="¿Desea cambiar la contraseña?" id="changePass" name="currentUserPass">
                            </div>
                        </li>
                        <li>
                            <label>Confirmar Clave</label>
                            <div class="form_input">
                                <input type="password" placeholder="Inserte de nuevo la contraseña" id="confirmChangePass" name="currentUserPass" onfocus="saveButton('#saveNewPassword')">
                                <a id="saveNewPassword" class="bluishBtn button_small" style="margin-top:10px; display: none;">
                                    <span class="iconsweet">=</span>Guardar
                                </a>
                            </div>
                        </li>
                        <li>
                            <label>¿Administrador?</label>
                            <div class="form_input">
                                <span>
                                    <input type="radio" value="1" name="changePerm" id="currentPermissionAdmin" style="opacity: 0;" onclick="changePermission(this.id)">
                                </span>
                                <label>Si</label>
                            </div>
                            <div class="form_input">
                                <span>
                                    <input type="radio" value="0" name="changePerm" id="currentPermissionNoAdmin" style="opacity: 0;" onclick="changePermission(this.id)">
                                </span>
                                <label>No</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="one_two_wrap fl_right">
        <!--List Tick-->
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">1</span>
                <h5>Ciudades</h5>
            </div>
            <div class="widget_body">
                <div class="content_pad">
                    <p>En este panel usted puede asignar o desasignar ciudades al usuario actual. Recuerde que tiene que pulsar el botón de Guardar que aparece debajo para que se apliquen los cambios.</p>
                    <ul class="form_fields_container">
                        <li>
                            <label>Ciudades</label>
                            <?php
                            $printCity = new City();
                            $checked = new Common();
                            // Guarda en un array los ID's de las ciudades que tiene el usuario
                            $checkCU = $userName->getCityUser($_GET['user'], 1);
                            while($x = mysql_fetch_array($checkCU)){
                                $currentCity[] = $x['nCityID'];
                            }

                            $rsCity = $printCity->showCity();
                            while($rsCityPrint = mysql_fetch_assoc($rsCity)):
                            ?>
                            <div class="form_input">
                                <span>
                                    <input type="checkbox" id="<?php echo $rsCityPrint['nID']; ?>" style="opacity: 0;" <?php echo $checked->checkedBox($rsCityPrint['nID'], $currentCity); ?> onchange="changeCityUser(this.id)"/>
                                </span>
                                <label for="check1"><?php echo html_entity_decode(ucfirst($rsCityPrint['cName'])); ?></label>
                            </div>
                            <?php
                            endwhile;
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
