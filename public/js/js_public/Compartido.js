
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});



//se utiliza esta funcion para hacer un append del contenido que llega
window.current_pageSet=1;

function GetDataAjaxSearchTotApp(url) {
    
	$(".moreImg").LoadingOverlay("show");
	// To disable:    

$('.moreImg').each(function (){
    this.style.pointerEvents = 'none'; 
}); 


var count= $(".pagina").val();
	
	
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': count // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSet=current_pageSet+1;
            
           // $(".SearchTotalPartial").append(data.SearchTotalPartial);
            //$(".SearchTotalPartial").LoadingOverlay("hide", true);


       
      var imgs = [];
            $(data.SearchTotalPartial).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.SearchTotalPartial1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".SearchTotalPartial1").LoadingOverlay("hide", true);
			$(".moreImg").LoadingOverlay("hide", true);
			// To re-enable:
$('.moreImg').each(function (){
    this.style.pointerEvents = 'auto'; 
}); 
			
			
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





window.current_pageSet=0;

function GetDataAjaxSearchTotal(url) {
    
    $(".SearchTotalPartial1").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSet + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
			
			if(window.current_pageSet==0)
			{	$(".SearchTotalPartial1").html("");}
			
            window.current_pageSet=current_pageSet+1;
            
            //$(".SearchTotalPartial").html(data.SearchTotalPartial);
            //$(".SearchTotalPartial").LoadingOverlay("hide", true);
var imgs = [];
            $(data.SearchTotalPartial).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.SearchTotalPartial1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".SearchTotalPartial1").LoadingOverlay("hide", true);
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



//Funcion para ordenar las tabletas de la pagina de inicio
function masonryBlocks($cont,$item) {

    var container = $('.'+$cont);
    var items = $('.'+$item);
    sjq(container).imagesLoaded( function() {
    // init isotope
    sjq(container).isotope({
    itemSelector: '.'+$item,
    percentPosition: true,
    masonry: {
        columnWidth: '.'+$item
        
    }
  });
     // append other items when they are loaded
    sjq(items).imagesLoaded( function() {
        
        sjq(container).append(items)
                .isotope('appended', items)
                        .isotope('layout');;
    });
  });
}

//Javascript para cargar las imagenes via ajax
function GetDataAjaxTopPlaces(url) {
    
   
    
    
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_page + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_page=current_page+1;
            
            //$(".cercanos").append(data.cercanos);
           // $(".cercanos").LoadingOverlay("hide", true);




      var imgs = [];
            $(data.topPlaces).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.topPlaces');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".moreImagesTop").LoadingOverlay("hide", true);
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



//Javascript para cargar las imagenes via ajax
function GetDataAjaxEventsIndbyCity(url) {
    $(".eventsPromo").html("");
    $(".eventsPromo").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            
            
            var imgs = [];
            
            $(data.eventsPromo).each(function () {
                var its = $(this).html();
                    imgs.push(its);
            });
            itemsHTML = $.map(imgs, function (src) {
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.eventsPromo');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: '.eventInd'
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items)
                        .isotope('layout');;
                    });
                });
            });
            $(".eventsPromo").LoadingOverlay("hide", true);
        },
        error: function (data) {
            alert("No results");
            $(".eventsPromo").LoadingOverlay("hide", true);
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

//Javascript para cargar las imagenes via ajax
function GetDataAjaxEventsInd(url) {
    $(".eventsPromo").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            
            
            var imgs = [];
            $(data.eventsPromo).each(function () {
                var its = $(this).html();
                    imgs.push(its);
            });
            itemsHTML = $.map(imgs, function (src) {
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.eventsPromo');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: '.eventInd'
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items)
                        .isotope('layout');;
                    });
                });
            });
            $(".eventsPromo").LoadingOverlay("hide", true);
        },
        error: function (data) {
           alert("No results");
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


   window.current_page=0;

//Javascript para cargar las imagenes via ajax con el botonload more
function GetDataAjaxTopPlacesHome(url) {
    $(".moreImagesTop").LoadingOverlay("show");
    var count= $(".pagina").val();
       $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': count // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_page=current_page+1;
            
            $(".cercanos").append(data.cercanos);
           // $(".cercanos").LoadingOverlay("hide", true);




      var imgs = [];
            $(data.topPlaces).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.topPlaces');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".moreImagesTop").LoadingOverlay("hide", true);
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


   window.current_page_e=1;
   

//Javascript para cargar las imagenes via ajax con el botonload more
function GetDataAjaxEventsHome(url) {
    $(".eventsPromo").LoadingOverlay("show");
        $.ajax({
            type: 'GET',
            url: url,
               data:{
            'page': window.current_page_e + 1 // you might need to init that var on top of page (= 0)
            },

            dataType: 'json',
            success: function (data) {
            
            window.current_page_e=current_page_e+1;
            
            var imgs = [];

            $(data.eventsPromo).each(function () {
                var its = $(this).html();
                    imgs.push(its);
            });
            itemsHTML = $.map(imgs, function (src) {
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.eventsPromo');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: '.eventInd'
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items).isotope('layout');
                        $(".eventsPromo").LoadingOverlay("hide", true);
                    });
                });
            });
            
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




function GetDataAjaxregiones(url) {
    $(".regiones").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $(".regiones").LoadingOverlay("hide", true);
            $(".regiones").html(data.regiones);


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



function GetDataAjaxPromociones(url) {
    $(".promocionesAtraccion").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            
            $(".promocionesAtraccion").html(data.promocionesAtraccion);
$(".promocionesAtraccion").LoadingOverlay("hide", true);

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

function GetDataAjaxEventos(url) {
    $(".eventosAtraccion").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            
            $(".eventosAtraccion").html(data.eventosAtraccion);
            $(".eventosAtraccion").LoadingOverlay("hide", true);


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

window.current_pageIntern=0;

function GetDataAjaxCloseIntern(url) {
    $(".moreImg").LoadingOverlay("show");
    var count= $(".pagina").val();
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': count // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageIntern=current_pageIntern+1;
            
            //$(".cercanos").append(data.cercanos);
           // $(".cercanos").LoadingOverlay("hide", true);




      var imgs = [];
            $(data.cercanos).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.cercanos');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".moreImg").LoadingOverlay("hide", true);
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




//se utiliza esta funcion para hacer un append del contenido que llega
window.current_pageSeCatApp=1;

function GetDataAjaxSearchCatogoriesApp(url) {
     var count= $(".pagina").val();
    $(".moreImg").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page':count // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSeCatApp=current_pageSeCatApp+1;
            
            //$(".Searchcategorias1").append(data.Searchcategorias);
            //$(".Searchcategorias1").LoadingOverlay("hide", true);


      var imgs = [];
            $(data.Searchcategorias).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.Searchcategorias1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".moreImg").LoadingOverlay("hide", true);
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


window.current_pageSeCat=0;

function GetDataAjaxSearchCatogories(url) {
    $(".Searchcategorias1").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSeCat + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSeCat=current_pageSeCat+1;
            
           // $(".Searchcategorias").html(data.Searchcategorias);
            //$(".Searchcategorias").LoadingOverlay("hide", true);
var imgs = [];
            $(data.Searchcategorias).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.Searchcategorias1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".Searchcategorias1").LoadingOverlay("hide", true);
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



window.current_pageSet=0;

function GetDataAjaxSearchTotalClean(url) {
    
    $(".SearchTotalPartial1").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSet + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSet=current_pageSet+1;
            
            $(".SearchTotalPartial1").html("");
            //$(".SearchTotalPartial1").LoadingOverlay("hide", true);
       var imgs = [];
            $(data.SearchTotalPartial).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.SearchTotalPartial1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('insert', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".SearchTotalPartial1").LoadingOverlay("hide", true);
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
function AjaxContainerRegistroWithLoadFilter($formulario, $loadScreen) {
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

            
            $(".Searchcategorias1").html(data.sections.Searchcategorias);
                        $("."+$loadScreen).LoadingOverlay("hide", true);

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}


window.current_pageCat=0;

function GetDataAjaxCatogories(url) {
    
    var count= $(".pagina").val();
    $(".moreImg").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': count // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageCat=current_pageCat+1;
            
            //$(".categorias").append(data.categorias);
            //$(".categorias").LoadingOverlay("hide", true);


        //},
        
        
        var imgs = [];
            $(data.categorias).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.categorias1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".moreImg").LoadingOverlay("hide", true);
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


function GetLikes(url) {
    
    $(".likes").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            

            $(".likes").html(data.likes);
            $(".likes").LoadingOverlay("hide", true);


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



window.current_pageReview=0;

function GetReview(url) {
    $(".review").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageReview + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageReview=current_pageReview+1;
            
            $(".review").append(data.review);
            $(".review").LoadingOverlay("hide", true);


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



function AjaxContainerRegistroLoadF($formulario,$load) {
    $("."+$load).LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    var posting = $.post(url, {formData: data});
    
    posting.done(function (data) {
        if (data.fail) {
            
            $.each(data.errors, function (key, value) {
                
            });
            alert(data.message);
            $("."+$load).LoadingOverlay("hide", true);

        }
        if (data.success) {
            alert(data.message);
            $("."+$load).LoadingOverlay("hide", true);
              
            
        } //success



    });
}


function AjaxContainerRegistro($formulario) {
    $(".btn-compare").LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    var posting = $.post(url, {formData: data});
    
    posting.done(function (data) {
        if (data.fail) {
            
            alert("fail");
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

function ajaxajax()
{
    
   
var data = { key: $('#search-query').val() };

$.ajax({
     type: 'POST',
     url: "likesS",
     data: JSON.stringify(data),
     dataType: 'json',
     contentType: 'application/json; charset=utf-8',
     success: function (data) {
          if (data.redirect) {
              window.location.href = data.redirect;
          }
          $('.builder').empty();
          alert("Key Passed Successfully!!!");
     }
});
    
}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURLikes($urlS,$formulario, $id, $load) {
    
    $(".".$load).LoadingOverlay("show");



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
        

        }
        if (data.success) {
            $(".".$load).LoadingOverlay("hide", true);
            GetLikes("/getLikesA/"+$formulario);
        


        } //success
    }); //done

}


//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURL($urlS,$formulario, $id, $load) {
    
    $(".".$load).LoadingOverlay("show");



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
        

        }
        if (data.success) {
            $(".".$load).LoadingOverlay("hide", true);
        


        } //success
    }); //done

}


window.current_pageSeCat=0;

function GetDataAjaxSearchCatogoriesIntern(url) {
    

var count= $(".pagina").val();    
    $(".moreImg").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': count // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSeCat=current_pageSeCat+1;
            if(window.current_pageSeCat==1)
            $(".categorias1").html("");
            //$(".Searchcategorias").LoadingOverlay("hide", true);
var imgs = [];
            $(data.categorias).each(function () {
                var its = $(this).html();
                    imgs.push(its);
                    
            });
            itemsHTML = $.map(imgs, function (src) {
               // alert(itemsHTML);
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.categorias1');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: 100
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        
                        //alert(items);
                        sjq(container).append(items)
                                .isotope('appended', items)
                                  .isotope('layout');
                    });
                });
            });
            $(".moreImg").LoadingOverlay("hide", true);
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


//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales peque�os
function AjaxContainerRegistroWithLoadFilterInterno($formulario, $loadScreen) {
    
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
            
            
            $(".categorias1").html(data.sections.categorias1);
                        $("."+$loadScreen).LoadingOverlay("hide", true);

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}





