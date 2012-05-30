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
            data: "city="+val,
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
                        },5000);
                    }
                },
            error: function(){
                nombreCiudad.val("La ciudad no se ha añadido. Puede que ya exista.");
                nombreCiudad.removeClass().addClass("in_error");
            },
            timeout: 4000
        });    
    });
    
});
