<!-- @@@@@@@ Modal Window - Delete User @@@@@@@-->
<div class="modal hide" id="confirmDelUser" >
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Confirmación de borrado</h3>
    </div>
    <div class="modal-body">
          <p>¿Está seguro que desea borrar al usuario seleccionado? Más adelante no lo podrá recuperar.</p>
    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="greyishBtn button_small" href="#">Cancelar</a>
        <a class="bluishBtn button_small" id="confirmDeleteUser">Borrar</a>
    </div>
</div>
<!-- @@@@@@@ End Modal Window @@@@@@@ -->

<!-- @@@@@@@ Modal Window - User Info @@@@@@@-->
<div class="modal hide" id="showInfoUser" >
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Información del Usuario {UserName}</h3>
    </div>
    <div class="modal-body">
        <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
                <th width="8%">ID</th>
                <th width="15%">Category</th>
                <th width="52%">Project(s)</th>
                <th width="25%">Actions</th>
            </tr>
        <tr>
            <td>4923</td>
            <td><span class="green_highlight pj_cat">Android</span></td>
            <td><a href="title">Eodem modo typi, qui nunc nobi...</a></td>
            <td>
                <span class="data_actions iconsweet">
                    <a class="tip_north" original-title="User" href="#">a</a>
                    <a class="tip_north" original-title="Edit" href="#">C</a>
                    <a class="tip_north" original-title="Delete" href="#">X</a>
                </span>
            </td>
        </tr>
        <tr>
            <td>3568</td>
            <td><span class="grey_highlight pj_cat">Flex</span></td>
            <td><a href="title">Eodem modo typi, qui nunc nobi...</a></td>
            <td>
                <span class="data_actions iconsweet">
                    <a class="tip_north" original-title="User" href="#">a</a>
                    <a class="tip_north" original-title="Edit" href="#">C</a>
                    <a class="tip_north" original-title="Delete" href="#">X</a>
                </span>
            </td>
        </tr>

        </table>
    </div>
    <div class="modal-footer">
    <a data-dismiss="modal" class="greyishBtn button_small" href="#">Cerrar</a>
    </div>
</div>
<!-- @@@@@@@ End Modal Window - User Info @@@@@@@-->