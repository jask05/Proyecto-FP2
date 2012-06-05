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
            data: "newCity="+val,
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
            /*
            beforeSend: function(){
                    nombreCiudad.addClass("in_processing");
                },
            */
            success: function(datos){
                    alert("El usuario se creó corréctamente");
                    location.reload();
                    /*
                     
                        hacer que cuando se añada el usuario salga la modal windows
                        y cuando le de a aceptar refresque la página :)
                     
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
                        },5000);
                    }
                    */
                },
            error: function(){
                alert("No llegaron");
                /*
                nombreCiudad.val("La ciudad no se ha añadido. Puede que ya exista.");
                nombreCiudad.removeClass().addClass("in_error");
                */
            },
            timeout: 4000
        });
       
    });
    
});
