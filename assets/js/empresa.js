/**
 * Created by J. Betancourt on 17/10/2015.
 */




for (x=1;x<=30;x++) {

    $("#fechaDP"+x).multiDatesPicker({
        minDate: "0",
        firstDay: 1 ,
        showWeek: true,
        showButtonPanel: true,
        dateFormat: "yy-dd-mm",



    });
}


//http://api.jqueryui.com/datepicker/#option-minDate
//http://multidatespickr.sourceforge.net/


function borrar(id, nombre){
    confirm(function(){
        $.ajax({
            data: {'id':id},
            url: "imagenes/borrarImagen",
            type: "GET",
            dataType: "json",
            error: function(){
                console.log("Error");
                errorAlert('La imagen no fue eliminada');
            },
            success:function(data){
                setTimeout(function(){
                    location.reload();
                }, 4000);
                successAlert('Exito al eliminar la imagen "'+ nombre +'"' );
                console.log(data);
            }
        })
    }, function(){ });
    return false;
}

//----------------Imagenes
function getInfo(id){
    console.log('editar',id);
    $.ajax({
        data: {'id':id},
        url: "imagenes/getinfo",
        type: "GET",
        dataType: "json",
        error: function(){
            console.log("Error");
        },
        success:function(data){
            $("[id^=titulo]").val(data.data.titulo);
            $("[id^=descripcion]").val(data.data.descripcion);
            $("[id^=restriccion]").val(data.data.restriccion);
            $("[id^=ubi]").val(data.data.ubicacion);
            $("[id^=info]").val(data.data.info_extra);
                      
              $( "#fechaDP1" ).multiDatesPicker({
                setDate: "2012/10/12"
              });
            


           
            //$("[id^=fechaDP]").val(data.data.diaspromo);
        }
    })

}


$(document).ready(function(){
    $("#submit").click(function(event) {
        event.preventDefault();

        $.ajax({
            url: "imagenes/update",
            type: "POST",
            data: $('#formulario_act').serialize(),
            error: function(){
                console.log("Error");
            },
            success:function(data){
                console.log("Exito");
                console.log(data);
            }
        });

    });
    return false;
});

/*
 http://www.maestrosdelweb.com/diez-funciones-imprescindibles-en-javascript/
 */
