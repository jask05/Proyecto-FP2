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

<!-- @@@@@@@ Modal Window - Usuarios Relacionados con una Ciudad @@@@@@@-->
<div class="modal hide" id="showSearch" >
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Usuarios Asociados</h3>
    </div>
    <div class="modal-body">
        <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8" id="asociatedUsersModalWindows">
        </table>
    </div>
    <div class="modal-footer">
    <a data-dismiss="modal" class="greyishBtn button_small" href="#">Cerrar</a>
    </div>
</div>
<!-- @@@@@@@ Modal Window - Usuarios Relacionados con una Ciudad  @@@@@@@-->