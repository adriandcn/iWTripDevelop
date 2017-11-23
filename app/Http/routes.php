<?php
//Registro
Route::get('catalogos', 'CatalogoServicioController@index');

// Home

Route::get('/loginAdministration', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);
Route::get('language', 'HomeController@language');


// Admin
Route::get('admin', [
	'uses' => 'AdminController@admin',
	'as' => 'admin',
	'middleware' => 'admin'
]);

Route::get('medias', [
	'uses' => 'AdminController@filemanager',
	'as' => 'medias',
	'middleware' => 'redac'
]);

Route::get("sitemap.xml", array(
    "as"   => "sitemap",
    "uses" => "HomePublicController@sitemap", // or any other controller you want to use
));

Route::get('/trip/{nombre_atraccion}/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getTripDescripcion']);

// Blog
Route::get('blog/order', ['uses' => 'BlogController@indexOrder', 'as' => 'blog.order']);
Route::get('articles', 'BlogController@indexFront');
Route::get('blog/tag', 'BlogController@tag');
Route::get('blog/search', 'BlogController@search');

Route::put('postseen/{id}', 'BlogController@updateSeen');
Route::put('postactive/{id}', 'BlogController@updateActive');

Route::resource('blog', 'BlogController');

// Comment
Route::resource('comment', 'CommentController', [
	'except' => ['create', 'show']
]);

Route::put('commentseen/{id}', 'CommentController@updateSeen');
Route::put('uservalid/{id}', 'CommentController@valid');


// Contact
Route::resource('contact', 'ContactController', [
	'except' => ['show', 'edit']
]);


// User
Route::get('user/sort/{role}', 'UserController@indexSort');

Route::get('user/roles', 'UserController@getRoles');
Route::post('user/roles', 'UserController@postRoles');

Route::put('userseen/{user}', 'UserController@updateSeen');

Route::resource('user', 'UserController');

// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Adrian----------------------------------------------------------------------------

Route::get('/image', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);


Route::get('userservice',
    ['uses'=>'UsuarioServiciosController@getServiciosOperador','as'=>'userservice'
    ,'middleware' => 'notAuth']);


Route::post('servicioOperador', ['as' => 'upload-postServicioOperador', 'uses' =>'UsuarioServiciosController@postServicioOperadores','middleware' => 'notAuth']);
Route::post('estadoItinerario/{id}', ['as' => 'postEstadoItinerario', 'uses' =>'UsuarioServiciosController@postEstadoDetalleItinerario','middleware' => 'notAuth']);
Route::post('deleteItinerario/{id}', ['as' => 'postEstadoItinerario', 'uses' =>'UsuarioServiciosController@postDeleteItinerario','middleware' => 'notAuth']);
Route::post('estadoItinerarioPrincipal/{id}', ['as' => 'postEstadoItinerarioPrincipal', 'uses' =>'UsuarioServiciosController@postEstadoItinerario','middleware' => 'notAuth']);
Route::post('estadoPromocion/{id}', ['as' => 'postEstadoPromocion', 'uses' =>'UsuarioServiciosController@postEstadoPromocion','middleware' => 'notAuth']);
Route::post('estadoEvento/{id}', ['as' => 'postEstadoEvento', 'uses' =>'UsuarioServiciosController@postEstadoEvento','middleware' => 'notAuth']);

Route::post('invitacion', ['as' => 'postinvitaamigo', 'uses' =>'UsuarioServiciosController@postInvitarAmigo','middleware' => 'notAuth']);

Route::get('/detalleServicios', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServicios','middleware' => 'notAuth']);
Route::get('/render/{id_partial}', ['as' => 'render', 'uses' => 'UsuarioServiciosController@RenderPartial']);
Route::get('/render/{id_partial}/{id_data}', ['as' => 'render', 'uses' => 'UsuarioServiciosController@RenderPartialWithData']);

Route::get('/editServicios/{id_usuario_op}', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServicios']);

Route::post('servicios/DetalleOperador', ['as' => 'upload-postDetalleOperador', 'uses' =>'UsuarioServiciosController@postDetalle']);
Route::get('/editServicios/{id_usuario_servicio}', ['as' => 'detailServicio', 'uses' => 'UsuarioServiciosController@tablaServicios']);
Route::get('maps',function()
{
    
    return view('reusable.maps');
});

Route::post('maps',function()
{
    
    return Input::all();
});
Route::post('promocion', ['as' => 'postPromocion', 'uses' =>'UsuarioServiciosController@postPromocion','middleware' => 'notAuth']);
Route::post('itinerario', ['as' => 'postItinerario', 'uses' =>'UsuarioServiciosController@postItinerario','middleware' => 'notAuth']);
Route::post('evento', ['as' => 'postEvento', 'uses' =>'UsuarioServiciosController@postEvento','middleware' => 'notAuth']);
Route::post('itinerarioP', ['as' => 'postPuntoItinerario', 'uses' =>'UsuarioServiciosController@postPuntoItinerario','middleware' => 'notAuth']);


Route::get('promocion/{id_promocion}',
    ['uses'=>'UsuarioServiciosController@getPromociones','as'=>'getPromocion'
    ,'middleware' => 'notAuth']);
Route::get('eventos/{id}',
    ['uses'=>'UsuarioServiciosController@getEventos','as'=>'getEventos'
    ,'middleware' => 'notAuth']);


Route::get('itinerario/{id}',
    ['uses'=>'UsuarioServiciosController@getItinerarios','as'=>'getItinerarios'
    ,'middleware' => 'notAuth']);


Route::post('/delete/image/{id}', ['as' => 'delete-image', 'uses' =>'ImageController@postDeleteImage']);
Route::post('/uploadImage/{id}', ['as' => 'uploadDesc-image', 'uses' =>'ImageController@postDescrImage']);
Route::get('/getTipoDificultad', ['as' => 'tipoDificultad', 'uses' => 'UsuarioServiciosController@getTipoDificultad','middleware' => 'notAuth']);

Route::get('thankyou',function()
{
    
    return view('Registro.endRegister');
});

Route::get('terminos',function()
{
    
    return view('RegistroOperadores.registroTerminos');
});

Route::get('acerca',function()
{
    
    return view('RegistroOperadores.registroAcercaDe');
});

Route::get('contactAdmin',function()
{
    
    return view('Welcome.contact');
});

Route::get('BingSiteAuth.xml ',function()
{
    
    return view('Admin.sitemapBing');
});


Route::get('/getlistaItinerarios/{id}', ['as' => 'itinerariosList', 'uses' => 'UsuarioServiciosController@getListaItinerarios','middleware' => 'notAuth']);
Route::get('/getProvincias/{id_provincia}/{id_canton}/{id_parroquia}', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getProvincias']);
Route::get('/getCantones/{id}/{id_canton}/{id_parroquia}', ['as' => 'cantones', 'uses' => 'UsuarioServiciosController@getCantones']);
Route::get('/getParroquias/{id}/{id_parroquia}', ['as' => 'parroquias', 'uses' => 'UsuarioServiciosController@getParroquias']);

Route::get('/getOnlyProvincias', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getOnlyProvincias']);
Route::get('/getOnlyCanton/{id}', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getOnlyCanton']);
Route::get('/getProvinciasCanton', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getProvinciaCanton']);
Route::get('/getDescripcionGeografica/{id}/{id_catalogo}', ['as' => 'cantones', 'uses' => 'UsuarioServiciosController@getDescripcionGeografica']);



Route::get('/getlistaServiciosComplete/{id_usuario_servicio}', ['as' => 'completeServices', 'uses' => 'UsuarioServiciosController@getAllServicios','middleware' => 'notAuth']);


Route::get('/getProvinciasDescipcion', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getProvinciasDescipcion','middleware' => 'notAuth']);
Route::get('/getCantonesDescipcion', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getCantonesDescipcion','middleware' => 'notAuth']);
Route::get('/getParroquiaDescipcion', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getparroquiaDescipcion','middleware' => 'notAuth']);


Route::get('/getProvinciasDescipciones/{id}', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getProvinciasDescipciones','middleware' => 'notAuth']);

Route::post('postGeoLoc', ['as' => 'postGeoLoc', 'uses' =>'UsuarioServiciosController@postGeoLoc','middleware' => 'notAuth']);

// Event::listen('illuminate.query', function($query)
 //{
  //var_dump($query);
 //});
// ////////////////////////


//servicios

Route::get('/imagenesAjax/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImages','middleware' => 'notAuth']);

Route::get('/imagenesAjaxDescription/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImagesDescription','middleware' => 'notAuth']);



Route::get('/servicios', ['as' => 'servicios', 'uses' => 'ServicioController@index','middleware' => 'notAuth']);

Route::get('/myProfileOp', ['as' => 'profileOp', 'uses' => 'ServicioController@getMyProfileOp']);



Route::post('servicios/tipoOperador', ['as' => 'upload-postTipoOperador', 'uses' =>'ServicioController@postTipoOperadores','middleware' => 'notAuth']);
Route::post('tipoOperadorProfile', ['as' => 'postTipoOperadorProfile', 'uses' =>'ServicioController@postTipoOperadoresProfile','middleware' => 'notAuth']);
Route::post('servicios/operadores', ['as' => 'upload-postoperador', 'uses' =>'ServicioController@postOperadores','middleware' => 'notAuth']);

Route::get('servicios/operadorServicios', ['as' => 'operadorServicios', 'uses' => 'ServicioController@step3','middleware' => 'notAuth']);
Route::get('operador', ['as' => 'operador', 'uses' => 'ServicioController@step2','middleware' => 'notAuth']);




Route::get('servicios/serviciooperador/{id}/{id_catalogo}', ['as' => 'details.show', 'uses' => 'ServicioController@step4','middleware' => 'notAuth'] );
Route::post('servicios/serviciosoperador', ['as' => 'upload-postusuarioservicios', 'uses' =>'ServicioController@postUsuarioServicios','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadormini', ['as' => 'upload-postusuarioserviciosmini', 'uses' =>'ServicioController@postUsuarioServiciosMini','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadorminiPadre', ['as' => 'upload-postusuarioserviciosminiPadre', 'uses' =>'ServicioController@postUsuarioServiciosMiniPadre','middleware' => 'notAuth']);



/*Rutas dispositivo mobil*/


Route::get('loginmobile',function()
{
    
    return view('mobile.logInMobile.LogInMobile');
});


Route::get('steps',function()
{
    
    return view('public_page.general.steps');
});

Route::get('ServiciosOperadores',function()
{
    
    return view('public_page.general.servicios_op');
});


Route::get('contactos',function()
{
    
    return view('public_page.general.contacts');
});


Route::get('InvitacionOperadores',function()
{
    
    return view('public_page.general.servicios_inv');
});


Route::get('registerMobile', ['as' => 'registerMobile', 'uses' => 'ServicioController@registerMobile'] );


/**End rutas dispositivo mobil************************************************/




/*Rutas para la parte publica del sistema*/
Route::post('likesSat/{id_atraccion}', ['as' => 'likesS', 'uses' =>'HomePublicController@postLikesS']);
Route::post('filterParameters', ['as' => 'filtersCategoria', 'uses' =>'HomePublicController@postFiltersCategoria']);
Route::post('postReviews', ['as' => 'postReviews', 'uses' =>'HomePublicController@postReviews']);

Route::get('/', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);
Route::get('/tokenDc', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);



Route::get('/getRegiones', ['as' => 'regiones', 'uses' => 'HomePublicController@getRegiones']);
Route::get('/getProvinciaDescipcion/{id_provincia}/{id_image}', ['as' => 'provinciasdescr', 'uses' => 'HomePublicController@getProvinciaDescripcion']);
Route::get('/getRegionDescipcion/{id_region}', ['as' => 'regiondescr', 'uses' => 'HomePublicController@getRegionsId']);

Route::get('/getTopPlaces', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getTopPlaces']);
Route::get('/getEventscloseToMe/{city}', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getcloseToMe']);
Route::get('/getEventscity/{city}', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getbyCity']);


//ruta para el detalle de la atraccion
Route::get('/detalle/{nombre_atraccion}/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getAtraccionDescripcion']);



Route::get('/detalle/{nombre_atraccion}', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);

//busqueda desde el home para los catalogos
Route::get('/tokenDz$rip/{id_catalogo}', ['as' => 'searchCat', 'uses' => 'HomePublicController@getSearchHomeCatalogo']);


Route::get('/getConfirmReview/{codigo}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getConfirmReview']);
Route::post('filterParametersIntern', ['as' => 'filtersCategoriaIntern', 'uses' =>'HomePublicController@postFiltersCategoriaIntern']);
Route::get('/getSearchCatalogosServiciosIntern/{id}/{id_catalogo}/{ciudad}', ['as' => 'SearchcatalogoServicios', 'uses' => 'HomePublicController@getCatalosoServiciosSearchIntern']);
Route::get('/tokenDc$ripT/{id_atraccion}/{id_catalogo}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getCatalogoDescripcion']);
Route::get('/getCatalogosServicios/{id_atraccion}/{id_catalogo}', ['as' => 'catalogoServicios', 'uses' => 'HomePublicController@getCatalosoServicios']);
Route::get('/getSearchCatalogosServicios/{id_catalogo}/{ciudad}', ['as' => 'SearchcatalogoServicios', 'uses' => 'HomePublicController@getCatalosoServiciosSearch']);




Route::get('/tokenDc$ripPromo/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getPromocionesAtraccion']);
Route::get('/tokenDc$ripEvent/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getEventosAtraccion']);


Route::get('/getCercanosIntern/{id_atraccion}/{id_provincia}/{id_canton}/{id_parroquia}', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getCercanosIntern']);
Route::get('/getLikesA/{id_atraccion}', ['as' => 'getLikes', 'uses' => 'HomePublicController@getLikesSatisf']);
Route::get('/getReviews/{id_atraccion}', ['as' => 'getReviews', 'uses' => 'HomePublicController@getReviews']);

Route::get('/getSearchTotal/{term}', ['as' => 'SearchTotal', 'uses' => 'SearchController@getSearchTotal']);
Route::get('/getSearchTotalPartial/{term}', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getTotalSearchInside']);

Route::get('/TermsConditions', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getTermsConditions']);
Route::get('/AboutUs', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getAboutUs']);
Route::get('/Mision', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getMision']);
        
Route::get('Search', ['as' => 'min-search', 'uses' =>'SearchController@getSearchTotal']);

 /*  Fin de las rutas del sistema publico*/



/*Booking*/

//***************************************************************************************************************************//
//                                               RUTAS BOOKING FABIO                                                         //
//***************************************************************************************************************************//

Route::post('especialidad', 
            ['as' => 'postEspecialidad', 'uses' =>'UsuarioServiciosController@postEspecialidad',
            'middleware' => 'notAuth']);

Route::get('especialidad/{id}',
            ['uses'=>'UsuarioServiciosController@getEspecialidad','as'=>'getEspecialidad'
            ,'middleware' => 'notAuth']);


Route::resource('/api/detallesEspecialidad','DetalleEspecialidadController');

Route::get('/api/detallesEspecialidadID/{id}','DetalleEspecialidadController@buscar');

Route::post('estadoEspecialidadPrincipal/{id}', ['uses' =>'UsuarioServiciosController@postEstadoEspecialidad',
            'middleware' => 'notAuth']);

Route::post('estadoBookingPrincipal/{id}', ['uses' =>'UsuarioServiciosController@postEstadoBooking',
            'middleware' => 'notAuth']);

//ruta para el controlador que redirige a booking
Route::get('/booking/{id}', ['uses' =>'UsuarioServiciosController@booking','middleware' => 'notAuth']);
//ruta para el controlador que redirige a booking para el setting del calendario
Route::get('/bookingCalendario/{id}/{calendar_id}', ['uses' =>'UsuarioServiciosController@bookingCalendar','middleware' => 'notAuth']);

Route::get('/confirmacion', ['as' => 'confirmacionpaypal', 'uses' => 'HomePublicController@getConfirmacionPaypal']);
Route::get('/confirmacionAuthorize', ['as' => 'confirmacionauthorize', 'uses' => 'HomePublicController@getConfirmacionAuthorize']);
Route::get('/verificarUsuario', ['as' => 'confirmacionauthorize', 'uses' => 'HomePublicController@verificarUsuario']);


Route::get('/noAcceso', ['as' => 'noacceso', 'uses' => 'HomePublicController@getNoAcceso']);
Route::get('/confirmacionPP/{id}', ['as' => 'confirmacionpaypal', 'uses' => 'HomePublicController@getConfirmacionPaypal1']);
Route::get('/confirmacionTarjetaCredito/{id}', ['as' => 'confirmaciontarjetacredito', 'uses' => 'HomePublicController@getConfirmacionAuhtorize1']);
//Route::get('/confirmacionEfectivo/{id}', ['as' => 'confirmaciontarjetacredito', 'uses' => 'HomePublicController@getConfirmacionCash']);
Route::get('/confirmacionEfectivo', ['as' => 'confirmaciontarjetacredito', 'uses' => 'HomePublicController@getConfirmacionCash']);



/*++++++++++++*/




//***************************************************************************************************************************//
//                                               RUTAS RESPONSIVE FABIO                                                         //
//***************************************************************************************************************************//
Route::get('/login', ['uses' => 'HomeController@indexres', 'as' => 'home']);
Route::get('/aboutus', ['as' => 'profileOpRes', 'uses' => 'ServicioController@getAboutUs']);
Route::post('tipoOperadorProfileRes', ['as' => 'postTipoOperadorProfileRes', 'uses' =>'ServicioController@postTipoOperadoresProfileRes','middleware' => 'notAuth']);

Route::get('dashboard',
    ['uses'=>'UsuarioServiciosController@getServiciosOperadorRes','as'=>'dashboard'
    ,'middleware' => 'notAuth']);

//Route::get('/detalleServiciosRes', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServiciosRes','middleware' => 'notAuth']);
Route::get('operadorres', ['as' => 'operadorres', 'uses' => 'ServicioController@step2res','middleware' => 'notAuth']);
Route::get('operadorpru', ['as' => 'operadorpru', 'uses' => 'ServicioController@operadorpru','middleware' => 'notAuth']);
//Route::get('serviciosres', ['as' => 'operadorpru', 'uses' => 'ServicioController@step2pru','middleware' => 'notAuth']);
Route::get('/serviciosres', ['as' => 'detailres', 'uses' => 'UsuarioServiciosController@tablaServiciosRes','middleware' => 'notAuth']);
Route::get('myinfo', ['as' => 'operadorres', 'uses' => 'ServicioController@step2res','middleware' => 'notAuth']);
Route::get('myinfores', ['as' => 'operadorres', 'uses' => 'ServicioController@step2res1','middleware' => 'notAuth']);


//Route::post('/detalleServiciosRes', ['as' => 'upload-postoperador1', 'uses' =>'ServicioController@postOperadores1','middleware' => 'notAuth']);
//Route::get('servicios/serviciooperador/{id}/{id_catalogo}', ['as' => 'details.show', 'uses' => 'ServicioController@step4','middleware' => 'notAuth'] );
Route::get('/detalleServiciosRes', ['as' => 'details.showres', 'uses' => 'ServicioController@step4res','middleware' => 'notAuth'] );

Route::post('/nuevoServicio', ['as' => 'upload-postoperador1', 'uses' =>'ServicioController@postOperadores1','middleware' => 'notAuth']);
Route::post('/nuevoServicio1', ['as' => 'upload-postoperador2', 'uses' =>'ServicioController@postOperadores1','middleware' => 'notAuth']);
Route::post('/uploadInfoOperador', ['as' => 'upload-infoperador2', 'uses' =>'ServicioController@UploadInfoOperado2','middleware' => 'notAuth']);


Route::post('servicios/serviciosoperador1', ['as' => 'upload-postusuarioservicios1', 'uses' =>'ServicioController@postUsuarioServicios1','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadormini1', ['as' => 'upload-postusuarioserviciosmini1', 'uses' =>'ServicioController@postUsuarioServiciosMini1','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadormini2', ['as' => 'upload-postusuarioserviciosmini2', 'uses' =>'ServicioController@postUsuarioServiciosMini1','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadormini3', ['as' => 'upload-postusuarioserviciosmini3', 'uses' =>'ServicioController@postUsuarioServiciosMini1','middleware' => 'notAuth']);


Route::post('promocionres', ['as' => 'postPromocion1', 'uses' =>'UsuarioServiciosController@postPromocion1','middleware' => 'notAuth']);
Route::post('eventores', ['as' => 'postEvento1', 'uses' =>'UsuarioServiciosController@postEvento1','middleware' => 'notAuth']);

Route::get('promocion1/{id_promocion}',
    ['uses'=>'UsuarioServiciosController@getPromociones1','as'=>'getPromocion'
    ,'middleware' => 'notAuth']);
Route::get('eventos1/{id}',
    ['uses'=>'UsuarioServiciosController@getEventos1','as'=>'getEventos'
    ,'middleware' => 'notAuth']);

Route::get('/volver', ['uses' => 'HomePublicController@getAtraccionDescripcion1']);
//,e lleva a la pagina de creacion del servicio
//*******************************************************//
//       EDICION DE LOS SERVICIOS OCULTAR RUTAS          //
//*******************************************************//
Route::get('servicios/serviciooperador1/{id}/{id_catalogo}', ['as' => 'details.showres1', 'uses' => 'ServicioController@step4crear','middleware' => 'notAuth'] );
Route::get('/edicionServicios', ['uses' => 'ServicioController@edicionServicios','middleware' => 'notAuth'] );



Route::get('/infoOperador', ['as' => 'detailsOperador', 'uses' => 'ServicioController@redirectStep4','middleware' => 'notAuth'] );

//*******************************************************//
// REDIRECCION PARA NO MOSTRAR LOS ID EN LA URL          //
//*******************************************************//
Route::get('vistaPreviaServicio/{id}', ['uses' => 'ServicioController@vistaPreviaServicios','middleware' => 'notAuth'] );
Route::get('/previewServicio', ['uses' => 'HomePublicController@getAtraccionDescripcion1']);


//********************************************************//
// ME DECUELVE LA LISTA DE EVENTOS, PROMO Y BOOKING       //
//********************************************************//
Route::get('/getlistaServiciosComplete1/{id_usuario_servicio}', ['as' => 'completeServices', 'uses' => 'UsuarioServiciosController@getAllServicios1','middleware' => 'notAuth']);


//********************************************************//
// UPDATE DE LOS SERVICIOS HOTEL, ALOJAMIENTO, TRIP      //
//********************************************************//
Route::post('/uploadServiciosRes', ['as' => 'upload-serviciosres', 'uses' =>'ServicioController@uploadServiciosRes','middleware' => 'notAuth']);
Route::post('/uploadServiciosRes1', ['as' => 'upload-serviciosres1', 'uses' =>'ServicioController@uploadServiciosRes1','middleware' => 'notAuth']);


//********************************************************//
//                  PARA LAS IMAGENES                     //
//********************************************************//
Route::post('upload1', ['as' => 'upload-post1', 'uses' =>'ImageController@postUpload1']);
Route::get('/imagenesAjaxDescription1/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImagesDescription1','middleware' => 'notAuth']);
Route::get('/imagenesAjax1/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImages1','middleware' => 'notAuth']);

Route::post('/delete/image1/{id}', ['as' => 'delete-image1', 'uses' =>'ImageController@postDeleteImage1']);

//********************************************************//
//    PARA LAS PROVINCIAS, CANTONES Y PARROQUIAS          //
//********************************************************//
Route::get('/getProvincias1/{id_provincia}/{id_canton}/{id_parroquia}', ['as' => 'provincia1', 'uses' => 'UsuarioServiciosController@getProvincias1']);
Route::get('/getCantones1/{id}/{id_canton}/{id_parroquia}', ['as' => 'cantones1', 'uses' => 'UsuarioServiciosController@getCantones1']);
Route::get('/getParroquias1/{id}/{id_parroquia}', ['as' => 'parroquias1', 'uses' => 'UsuarioServiciosController@getParroquias1']);
Route::get('/getDescripcionGeografica1/{id}/{id_catalogo}', ['as' => 'cantones2', 'uses' => 'UsuarioServiciosController@getDescripcionGeografica1']);

Route::get('/updateServicioActivo/{id_usuario_servicio}', ['uses'=>'ServicioController@uploadServiciosActivo','as'=>'getPermanete','middleware' => 'notAuth']);


//*******************************************************//
//       PROMOCIONES Y EVENTOS                           //
//*******************************************************//
Route::post('promocionres', ['as' => 'postPromocion1', 'uses' =>'UsuarioServiciosController@postPromocion1','middleware' => 'notAuth']);
Route::post('eventores', ['as' => 'postEvento1', 'uses' =>'UsuarioServiciosController@postEvento1','middleware' => 'notAuth']);

Route::get('/promo/{id}', ['uses'=>'UsuarioServiciosController@edicionPromocion1','as'=>'getPromocion2','middleware' => 'notAuth']);
Route::get('/event/{id}',  ['uses'=>'UsuarioServiciosController@edicionEvento1','as'=>'getEventos2' ,'middleware' => 'notAuth']);

Route::get('/edicionPromocion', ['uses'=>'UsuarioServiciosController@edicionPromocion','as'=>'getPromocion1','middleware' => 'notAuth']);
Route::get('/edicionEvento',  ['uses'=>'UsuarioServiciosController@edicionEvento','as'=>'getEventos1' ,'middleware' => 'notAuth']);


Route::get('/listarPromociones/{id_usuario_servicio}', ['as' => 'listarPromociones', 'uses' => 'UsuarioServiciosController@listarPromociones','middleware' => 'notAuth']);
Route::get('/listarPromocion', ['as' => 'listarPromocion', 'uses' => 'UsuarioServiciosController@listarPromocion','middleware' => 'notAuth']);
Route::get('/listarPromociones1/{id_usuario_servicio}', ['as' => 'listarPromociones1', 'uses' => 'UsuarioServiciosController@listarPromociones1','middleware' => 'notAuth']);


Route::get('/listarEventos/{id_usuario_servicio}', ['as' => 'listarEventos', 'uses' => 'UsuarioServiciosController@listarEventos','middleware' => 'notAuth']);
Route::get('/listarEvento', ['as' => 'listarEvento', 'uses' => 'UsuarioServiciosController@listarEvento','middleware' => 'notAuth']);
Route::get('/listarEventos1/{id_usuario_servicio}', ['as' => 'listarEventos1', 'uses' => 'UsuarioServiciosController@listarEventos1','middleware' => 'notAuth']);


Route::get('/updatePermanentePromo/{id}/{id_usuario_servicio}', ['uses'=>'UsuarioServiciosController@updatePermanente','as'=>'getPermanete','middleware' => 'notAuth']);
Route::get('/updatePermanenteEvento/{id}/{id_usuario_servicio}', ['uses'=>'UsuarioServiciosController@updatePermanenteEvento','as'=>'getPermanete','middleware' => 'notAuth']);

Route::get('/updateServicioActivo/{id_usuario_servicio}', ['uses'=>'ServicioController@uploadServiciosActivo','as'=>'getPermanete','middleware' => 'notAuth']);

Route::get('/updateEstadoPromo/{id}/{id_usuario_servicio}', ['uses'=>'UsuarioServiciosController@updateEstadoPromocion','as'=>'getPromoUpdate','middleware' => 'notAuth']);
Route::get('/updateEstadoEvento/{id}/{id_usuario_servicio}', ['uses'=>'UsuarioServiciosController@updateEstadoEvento','as'=>'getEventoUpdate','middleware' => 'notAuth']);





Route::get('/reportarErrores/{id_usuario_servicio}/{id_error}', ['as' => 'guardarerror', 'uses' => 'HomePublicController@guardarError']);
Route::post('postErrores',  ['as' => 'post-errorescontacto', 'uses' =>'HomePublicController@postError']);
Route::post('contactosNew', ['as' => 'postContactos', 'uses' =>'HomePublicController@postContactos']);



Route::get('/detallePromocion/{nombre_servicioservicio}/{nombre_promocion}/{id_promocion}', ['as' => 'detallePromo', 'uses' => 'HomePublicController@detallePromo']);
Route::get('/detalleEvento/{nombre_servicioservicio}/{nombre_evento}/{id_evento}', ['as' => 'detalleEvento', 'uses' => 'HomePublicController@detalleEvento']);


//*******************************************************************************************************//
Route::get('/errorAdmin', ['uses'=>'UsuarioServiciosController@errorAdmin','middleware' => 'notAuth']);

Route::get('vistaPreviaPromocion/{id_promo}', ['uses' => 'UsuarioServiciosController@vistaPreviaPromocion','middleware' => 'notAuth'] );
Route::get('/previewPromocion', ['uses' => 'UsuarioServiciosController@getPreviewPromocion','middleware' => 'notAuth']);
Route::get('/promocionPreview/{id}', ['uses'=>'UsuarioServiciosController@edicionPromocion2','middleware' => 'notAuth']);

Route::get('vistaPreviaEvento/{id_evento}', ['uses' => 'UsuarioServiciosController@vistaPreviaEvento','middleware' => 'notAuth'] );
Route::get('/previewEvento', ['uses' => 'UsuarioServiciosController@getPreviewEvento','middleware' => 'notAuth']);
Route::get('/eventoPreview/{id}', ['uses'=>'UsuarioServiciosController@edicionEvento2','middleware' => 'notAuth']);

Route::get('/updateEstadoError/{id}', ['uses'=>'HomePublicController@updateEstadoError','middleware' => 'notAuth']);

Route::get('/tour/{nombre_agrupamiento}/{id_usuario_servicio}/{id_agrupamiento}', ['uses'=>'HomePublicController@agrupamientos']);




//RUTA PARA CONFIRMACION DE PAGO CON TARJETA DE CREDITO

//envio de pago medios cambiar a POST
//Route::get('/confirmacion', ['uses'=>'HomePublicController@confirmacion']);
Route::post('/confirmacion', ['uses'=>'HomePublicController@confirmacion']);
//consulta reserva
Route::get('/consultareservacion/{token}', ['uses'=>'HomePublicController@consultareservacion']);
//cuando la solicitud de pago medios devuelve status 0
Route::get('/errorsolicitudpago/{token}/{mensaje}', ['uses'=>'HomePublicController@errorSolicitudpagoTarjetaCredito']);

//RUTA PARA CONFIRMACION CON EFECTIVO
Route::get('/confirmacionEfectivo/{token}', ['as' => 'confirmacionefectivo', 'uses' => 'HomePublicController@getConfirmacionCash']);
Route::get('/reservaCash', ['uses' =>'HomePublicController@getReservaCash']);


