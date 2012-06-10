<div id="info-user"> 
    <div id="activity_stats">
        <?php
        $userName = new User();
        $rsUser = $userName->getAllInfoUser("", $_GET["user"]);
        $showuser = mysql_fetch_row($rsUser);
        $username = ucfirst($showuser[1]);
        ?>
        <h3>Viendo el perfil de <?php echo  $username; ?></h3>
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
                                    <input type="radio" value="1" name="changePerm" id="currentPermissionAdmin" style="opacity: 0;">
                                </span>
                                <label>Si</label>
                            </div>
                            <div class="form_input">
                                <span>
                                    <input type="radio" value="0" name="changePerm" id="currentPermissionNoAdmin" style="opacity: 0;">
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
                            <div class="form_input">
                                <span>
                                    <input type="checkbox" id="check1" style="opacity: 0;">
                                </span>
                                <label for="check1">Checkbox - Un Checked</label>
                            </div>
                            <div class="form_input">
                                <span class="checked">
                                    <input type="checkbox" id="check1" checked="" style="opacity: 0;">
                                </span>
                                <label for="check1">Checkbox - Checked</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
