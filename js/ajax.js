$(document).ready(function(){
    
    // Añade una ciudad
    $("#addCity").click(function(){
        var nombreCiudad = $("#nombreCiudad");
        var val = nombreCiudad.val();
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "lib/ajax.php",
            data: "newCity=1&newCityName="+val,
            beforeSend: function(){
                    nombreCiudad.addClass("in_processing");
                },
            success: function(datos){
                    if(datos != 1)
                    {
                        nombreCiudad.val("La ciudad no se ha añadido. Puede que ya exista.");
                        nombreCiudad.removeClass().addClass("in_error");
                        setTimeout(function(){
                            nombreCiudad.removeClass().val("");
                        },5000);
                    }
                    else
                    {
                        nombreCiudad.removeClass().addClass('in_submitted');
                        nombreCiudad.val("La ciudad se ha creado corréctamente");
                        setTimeout(function(){
                            nombreCiudad.slideUp(600).removeClass().val("").fadeIn(800);
                            location.reload();
                        },3000);
                    }
                },
            error: function(){
                nombreCiudad.val("La ciudad no se ha añadido. Puede que ya exista.");
                nombreCiudad.removeClass().addClass("in_error");
            },
            timeout: 4000
        });    
    });
    
    // Añade un nuevo usuario
    $("#newUser").click(function(){
       var nick = $('#userNick');
       var pass = $('#userPass');
       var city = $('#selectCityNewUser');
       var checkedAdmin = $('#admin'); //.is(':checked');  TRUE o FALSE
       var checkUser = $('#noAdmin');
       
       // Eliminando la clase del input por si se corrigiesen errores.
       nick.removeClass();
       pass.removeClass();
       
       if(nick.val() == "" || nick.val().length < 4){
            nick.removeClass().addClass("in_error");
            alert("Es obligatorio insertar un nombre de usuario. Debe tener más de 4 caracteres.");
       }
       
       if(pass.val() == "" || pass.val().length < 6){
            pass.removeClass().addClass("in_error");
            alert("Es obligatorio insertar una contraseña. Tiene que tener más de 6 caracteres.");
       }
       
       if(city.val() == 0){
        alert("Debes escoger una ciudad.");
       }
       
       var permission = 1;       
       if(!checkedAdmin.is(':checked')){
            if(!checkUser.is(':checked')){
                alert("Debes escoger si será un usuario común o con permisos de administrador.");
            }
            else{
                permission = 0;    
            }
       }
       
       $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "lib/ajax.php",
            data: "newUser=1&nick="+nick.val()+"&pass="+pass.val()+"&city="+city.val()+"&admin="+permission,
            success: function(datos){
                    alert("El usuario se creó corréctamente");
                    location.reload();
                },
            error: function(){
                alert("Ha ocurrido un error. Por favor vuelva a intentarlo.");
            },
            timeout: 4000
        });
       
    });
    
    // Borrar un usuario
    $('[name="deluser"]').click(function(){
       var idUserToDel = this.id;
       $('#confirmDeleteUser').click(function(){
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url: "lib/ajax.php",
                data: "delUser="+idUserToDel,
                success: function(datos){
                        alert("El usuario se ha borrado corréctamente");
                        location.reload();
                    },
                error: function(){
                    alert("Ha ocurrido un error. Por favor vuelva a intentarlo.");
                },
                timeout: 4000
            });
       });
    });
    
    // Comprueba y modifica la contraseña
    var pwd1 = $('#changePass');
    var pwd2 = $('#confirmChangePass');
    var saveButton = $('#saveNewPassword');
    var currentUserID = $('#currentUserID').val();
    
    saveButton.click(function(){
        if(pwd1.val() != pwd2.val()){
            pwd1.addClass('in_error');
            pwd2.addClass('in_error');
            alert("La contraseña que ha insertado no coinciden.");
        }
        else{
            if(pwd1.val().length < 6 || pwd2.val().length < 6){
                alert("La contraseña debe tener, por lo menos, 6 caracteres.");
                pwd1.focus();
            }
            else{
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    url: "lib/ajax.php",
                    data: "newpasswd="+pwd1.val()+"&userid="+currentUserID,
                    beforeSend: function(){
                        pwd1.addClass('in_submitted');
                        pwd2.addClass('in_submitted');
                    },
                    success: function(datos){
                        if(datos == 1){
                            pwd1.addClass('in_processing');
                            pwd2.addClass('in_processing');
                            alert("La contraseña se ha modificado corréctamente.");
                            location.reload();
                        }
                        else{
                            alert("Ha ocurrido un error al modificar la contraseña. Por favor inténtelo de nuevo");
                        }   
                        
                    },
                    error: function(){
                        alert("Ha ocurrido un error. Por favor vuelva a intentarlo.");
                    },
                    timeout: 4000
                });
            }
        }
    })
});

// Aparece el botón de 'Guardar'
function saveButton(buttonSaveID){
    $(buttonSaveID).slideToggle('slow');
}
    
// Actualizar nombre de usuario
function updateUsername(){
    var currentUsername = $('#currentUserName');
    var currentUserID = $('#currentUserID').val();
    
    if(currentUsername.val() == ""){
        alert("Debe insertar un nombre. No puede estar vacío.");
        currentUsername.focus();
        return false;
    }
    
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "lib/ajax.php",
        beforeSend: function(){
            currentUsername.addClass("in_processing");
        },
        data: "changeusername="+currentUsername.val()+"&id="+currentUserID,
        success: function(str){
                console.log(str);
                if(str == "error"){
                    alert("No se ha podido modificar el nombre. Compruebe que no exista un usuario con ese nombre.");
                    currentUsername.addClass('in_error');
                    currentUsername.val("");
                    currentUsername.focus();
                    setTimeout(function(){
                        currentUsername.removeClass();
                    }, 6000);
                }
                else{
                    alert("El nombre de usuario ha sido modificado satisfactóriamente.");
                    currentUsername.addClass('in_submitted');
                    location.reload();
                }
            },
        error: function(){
            alert("Error interno. Por favor contacte con un administrador.");
            currentUsername.addClass("in_error");
        },
        timeout: 4000
    });
    
    return true;
}