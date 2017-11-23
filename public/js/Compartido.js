
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});


//hace la logica del controller, recibe los datos del formulario y hace un redirect a la pagina enviada desde
//el controller
function AjaxContainerRegistro($formulario) {
    $("#target").LoadingOverlay("show");

    //event.preventDefault();

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#loadingScreen").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}




//************************************************************************//
//               FUNCION PARA IR AL BOOKING EXTERNO                       //
//************************************************************************//
function RenderBooking($id_usuario_operador, $id_usuario_servicio) {


var url = "/booking/"+$id_usuario_servicio;
var redirect;
console.log(url);
        $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data:"",
        
        success: function (data) {
            console.log(data);
            
            //console.log(data.redirectto);
            window.open(data.redirecto, '_blank');
            //window.location.href = data.redirectto;
        },
        error: function (data) {
             
             //window.open(data.redirecto, '_blank');
            redirect= JSON.parse(data.responseText);
             window.open(redirect.redirectto, '_blank');
             //console.log(redirect.redirectto);
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


//************************************************************************//
//    FUNCION PARA IR AL SETTING DEL CALENDARIO EN EL BOOKING             //
//************************************************************************//
function RenderBookingCalendario($id_usuario_operador, $id_usuario_servicio, $calendar_id) {

var url = "/bookingCalendario/"+$id_usuario_servicio+"/"+$calendar_id;
console.log(url);
        $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}



//retorna un mensaje despues de ejecutar la logica del controller
function AjaxSaveDetailsFotografiaProfile($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImageProfile=update';
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            




        } //success
    }); //done

}



//retorna un mensaje despues de ejecutar la logica del controller
function AjaxSaveDetailsFotografia($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            




        } //success
    }); //done

}




//************************************************************//

//*********************************************************//
function AjaxContainerVistaPreviaPromocion($id_promocion) {
    
    $("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/vistaPreviaPromocion/"+ $id_promocion;

        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            console.log(data.redirectto);
            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerEdicionPromociones($id_promo) {
    
    var url = "/promocionPreview/"+$id_promo;
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {

            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function AjaxContainerVistaPreviaEvento($id_evento) {
    
    $("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/vistaPreviaEvento/"+ $id_evento;

        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {

            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerEdicionEventos($id_promo) {
    
    var url = "/eventoPreview/"+$id_promo;
      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
           
            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function UpdateEstadoError(url) {
    
    $("#target").LoadingOverlay("show");
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#target").LoadingOverlay("hide", true);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}





//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoad($formulario, $loadScreen) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("."+$loadScreen).LoadingOverlay("show");

    //event.preventDefault();

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("."+$loadScreen).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunMessagePostParametro($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            
            
            window.location.href = data.redirectto;




        } //success
    }); //done

}






//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoadCharge($formulario, $loadScreen,$itinerario) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("."+$loadScreen).LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("."+$loadScreen).LoadingOverlay("hide", true);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            alert("El itinerario ha sido agregado. Puede modificar los campos para agregar un nuevo itinerario")
            
            GetDataAjaxSectionItiner("/getlistaItinerarios/"+$itinerario);
        } 
    });
}



//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithMessage($formulario, $loadScreen,$message) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("."+$loadScreen).LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("."+$loadScreen).LoadingOverlay("hide", true);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            alert($message);
            
            
        } 
    });
}



//dado un parcial nombre de la carpeta incluido
//lo materializa en el lugar indicado
function RenderPartialGeneric($idPartial, $id_usuario_servicio) {

callModal('cls');
    var url = "/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_usuario_servicio').val($id_usuario_servicio);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}




function RenderPartialGenericFotografia($idPartial, $id_catalogo_fotografia,$id_usuario_servicio,$id_auxiliar) {

    
callModal('cls');
    var url = "/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('#id_catalogo_fotografia').val($id_catalogo_fotografia);
        $('#basic-modal-content').find('#id_usuario_servicio').val($id_usuario_servicio);
        $('#basic-modal-content').find('#id_auxiliar').val($id_auxiliar);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}




//Renderiza el parcial Map, es una logica diferente ya que hay conflictos
//con el load screen
function RenderPartialGenericMap($idPartial, $itiner) {

    callModalMap('cls');

    var url = "/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);

    });
}


function UpdateEstado(url) {
    $("#target").LoadingOverlay("show");
    $.ajax({
    type: 'GET',
    url: url,
    dataType: 'json',
        success: function (data) {
            $("#target").LoadingOverlay("hide", true);
        },
        error: function (data) {
            var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
        });
}

function RenderPartialGenericMapUpdate($idPartial, $itiner, $id_detalle) {

    callModalMap('cls');

    var url = "/render/" + $idPartial+"/"+$id_detalle;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);
        $('#basic-modal-content').find('.id_detalle').val($id_detalle);


    });
}


function RenderPartialPadre($idPartial, $id_catalogo_servicio, $id_usuario_operador,$padre) {

    callModalMap('cls');

    var url = "/render/" + $idPartial+"/"+$padre;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_catalogo_servicio').val($id_catalogo_servicio);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
        $('#basic-modal-content').find('.id_padre').val($padre);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);


    });
}

function RenderPartial($idPartial, $id_catalogo_servicio, $id_usuario_operador) {

    callModal('cls');

    var url = "/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_catalogo_servicio').val($id_catalogo_servicio);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });

}

function GetDataAjax(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $('#renderPartial').LoadingOverlay("show");
            $('#renderPartial').html(data.dificultades);
            $('#renderPartial').LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSection(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartial").LoadingOverlay("show");
            $("#renderPartial").html(data.contentPanel);
            $("#renderPartial").LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSectionEventos(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartialListaServicios").LoadingOverlay("show");
            $("#renderPartialListaServicios").html(data.contentPanelServicios);
            $("#renderPartialListaServicios").LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxImagenes(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#renderPartialImagenes").html(data.contentImagenes);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxProvincias(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#provincias").html(data.provincias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxCantones(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#canton").html(data.cantones);
            

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxDescripcion(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


//******************************************************//
//                  NUEVAS FUNCIONES                    //
//******************************************************//
function ReportarErrores(url) {
    
    $("#modalerrores").LoadingOverlay("show");
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.guardar);
            $("#modalerrores").LoadingOverlay("hide", true);
            //$('#errores').modal('hide');
            $("#errores .close").click();
            swal(
            'Muchas Gracias!',
            'Atenderemos su Solicitud!',
            'success'
          )
  
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
    
}


function PostErrores($formulario, $id) {
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#modalerrores1").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize();
    url = $form.attr("action");       
   
        var posting = $.post(url, {formData: data});
        posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            //alert(data.guardar);
            $("#modalerrores1").LoadingOverlay("hide", true);
            $("#errorguardar .close").click();
            swal(
            'Muchas Gracias!',
            'Nos Comunicaremos a la brevedad posible!',
            'success'
          )

        } //success
    }); //done
}

function PostContactosNuevo($formulario,$id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#target").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize();
    url = $form.attr("action");
    
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#nombres,#email,#telefono").val("");  
            $("#target").LoadingOverlay("hide", true);
            swal(
            'Muchas Gracias!',
            'Atenderemos su Solicitud!',
            'success'
          )
         
  
        } //success
    }); //done

}


function GetDataAjaxParroquias(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#parroquia").html(data.parroquias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxSectionItiner(url,$id_usuario_servicio) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartialItinerarios").LoadingOverlay("show");
            $("#renderPartialItinerarios").html(data.contentPanelItinerarios);
            $('#renderPartialItinerarios').find('.id_usuario_servicio').val($id_usuario_servicio);
            $("#renderPartialItinerarios").LoadingOverlay("hide", true);

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}






//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunMessage($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            




        } //success
    }); //done

}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURL($urlS,$formulario, $id, $load) {
    $('.error').html('');

    
    $("#".$load).LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    
    var url =$urlS + $id;
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

        }
        if (data.success) {
            $("#".$load).LoadingOverlay("hide", true);
        


        } //success
    }); //done

}



//agrega un parametro a la lista de objetos enviados al controller
//hace la misma logica que las funciones anteriores
function AjaxContainerRegistroParametro($formulario, $parametro) {


    $("#loadingScreen").LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#loadingScreen").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}


function AjaxContainerRegistro1($formulario) {
    $("#target").LoadingOverlay("show");

    //event.preventDefault();
    
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    //alert(url);
    //alert(data);
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        //alert(data);
        if (data.fail) {
            //alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success

    });
}


function AjaxContainerRegistro2($formulario) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("#target").LoadingOverlay("show");

    //event.preventDefault();
    
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    //alert(url);
    //alert(data);

    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        //alert(data);
        if (data.fail) {
            alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            //alert("Datos Guardados Exitosamente");
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success

    });
}


function AjaxContainerCambioDashboard() {
    
    $("#target").LoadingOverlay("show");

    var url = "/serviciosres";
    window.location.href = url;
    $("#target").LoadingOverlay("hide", true);
}

function AjaxContainerEdicionServicios($id_usuario_servicio,$id_catalogo) {
    
    $("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/servicios/serviciooperador1/"+$id_usuario_servicio+"/"+$id_catalogo;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            //alert(data.redirectto);
            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerInfoOperador(){
    
        $("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/infoOperador";
    //alert(id);
    //alert(url);      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            //alert(data.redirectto);

            setTimeout(function() {
                $("#target").LoadingOverlay("hide", true);
                window.location.href = data.redirectto;
            },1000)
            
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}

function AjaxContainerRegistroWithLoad1($formulario, $loadScreen) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("."+$loadScreen).LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    //alert(data);
    //alert(url);
    
    //alert(data);
    //alert(url);
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        console.log(data);
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("."+$loadScreen).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success
    });
    
}

function AjaxContainerRegistroWithLoad2($formulario, $loadScreen) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $("."+$loadScreen).LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    //alert(data);
    //alert(url);
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        //console.log(data);
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("."+$loadScreen).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success
    });
    
}

function UpdateServicioInfo($formulario, $id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $('.error').html('');

    $("#target").LoadingOverlay("show");
   
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
            //alert(data);
            //alert(url);
        
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            //$('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            //window.location.href = data.redirectto;
            //$('.register').fadeOut(); //hiding Reg form
            //var successContent = '' + data.message + '';
            
        } //success
    }); //done
}

function UpdateServicioInfo1($formulario, $id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $('.error').html('');

    $("#target").LoadingOverlay("show");
   
    var $form = $('#' + $formulario),
            data = $form.serialize();
            //url = $form.attr("action");
    var url = "/uploadServiciosRes1";
            //alert(data);
            //alert(url);
        
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            //alert("Fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            //$('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            window.location.href = data.redirectto;
            //$('.register').fadeOut(); //hiding Reg form
            //var successContent = '' + data.message + '';
            
        } //success
    }); //done
}

function GetDataAjaxImagenesRes(url) {
    console.log(url);
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#renderPartialImagenes").html(data.contentImagenes);
    
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxImagenes1(id_usuario_servicio) {
    
    $("#testboxForm").LoadingOverlay("show");
   var url = "/imagenesAjaxDescription1/1/"+id_usuario_servicio;
    //alert(url);
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            
            //$("#renderPartialImagenes").html(data.contentImagenes);
            window.location.href = "/edicionServicios";
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}

function AjaxContainerVistaPrevia($id_usuario_servicio) {
    
    $("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/vistaPreviaServicio/"+$id_usuario_servicio;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
    

        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxSaveDetailsFotografia1($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    console.log(url);
    console.log(data);
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {

            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            
            $("#target").LoadingOverlay("hide", true);
            //window.location.href = data.redirectto;
    
        } //success
    }); //done

}

function GetDataAjaxProvincias1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#provincias").html(data.provincias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GetDataAjaxCantones1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#canton").html(data.cantones);
            

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxParroquias1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#parroquia").html(data.parroquias);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function GetDataAjaxDescripcion1(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function AjaxContainerRetrunMessageImagenRes($formulario, $id) {
    
    $('.error').html('');

    //$("#target").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            //$("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            
        } //success
    }); //done

}

//COMPARTIDO.JS
function UpdateServicioActivo(url) {
    
    $("#target").LoadingOverlay("show");
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}



function GetDataAjaxPromo(url) {
    
    $("#target").LoadingOverlay("show");
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}




function GetDataEditPromo(url) {
    
    $("#target").LoadingOverlay("show");
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function GuardarPromo($formulario, $id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $('.error').html('');

    $("#target").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    //alert(data);
    //alert(url);
    
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            /*if(data.redirectto == '/listarPromocion'){
                
            }else{
                window.location.href = data.redirectto;
            }*/
            window.location.href = data.redirectto;




        } //success
    }); //done

}

function AjaxContainerEdicionServicios($id_usuario_servicio,$id_catalogo) {
    
    //$("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/servicios/serviciooperador1/"+$id_usuario_servicio+"/"+$id_catalogo;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            //alert(data.redirectto);
            window.location.href = data.redirectto;
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


function UpdatePermanente(url) {
    
    $("#target").LoadingOverlay("show");
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}


function UpdateServicioActivo(url) {
    
    $("#target").LoadingOverlay("show");
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}

function GetDataAjaxImagenes2(url) {
    
    $("#testboxForm").LoadingOverlay("show");
    
   $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            
            $("#renderPartialImagenes").html(data.contentImagenes);
            //window.location.href = "/edicionServicios";
                 

        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
    
}


