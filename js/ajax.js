/**
 * Archivo que hace las peticiones mediante
 * la tecnología AJAX a un archivo PHP centralizado
 */


/*
 * Comprueba si existe un usuario para luego entrar a index.php
 *
 * <input type="button" value="Entrar" id="entrar" onClick="userLogin($('#username').val(),$('#password').val());return false;">
 

function userLogin(user, pass){
        var parametros = {
                "usuario" : user,
                "contrasena" : pass
        };
        $.ajax({
                data:  parametros,
                url:   '../requestAjax.php',
                type:  'post',
                beforeSend: function () {
                        $("span#load").html("<img src='../images/loaders/load7.gif' alt='cargando' />");
                },
                success:  function (response) {
                        $("span#load").html(response);
                }
        });
}

 */