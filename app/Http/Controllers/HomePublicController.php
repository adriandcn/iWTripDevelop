<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;
use Input;
use Validator;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Session;
use App\Models\Review_Usuario_Servicio;
use App\Jobs\VerifyReview;
use App\Repositories\ServiciosOperadorRepository;
use App\Jobs\ReservacionTDCMail;
use \Crypt;
use App\Jobs\ContactosMail;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use App\Jobs\ReservacionMail;



class HomePublicController extends Controller {

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome(PublicServiceRepository $gestion) {
        //
        try {
            $ipUser = $this->getIp();

            $location = json_decode(file_get_contents("http://ipinfo.io/186.47.240.232"));
            //$location = json_decode(file_get_contents("http://ipinfo.io/186.47.240.232"));
        } catch (Exception $e) {
            $location = json_decode(file_get_contents("http://ipinfo.io/186.47.240.232"));
        }



        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        return view('public_page.front.homePage')->with('location', $location)
        ;
    }

    //Logica para obtener sitemap de los sitios turisticos
    public function sitemap(PublicServiceRepository $gestion) {
        if (!\Cache::has('usuarioServicioCache')) {

            $usuarioServicioCache = $gestion->getSitemapUsuariosServicio();

            \Cache::put('usuarioServicioCache', $usuarioServicioCache, 4320);
        } else {
            $usuarioServicioCache = \Cache::get('usuarioServicioCache');
        }
        $content = View::make('Admin/sitemap', ['usuarioServicioCache' => $usuarioServicioCache]);
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }
    
    
    
    public function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2){

        $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
        switch($unit) {
                case 'km':
                        $distance = $degrees * 111.13384; 
                        break;
                case 'mi':
                        $distance = $degrees * 69.05482; 
                        break;
                case 'nmi':
                        $distance =  $degrees * 59.97662; 
        }
        return round($distance, $decimals);        
        
    }

    //Obtiene las descripcion de la atraccion elegida
    public function getTripDescripcion($nombre_atraccion, $id_atraccion, PublicServiceRepository $gestion) {


        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        $gestion->saveVisita(null, $id_atraccion);

        $provincia = null;
        $canton = null;
        $parroquia = null;

        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        if ($atraccion != null) {
            if ($atraccion->id_catalogo_servicio == 11) {

                $eat = $gestion->getTripToDo($id_atraccion, 1);
                $sleep = $gestion->getTripToDo($id_atraccion, 2);
                $trips = $gestion->getotherTrips($id_atraccion);

                $imagenes = $gestion->getAtraccionImages($id_atraccion);
                //print_r($eat);
                //dd($eat);
                if ($id_atraccion == 1170) {
                    return view('public_page.front.Trip2')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                } elseif ($id_atraccion == 1171) {
                    return view('public_page.front.Trip3')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                } 
                 elseif ($id_atraccion == 1172) {
                    return view('public_page.front.Trip4')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                }
                
                elseif ($id_atraccion == 1173) {
                    return view('public_page.front.Trip5')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                }
                else {
                    return view('public_page.front.Trip1')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                }
            } else
                abort(404);
        } else
            abort(404);
    }
    
    
    
    //busca dentro de un usuario servicios
    public function postFiltersCategoriaIntern(Request $request, PublicServiceRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $arrayFiltro = array();
        //obtengo los servicios ya almacenados de la bdd


        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if (strpos($key, 'act_') !== False) {
                $arrayFiltro[] = str_replace("act_", "", $key);
            }
        }

        $busquedaInicial = $gestion->getBusquedaInicialCatalogoFiltrosInternos($formFields['id_usuario_previo'], $formFields['searchCity'], $arrayFiltro, $formFields['min_price_i'], $formFields['max_price_i'], null, null, 100, 1);


        $busquedaInicialP = null;




        $view = View::make('public_page.partials.searchcategory', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();

            return response()->json(array('success' => true, 'sections' => $sections));
            //return  Response::json($sections['contentPanel']); 
        }






        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }
    
    
    
    
     
    //Obtiene los servicios por catalogo cercanos a la atraccion paginados
    public function getCatalosoServiciosSearchIntern(Request $request, PublicServiceRepository $gestion,$id, $id_catalogo, $ciudad) {
        //

        $busquedaInicial = $gestion->getBusquedaInicialCatalogoIntern($id,$id_catalogo, $ciudad, null, null, 500, 4);
//dd($busquedaInicial);


        $busquedaInicialP = null;

        if ($busquedaInicial != null) {
            if (Input::get('page') > $busquedaInicial->currentPage()) {

                $busquedaInicialP = $gestion->getBusquedaInicialCatalogoPadreIntern($id,$id_catalogo, $ciudad, Input::get('page'), $busquedaInicial->currentPage(), 100, 3);
            }
        }


        $view = View::make('public_page.partials.listServicesCategoria', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los top places paginados
    public function getTopPlaces(Request $request, PublicServiceRepository $gestion) {
       
  
    
        
        $array = array(1,2);
             
        $topPlacesCosta = $gestion->getTopPlaces(500, $array);
       
        
        
        $topPlacesSierra = null;//$gestion->getTopPlaces(100, 2);
        $topPlacesOriente = null;//$gestion->getTopPlaces(100, 3);
        $topPlacesGalapagos = null;//$gestion->getTopPlaces(100, 4);
        
        //Toma de la tabla events
        $topEvents = null;//$gestion->getTopEvents(100);
        
        //toma de la tabla usuario servicio where catalogo=10 (eventos)
        $topEventsIndividual = null;//$gestion->getTopEventsIndividual(100);
        
        
        $view = View::make('public_page.partials.AllTopPlaces', array(
                    'topPlacesCosta' => $topPlacesCosta,
                    'topPlacesSierra' => $topPlacesSierra,
                    'topPlacesOriente' => $topPlacesOriente,
                    'topPlacesGalapagos' => $topPlacesGalapagos,
                'topEvents' => $topEvents,
                'topEventsIndividual' => $topEventsIndividual
        ));
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
    }

    //Obtiene los top places paginados
    public function getCercanosIntern(Request $request, PublicServiceRepository $gestion, $id_atraccion, $id_provincia, $id_canton, $id_parroquia) {
        //
        //saber cuales son los hijos de la atraccion principal si lo tiene
        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        
        $provincias = null;
        $canton = null;
        $parroquia = null;
        $evntParroquia = null;
        $prmoParroquia = null;
        $evntCanton = null;
        $prmoCanton = null;
        $evntProvincia = null;
        $prmoProvincia = null;
        if ($id_parroquia != 0) {
            $parroquia = $gestion->getParroquiaIntern($id_parroquia, $id_atraccion);
            if ($parroquia != null) {
                $evntParroquia = $gestion->getEventIntern($parroquia);
                $prmoParroquia = $gestion->getPromoIntern($parroquia);
            }
        }
        if ($id_canton != 0) {
            if ($parroquia != null) {
                if (Input::get('page') > $parroquia->currentPage()) {
                    $canton = $gestion->getCantonIntern($id_canton, $id_atraccion, $id_parroquia, Input::get('page'), $parroquia->currentPage());
                }
            } else {
                $canton = $gestion->getCantonIntern($id_canton, $id_atraccion, $id_parroquia, null, null);
            }
            if ($canton != null) {
                $evntCanton = $gestion->getEventIntern($canton);
                $prmoCanton = $gestion->getPromoIntern($canton);
            }
        }
        if ($id_provincia != 0) {
            if ($canton != null) {
                if ($parroquia != null) {
                    $page = $canton->currentPage() + $parroquia->currentPage();
                    $stop = $parroquia->currentPage();
                } else {
                    $page = $canton->currentPage();
                    $stop = $canton->currentPage();
                }
                if (Input::get('page') > ($page)) {
                    $provincias = $gestion->getProvinciaIntern($id_provincia, $id_atraccion, $id_canton, $id_parroquia, Input::get('page'), $stop);
                }
            } else {
                $provincias = $gestion->getProvinciaIntern($id_provincia, $id_atraccion, $id_canton, $id_parroquia, null, null);
            }
            if ($provincias != null) {
                $evntProvincia = $gestion->getEventIntern($provincias);
                $prmoProvincia = $gestion->getPromoIntern($provincias);
            }
        }
        
        
        
        
        //**********************************************************************//
        //            CALCULO DE LAS DISTANCIAS                                //
        //**********************************************************************//        
        if(count($parroquia) > 0){
            for($i =0; $i < count($parroquia); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$parroquia[$i]->latitud_servicio,$parroquia[$i]->longitud_servicio);
                $parroquia[$i]->distancia = $distancia;
            }            
        }
        
        if(count($evntParroquia) > 0){
            for($i =0; $i < count($evntParroquia); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$evntParroquia[$i]->latitud_servicio,$evntParroquia[$i]->longitud_servicio);
                $evntParroquia[$i]->distancia = $distancia;
            }            
        }

        if(count($prmoParroquia) > 0){
            for($i =0; $i < count($prmoParroquia); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$prmoParroquia[$i]->latitud_servicio,$prmoParroquia[$i]->longitud_servicio);
                $prmoParroquia[$i]->distancia = $distancia;
            }            
        }        
        
        if(count($canton) > 0){
            for($i =0; $i < count($canton); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$canton[$i]->latitud_servicio,$canton[$i]->longitud_servicio);
                $canton[$i]->distancia = $distancia;
            }
        }

        if(count($provincias) > 0){
            for($i =0; $i < count($provincias); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$provincias[$i]->latitud_servicio,$provincias[$i]->longitud_servicio);
                $provincias[$i]->distancia = $distancia;
            }
        } 

        if(count($evntCanton) > 0){
            for($i =0; $i < count($evntCanton); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$evntCanton[$i]->latitud_servicio,$evntCanton[$i]->longitud_servicio);
                $evntCanton[$i]->distancia = $distancia;
            }            
        }
        
        if(count($prmoCanton) > 0){
            for($i =0; $i < count($prmoCanton); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$prmoCanton[$i]->latitud_servicio,$prmoCanton[$i]->longitud_servicio);
                $prmoCanton[$i]->distancia = $distancia;
            }            
        }

        if(count($evntProvincia) > 0){
            for($i =0; $i < count($evntProvincia); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$evntProvincia[$i]->latitud_servicio,$evntProvincia[$i]->longitud_servicio);
                $evntProvincia[$i]->distancia = $distancia;
            }            
        }

        if(count($prmoProvincia) > 0){
            for($i =0; $i < count($prmoProvincia); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$prmoProvincia[$i]->latitud_servicio,$prmoProvincia[$i]->longitud_servicio);
                $prmoProvincia[$i]->distancia = $distancia;
            }            
        }        

        
        
        
        
        
        
        
        
        $view = View::make('public_page.partials.cercanosIntern', array('parroquia' => $parroquia,
                    'evntParroquia' => $evntParroquia,
                    'prmoParroquia' => $prmoParroquia,
                    'canton' => $canton,
                    'provincias' => $provincias,
                    'evntCanton' => $evntCanton,
                    'prmoCanton' => $prmoCanton,
                    'evntProvincia' => $evntProvincia,
                    'prmoProvincia' => $prmoProvincia,
        ));
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
    }

    //Obtiene los top places paginados
    public function getbyCity(Request $request, PublicServiceRepository $gestion, $city) {
        //



        $eventosCloseProv = null;
        $eventosDepCloseProv = null;
        $eventosClose = null; //$gestion->getEventsIndepCity($city, 100, 10); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $eventosDepClose = $gestion->getEventsDepCity($city, 100, 10); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $PromoDepClose = null; //$gestion->getPromoDepCity($city, 100, 10); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);



        $view = View::make('public_page.partials.closeToMe', array('eventosClose' => $eventosClose,
                    'eventosCloseProv' => $eventosCloseProv,
                    'eventosDepClose' => $eventosDepClose,
                    'eventosDepCloseProv' => $eventosDepCloseProv,
                    'PromoDepClose' => $PromoDepClose));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los lugares cercanos acorde a una ubicacion paginados
    public function getcloseToMe(Request $request, PublicServiceRepository $gestion, $city) {


        $eventosCloseProv = null;
        $eventosDepClose = null;
        $eventosDepCloseProv = null;
        $PromoDepClose = null;
        $AtraccionesClose = null;
        //Existe una categoria que es independiente para crear eventos
        $eventosClose = null; //$gestion->getEventsIndepCity($city, 100, 12); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        //esos son eventos y promociones de los establecimientos
        $eventosDepClose = $gestion->getEventsDepCity($city, 100, 12); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $PromoDepClose = $gestion->getPromoDepCity($city, 100, 12); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);


        $AtraccionesClose = $gestion->getAtraccionesByCity($city, 100, 12);

        if ($AtraccionesClose == null) {
            $AtraccionesClose = $gestion->getAtraccionesByCity("Ecuador", 100, 12);
        }
        //$Inspiration = $gestion->getInspiration(100, 2);
        $Inspiration = null;


        if ($eventosClose != null) {

            if (Input::get('page') > $eventosClose->currentPage()) {
                $eventosCloseProv = $gestion->getEventsIndepProvince($city, Input::get('page'), $eventosClose->currentPage(), 100, 10);
            }
            if ($eventosDepClose != null) {
                if (Input::get('page') > $eventosDepClose->currentPage()) {
                    $eventosDepCloseProv = $gestion->getEventsDepProvince($city, Input::get('page'), $eventosDepClose->currentPage(), 100, 10);
                }
            }
        } else {

            $eventosCloseProv = $gestion->getEventsIndepProvince($city, null, null, 100, 4);
        }

        $view = View::make('public_page.partials.closeToMe', array('eventosClose' => $eventosClose,
                    'eventosCloseProv' => $eventosCloseProv,
                    'eventosDepClose' => $eventosDepClose,
                    'eventosDepCloseProv' => $eventosDepCloseProv,
                    'PromoDepClose' => $PromoDepClose,
                    'Inspiration' => $Inspiration,
                    'AtraccionesClose' => $AtraccionesClose,
                        )
                )
        ;

        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
    }

    //Obtiene las regiones del pais
    public function getRegiones(Request $request) {
        //
        //Al momento son quemadas 4 provincias
        //$listProvincias = $gestion->getProvincias();
        // $location=file_get_contents('http://freegeoip.net/json/200.125.245.238');

        $view = View::make('public_page.partials.regiones')->with('location', $location);

        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    //Obtiene las descripcion de la provincia elegida
    public function getProvinciaDescripcion($id_provincia, $id_image, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $provincias = $gestion->getProvinciaDetails($id_provincia);
        $imagenes = $gestion->getImageporProvincia($id_provincia);
        $ciudades = $gestion->getCiudades($id_provincia);
        $visitados = $gestion->getVisitadosProvincia($id_provincia);

        // $eventosProvincia = $gestion->getEventosProvincia($id_provincia);
        $explore = $gestion->getExplorer($id_provincia);

        return view('public_page.front.detalleProvincia')->with('provincias', $provincias)->with('imagenes', $imagenes)->with('ciudades', $ciudades)->with('explore', $explore)->with('visitados', $visitados);
    }

    //Obtiene las promociones de cada evento 
    public function getPromocionesAtraccion(Request $request, $id_atraccion, PublicServiceRepository $gestion) {
        //




        $ImgPromociones = null;
        $promociones = $gestion->getPromoAtraccion($id_atraccion);
        if ($promociones != null)
            $ImgPromociones = $gestion->getPromotionsImagenAtraccion($promociones);



        $view = View::make('public_page.partials.promocionesAtraccion', array('promociones' => $promociones, 'ImgPromociones' => $ImgPromociones));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los eventos de cada atraccion  de cada evento 
    public function getEventosAtraccion(Request $request, $id_atraccion, PublicServiceRepository $gestion) {
        //




        $Imgeventos = null;
        $eventos = $gestion->getEventosAtraccion($id_atraccion);
        if ($eventos != null)
            $Imgeventos = $gestion->getEventosImagenAtraccion($eventos);



        $view = View::make('public_page.partials.eventosAtraccion', array('eventos' => $eventos, 'Imgeventos' => $Imgeventos));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene las descripcion de la atraccion elegida
    public function getAtraccionDescripcion($nombre_atraccion, $id_atraccion, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        
        $ImgItiner = null;
        $explore = null;
        $visitados = null;

        $provincia = null;
        $canton = null;
        $parroquia = null;
        $trips=null;
        $operadores=null;
        $errores = $gestion->getErrores();


        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        
        if($atraccion!=null){
        $gestion->saveVisita(null, $id_atraccion);
        
        $tipoReviews = $gestion->getTiporeviews($id_atraccion);
        $imagenes = $gestion->getAtraccionImages($id_atraccion);


        $itinerarios = $gestion->getItinerAtraccion($id_atraccion);
        $related = $gestion->getHijosAtraccion($id_atraccion);
        $servicios = $gestion->getServicios($atraccion->id_canton);
$trips = $gestion->getTrips($atraccion->id_provincia);
$operadores = $gestion->getOperadores($atraccion->id_provincia);


     if(count($related) > 0){
            //CALCULO DE LA DISTANCIA POR CADA $RELATED
            for($i =0; $i < count($related); $i++){
                $distancia = $this->distanceCalculation($atraccion->latitud_servicio,$atraccion->longitud_servicio,$related[$i]->latitud_servicio,$related[$i]->longitud_servicio);
                //$distancia = $this->distanceCalculation($related[$i]->latitud_servicio,$related[$i]->longitud_servicio,$atraccion->latitud_servicio,$atraccion->longitud_servicio);
                $related[$i]->distancia = $distancia;
            }            
        }




        if ($atraccion->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($atraccion->id_provincia);

        if ($atraccion->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($atraccion->id_canton);

        if ($atraccion->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($atraccion->id_parroquia);

        if ($related == null)
            $visitados = $gestion->getVisitadosProvincia($atraccion->id_provincia);




        if ($itinerarios != null)
            $ImgItiner = $gestion->getItinerImagenAtraccion($itinerarios);


        if (isset($atraccion->id_provincia))
            $explore = $gestion->getExplorer($atraccion->id);


        return view('public_page.front.detalleAtracciones')->with('atraccion', $atraccion)
                        ->with('imagenes', $imagenes)->with('explore', $explore)
                        ->with('itinerarios', $itinerarios)
                        ->with('ImgItiner', $ImgItiner)
                        ->with('related', $related)
                        ->with('visitados', $visitados)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
                        ->with('servicios', $servicios)
                        ->with('tipoReviews', $tipoReviews)
                ->with('trips', $trips)
                ->with('errores', $errores)
                ->with('operadores', $operadores);
        }
        else
        {
              abort(404); 
            
        }
    }

    /* ::           where: 'M' is statute miles (default)                         : */
    /* ::                  'K' is kilometers                                      : */
    /* ::                  'N' is nautical miles   
      public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
      return ($miles * 1.609344);
      } else if ($unit == "N") {
      return ($miles * 0.8684);
      } else {
      return $miles;
      }
      }
      : */

    //Obtiene los servicios por catalogo cercanos a la atraccion paginados
    public function getCatalosoServiciosSearch(Request $request, PublicServiceRepository $gestion, $id_catalogo, $ciudad) {
        //

        $busquedaInicial = $gestion->getBusquedaInicialCatalogo($id_catalogo, $ciudad, null, null, 500, 4);


        $busquedaInicialP = null;

        if ($busquedaInicial != null) {
            if (Input::get('page') > $busquedaInicial->currentPage()) {

                $busquedaInicialP = $gestion->getBusquedaInicialCatalogoPadre($id_catalogo, $ciudad, Input::get('page'), $busquedaInicial->currentPage(), 100, 3);
            }
        }


        $view = View::make('public_page.partials.searchcategory', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los servicios por catalogo cercanos a la atraccion paginados
    public function getCatalosoServicios(Request $request, PublicServiceRepository $gestion, $id_atraccion, $id_catalogo) {
        //

        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        $catalogo=null;
        $catalogo1=null;
    
    
        if ($id_catalogo == 11) {
            $catalogo1 = $gestion->getTripList($id_atraccion, $id_catalogo);
    
            if($catalogo1!="" && $catalogo1 != null)
            $catalogo = $gestion->getDetailsServiciosAtraccionTrips($catalogo1, null, null, 10);
            
        } else {
            $catalogo1 = $gestion->getCatalogoDetails($id_atraccion, $id_catalogo);
                    
            $catalogo = $gestion->getDetailsServiciosAtraccion($catalogo1, null, null, 4);
        }

if($catalogo != null){
        if ($atraccion->id_provincia != 0) {


            if (Input::get('page') > $catalogo->currentPage()) {

                $catalogo2 = $gestion->getCatalogoDetailsProvincia($atraccion, $id_catalogo, $catalogo1);
                $catalogo = $gestion->getDetailsServiciosAtraccion($catalogo2, Input::get('page'), $catalogo->currentPage(), 3);
            }
        }


        $view = View::make('public_page.partials.listServicesCategoria', array('catalogo' => $catalogo));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
}
else{
return null;
}
    }
    
    
    
    //*************************************************************//
    //              NUEAVS FUNCIONES                               //
    //*************************************************************//    
    
  public function guardarError($id_usuario_servicio, $id_error, PublicServiceRepository $gestion) {
        
        $ipUser = $this->getIp();
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        
        $guardarError = $gestion->guardarError($id_usuario_servicio,$id_error,$ipUser,$desk);
        
        return response()->json(array('success' => true, 'guardar' => $guardarError));         
        
        
    }
    
    public function postError(Request $request, PublicServiceRepository $gestion) {

         $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        
        $ipUser = $this->getIp();
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        
        $nuevoErrorContacto = $gestion->guardarErrorContacto($formFields['id_usuario_servicio'],$formFields['id_error'],
                        $formFields['nombres'],$formFields['email'],$formFields['telefono'],$ipUser,$desk);

        
        return response()->json(array('success' => true, 'redirectto' => $nuevoErrorContacto));
        
    }
    
    
    
//**********************************************************************************************************************************//

    
    public function detallePromo($nombre_servicio, $nombre_evento,$id_promo, PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1) {
        
        $promocion = $gestion->getInfoPromo($id_promo);
        $imagenes = $gestion1->getImagePromocionesOperador($id_promo);
        $nombreAtraccion = $gestion->getNombreUsuarioServicio($promocion[0]->id_usuario_servicio); 
        
        if($promocion[0]->estado_promocion == 1){
            return view('responsive.detallePromocion')
                    ->with('imagenes', $imagenes)
                    ->with('nombreAtraccion', $nombreAtraccion)
                    ->with('promocion', $promocion);
        }elseif($promocion[0]->estado_promocion == 0){
            
            return redirect('/detalle/'.$nombreAtraccion[0]->nombre_servicio.'/'.$nombreAtraccion[0]->id);
        }else{
          return view('errors.404'); 
        }
        
    }
    
    public function detalleEvento($nombre_servicio, $nombre_evento, $id_evento, PublicServiceRepository $gestion,ServiciosOperadorRepository $gestion1) {
        
        $evento = $gestion->getInfoEvento($id_evento);
        $imagenes = $gestion1->getImageEventosOperador($id_evento);
        //$nombreAtraccion = $gestion->getNombreUsuarioServicioEvento($evento[0]->id_usuario_servicio);
        $nombreAtraccion = $gestion->getNombreUsuarioServicio($evento[0]->id_usuario_servicio); 
       
        if($evento[0]->estado_evento == 1){
            return view('responsive.detalleEvento')
                    ->with('imagenes', $imagenes)
                    ->with('nombreAtraccion', $nombreAtraccion)
                    ->with('evento', $evento);
        }elseif($evento[0]->estado_evento == 0){
            
            return redirect('/detalle/'.$nombreAtraccion[0]->nombre_servicio.'/'.$nombreAtraccion[0]->id);
        }else{
          return view('errors.404'); 
        }
    }
    
    public function updateEstadoError($id, Request $request, Guard $auth,PublicServiceRepository $gestion) {

        $ipUser = $this->getIp();
        $fecha = date("Y-m-d h:i:s");
        $usuario = $auth->user()->id;
        $updateError = $gestion->updateErrorRevisado($id,$ipUser,$fecha,$usuario);

        return response()->json(array('success' => true, 'redirectto' => $updateError));
    }


    public function postContactos(Request $request,PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
      
        $nuevoContactenos = $gestion->guardarContactos($formFields['fistname'],$formFields['lastname'],$formFields['email'],$formFields['mensaje']);
        
        if($nuevoContactenos == true){
            $this->dispatch(new ContactosMail($formFields['fistname'],$formFields['lastname'],
                                            $formFields['email'],$formFields['mensaje']));
        }
        
      
        return response()->json(array('success' => true, 'redirectto' => $nuevoContactenos));
    }      




    //Obtiene las descripcion de la atraccion elegida
    public function getSearchHomeCatalogo(PublicServiceRepository $gestion, $id_catalogo) {

        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        Session::put('device', $desk);


        $catalogo = $gestion->getCatalogoDetail($id_catalogo);
        if ($catalogo != null) {
            $actividades = $gestion->getExplorerbyCatalogo($id_catalogo);
            $servicios = $gestion->getServiciosAll();
            $precio_minimo = $gestion->getMinPrice($id_catalogo);

            $precio_max = $gestion->getMaxPrice($id_catalogo);

            return view('public_page.front.searchByHome')
                            ->with('actividades', $actividades)
                            ->with('servicios', $servicios)
                            ->with('precio_minimo', $precio_minimo)
                            ->with('precio_max', $precio_max)
                            ->with('catalogo', $catalogo);
        } else {
            return $this->getHome($gestion);
        }
    }

    //Obtiene las descripcion de la atraccion elegida
    public function getCatalogoDescripcion(PublicServiceRepository $gestion, $id_atraccion, $id_catalogo) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        Session::put('device', $desk);

        $catalogo = $gestion->getCatalogoDetail($id_catalogo);
        $ServicioPrevio = $gestion->getAtraccionDetails($id_atraccion);
        $servicios = $gestion->getServicios($ServicioPrevio->id_provincia);
        //$likes=$gestion->getlikes($ServicioPrevio->id);


        $provincia = null;
        $canton = null;
        $parroquia = null;

        if ($ServicioPrevio->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($ServicioPrevio->id_provincia);

        if ($ServicioPrevio->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($ServicioPrevio->id_canton);

        if ($ServicioPrevio->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($ServicioPrevio->id_parroquia);


        return view('public_page.front.listServices')
                        ->with('ServicioPrevio', $ServicioPrevio)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
                        ->with('servicios', $servicios)
                        ->with('id_catalogo', $id_catalogo)
                        ->with('catalogo', $catalogo);
    }

    //Obtiene todas las provincias de la region
    public function getRegionsId($id_region, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $provincias = $gestion->getRegionDetails($id_region);
        $imagenes = $gestion->getImageporRegion($id_region);



        return view('public_page.front.allRegions')->with('provincias', $provincias)->with('imagenes', $imagenes)->with('region', $id_region);
    }

    //Obtiene los top places paginados
    public function getConfirmReview($codigo, PublicServiceRepository $gestion) {
        $checkcode = $gestion->updateCodeReview($codigo);
        $rev_code = $gestion->getRevCode($codigo);

        return redirect('/tokenDc$rip/' . $rev_code->id_usuario_servicio);
    }

    public function getReviews(Request $request, PublicServiceRepository $gestion, $id_atraccion) {
        //

        $reviews = $gestion->getReviews($id_atraccion);
        $view = View::make('public_page.partials.reviews', array('reviews' => $reviews));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    public function getLikesSatisf(Request $request, PublicServiceRepository $gestion, $id_atraccion) {
        //

        $likes = $gestion->getlikes($id_atraccion);


        $view = View::make('public_page.partials.btnLike', array('likes' => $likes, 'atraccion' => $id_atraccion));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    public function postReviews(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);


        $validator = Validator::make($formFields, Review_Usuario_Servicio::$rules);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'message' => $validator->messages()->first(),
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            $verifyIp = $gestion->getReviewsIpEmail($formFields['id_atraccion'], $formFields['email_reviewer']);

            if ($verifyIp == null) {
                $root_array = array();
                //Arreglo de servicios prestados que vienen del formulario
                foreach ($formFields as $key => $value) {
                    //verifica si el arreglo de parametros es un catalogo
                    if (strpos($key, 'review_score') !== false) {
                        $root_array[$key] = $value;
                    }
                }

                $save_array = array();
                $codigo = str_random(30);
                foreach ($root_array as $key1 => $value1) {

                    $save_array['calificacion'] = $value1;
                    $save_array['nombre_reviewer'] = $formFields['nombre_reviewer'];
                    $save_array['email_reviewer'] = $formFields['email_reviewer'];
                    $save_array['id_usuario_servicio'] = $formFields['id_atraccion'];
                    $save_array['id_tipo_review'] = $formFields['id_tipo_review_' . substr($key1, 13)];
                    $save_array['confirmation_rev_code'] = $codigo;
                    $save_array['ip_reviewer'] = $this->getIp();
                    $review = $gestion->storeNew($save_array);
                }

                $this->dispatch(new VerifyReview($review));
            } else {
                return response()->json(array(
                            'fail' => true,
                            'message' => "Usted ya ha dejado un review anteriormente",
                            'errors' => $validator->getMessageBag()->toArray()
                ));
            }

            return response()->json(array(
                        'success' => true,
                        'message' => "Gracias por tu review, se ha enviado un correo electrónico a tu email para verificación"
            ));
        }
    }

    public function postFiltersCategoria(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $arrayFiltro = array();
        //obtengo los servicios ya almacenados de la bdd


        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if (strpos($key, 'act_') !== False) {
                $arrayFiltro[] = str_replace("act_", "", $key);
            }
        }


        $busquedaInicial = $gestion->getBusquedaInicialCatalogoFiltros($formFields['catalogo'], $formFields['searchCity'], $arrayFiltro, $formFields['min_price_i'], $formFields['max_price_i'], null, null, 100, 1);


        $busquedaInicialP = null;




        $view = View::make('public_page.partials.searchcategory', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();

            return response()->json(array('success' => true, 'sections' => $sections));
            //return  Response::json($sections['contentPanel']); 
        }






        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }

    public function postLikesS(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $ip = $this->getIp();
        $likesIP = $gestion->getlikesIp($formFields['ids'], $ip);

        if (count($likesIP) == 0 || $likesIP == null) {
            $gestion->storeLikes($formFields['ids'], $ip);
        }


        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }
    
    
    
    
    
    public function getAtraccionDescripcion1(PublicServiceRepository $gestion) {
        $agent = new Agent();

         $id_atraccion = session('usu_servicio');
         $id_catalogo = session('id_catalogo');
         
        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        $gestion->saveVisita(null,$id_atraccion);
        $ImgItiner = null;
        $explore = null;
        $visitados = null;

        $provincia = null;
        $canton = null;
        $parroquia = null;

        $tipoReviews = $gestion->getTiporeviews($id_atraccion);
        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        $imagenes = $gestion->getAtraccionImages($id_atraccion);


        $itinerarios = $gestion->getItinerAtraccion($id_atraccion);
        $related = $gestion->getHijosAtraccion($id_atraccion);
        $servicios = $gestion->getServicios($atraccion->id_provincia);

        if ($atraccion->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($atraccion->id_provincia);

        if ($atraccion->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($atraccion->id_canton);

        if ($atraccion->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($atraccion->id_parroquia);

        if ($related == null)
            $visitados = $gestion->getVisitadosProvincia($atraccion->id_provincia);




        if ($itinerarios != null)
            $ImgItiner = $gestion->getItinerImagenAtraccion($itinerarios);


        if (isset($atraccion->id_provincia))
            $explore = $gestion->getExplorer($atraccion->id);


        return view('responsive.detalleAtracciones')->with('atraccion', $atraccion)
                        ->with('imagenes', $imagenes)
                        ->with('explore', $explore)
                        ->with('itinerarios', $itinerarios)
                        ->with('related', $related)
                        ->with('visitados', $visitados)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
                        ->with('servicios', $servicios)
                        ->with('tipoReviews', $tipoReviews)

        ;
    }
    
    
      //*************************************************************//
    //          Booking            //
    //*************************************************************//     

    
    public function getConfirmacionPaypal1($id, Guard $auth) {
        
            //ENVIO EL ID DE LA RESERVA
            if (isset($id)){
                
                //VERIFICO QUE EL ID DE LA RESERVA ESTE EN LA TABLA PAGO PAYPAL
                $verificoPagoConsumido = DB::table('pago_paypals')
                         ->select(DB::raw('consumido'))
                         ->where('id_reserva', '=', $id)
                         ->get();
                
                 if(empty($verificoPagoConsumido)){
                     //SI NO EXISTE EN LA TABLA DE PAGO PAYPAL
                     //ME REDIRIGE A LA TABLA DE ERROR DE PAYPAL
                     return view('public_page.front.confirmacionError');
                     
                 }elseif($verificoPagoConsumido[0]->consumido == true){
                     //SI EXISTE EN LA TABLA DE PAGO PAYPAL Y CONSUMIDO ES TRUE
                     //ME REDIRIGE A LA TABLA DE ERROR DE PAYPAL
                     return view('public_page.front.confirmacionError');
                     
                 }else{
                    $estado = true;
                    $updateReserva = DB::table('pago_paypals')
                                     ->where('id_reserva',$id)
                                    ->update(['consumido'=>$estado]);

                    $infoPago = DB::table('pago_paypals')
                             ->select(DB::raw('*'))
                             ->where('id_reserva', '=', $id)
                             ->get();

                   $infoReservas = DB::table('booking_abcalendar_reservations')
                             ->select(DB::raw('*'))
                             ->where('id', '=', $id)
                             ->get(); 
                   
                   $estadoReserva = $infoPago[0]->estadoPago;
                   
                   //$estadoReserva = "Fail";
                   
                   if($estadoReserva == "Completed"){
                       
                    //BUSCO EL ID DEL CALENDARIO
                    $infoReserva = DB::table('booking_abcalendar_reservations')
                                    ->select(DB::raw('calendar_id'))
                                    ->where('id', '=', $id)
                                    ->get();
        
                    $idCalendario = $infoReserva[0]->calendar_id;
        
                    //BUSCO EL ID DEL USUARIO SERVICIO
                    $infoReserva1 = DB::table('booking_abcalendar_calendars')
                                 ->select(DB::raw('id_usuario_servicio'))
                                 ->where('id', '=', $idCalendario)
                                 ->get();

                    $idUsuarioServicio = $infoReserva1[0]->id_usuario_servicio;
                    
                    $user = $auth->user();
                    
                    if(empty($user)) {
                        // EL VOLVER ES A LA PARTE PUBLICA                    
                        // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                        $tipoUsuario = "public";
                        $updateReserva = DB::table('booking_abcalendar_reservations')
                                        ->where('id',$id)
                                        ->update(['tipo_usuario'=>$tipoUsuario]);
                        
                        //BUSCO EL ID DEL USUARIO OPERADOR
                        $infoUsuarioOperador = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_usuario_operador'))
                                 ->where('id', '=', $idUsuarioServicio)
                                 ->get();
                        
                        $idUsuarioPeradorPublica = $infoUsuarioOperador[0]->id_usuario_operador;
                        
                        //OBTENGO LA INFORMACION DEL USUARIO OPERADOR
                        $infoReserva2 = DB::table('usuario_operadores')
                                 ->select(DB::raw('*'))
                                 ->where('id_usuario_op', '=', $idUsuarioPeradorPublica)
                                 ->get();
                        //  envio el correo con la informacion de la reserva y el pago y el codigo QR
                        $statusReserva = 1;
                        $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                        
                        return view('public_page.front.confirmacionPaypal', compact('infoPago','infoReservas','user','infoReserva2','idUsuarioServicio'));
                        
                    }else{

                        // VOLVER A LA PARTE ADMIN
                        // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                        $tipoUsuario = "admin";
                        $updateReserva = DB::table('booking_abcalendar_reservations')
                                         ->where('id',$id)
                                        ->update(['tipo_usuario'=>$tipoUsuario]);
                       
                        $buscoIdUsuarioServicio = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_usuario_operador'))
                                 ->where('id', '=', $idUsuarioServicio)
                                 ->get();
                        
                        $temIdOp = $buscoIdUsuarioServicio[0]->id_usuario_operador;
                        
                        /*$buscoIdUsuario = DB::table('usuario_operadores')
                                 ->select(DB::raw('id_usuario'))
                                 ->where('id_usuario_op', '=', $temIdOp)
                                 ->get();
                        $idUser = $buscoIdUsuario[0]->id_usuario; */
                        
                        
                        $infoReserva2 = DB::table('usuario_operadores')
                                 ->select(DB::raw('*'))
                                 ->where('id_usuario_op', '=', $temIdOp)
                                 ->get();

                        $idUsuarioOperador = $infoReserva2[0]->id_usuario_op;
                        
                    //SI EL USUARIO ESTA LOGUEADO PERO VIENE DE LA PARTE PUBLICA
                    //COMPROBAR QUE EL USUARIO SERVICIO DEL CALENDARIO PERTENEZCA 
                    // AL USUARIO SERVCIO DEL OPERADOR
                    //BUSCO EL ID DEL Catalogo
                        $idUsuarioOperadorLogueado = session('operador_id');
                        $infoReservaComprobar = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_catalogo_servicio'))
                                 ->where('id', '=', $idUsuarioServicio)
                                ->where('id_usuario_operador', '=', $idUsuarioOperadorLogueado)
                                 ->get();
                        
                    if (empty($infoReservaComprobar)) {
                        $statusReserva = 1;
                        $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                        $partePublica = true;
                        return view('public_page.front.confirmacionPaypal', compact('infoPago','infoReservas','user','partePublica','infoReserva2','idUsuarioServicio'));
                        
                    }else{
                       $statusReserva =1; 
                       $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                       $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                       $partePublica = false;
                       return view('public_page.front.confirmacionPaypal', compact('infoPago','infoReservas','user','partePublica','idCatalogo','idUsuarioServicio','infoReserva2'));
                    }
                    

                            
                    }
                       
                   }else{
                       
                       //CUANDO EL PAGO CON PAYPAL NO SE COMPLETO
                       //PARTE PUBLICA Y PRIVADA
                         $user = $auth->user();
                         
                         $infoPago = DB::table('pago_paypals')
                             ->select(DB::raw('*'))
                             ->where('id_reserva', '=', $id)
                             ->get();

                       $infoReservas = DB::table('booking_abcalendar_reservations')
                             ->select(DB::raw('*'))
                             ->where('id', '=', $id)
                             ->get(); 
                       
                          $idCalendario = $infoReservas[0]->calendar_id;
        
                    //BUSCO EL ID DEL USUARIO SERVICIO
                    $infoReserva1 = DB::table('booking_abcalendar_calendars')
                                 ->select(DB::raw('id_usuario_servicio'))
                                 ->where('id', '=', $idCalendario)
                                 ->get();

                    $idUsuarioServicio = $infoReserva1[0]->id_usuario_servicio;
                       
                       $sql1 = DB::table('booking_abcalendar_reservations')
                                 ->select(DB::raw('calendar_id'))
                                 ->where('id', '=', $id)
                                 ->get();
                       $idCalendarioError = $sql1[0]->calendar_id;
                       
                       $sql2 = DB::table('booking_abcalendar_calendars')
                                 ->select(DB::raw('id_usuario_servicio'))
                                 ->where('id', '=', $idCalendarioError)
                                 ->get();
                       $idUsuarioServicioError = $sql2[0]->id_usuario_servicio;
                       
                       $sql3 = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_usuario_operador'))
                                 ->where('id', '=', $idUsuarioServicioError)
                                 ->get();
                       
                       $idUsuarioOperadorError = $sql3[0]->id_usuario_operador;
                       
                       $infoReserva2 = DB::table('usuario_operadores')
                                 ->select(DB::raw('*'))
                                 ->where('id_usuario_op', '=', $idUsuarioOperadorError)
                                 ->get();
                       
                        $idUsuarioOperadorError = $infoReserva2[0]->id_usuario_op;
                        //$idUsuarioOperadorError = session('operador_id');

                        //BUSCO EL ID DEL Catalogo
                        $idUsuarioOperadorLogueado = session('operador_id');
                        $infoReservaComprobar = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_catalogo_servicio'))
                                 ->where('id', '=', $idUsuarioServicio)
                                ->where('id_usuario_operador', '=', $idUsuarioOperadorLogueado)
                                 ->get();
                   
                    if (empty($infoReservaComprobar)) {
                        $partePublica = true;
                        return view('public_page.front.errorPaypal', compact('infoReservas','infoPago','user','partePublica','infoReserva2',"idUsuarioServicio",'idCatalogo'));    
                        
                    }else{

                        $partePublica = false;
                       $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                       return view('public_page.front.errorPaypal', compact('infoReservas','infoPago','user','infoReserva2','partePublica',"idUsuarioServicio",'idCatalogo'));    

                    }
                       
                       //return view('public_page.front.errorPaypal', compact('infoReservas','infoPago','user','infoReserva2',"idUsuarioServicio",'idCatalogo'));    
                       
                   }
                   
                   //return view('public_page.front.confirmacionPaypal', compact('$infoPago','$infoReserva'));
                   
                     
                 }
                

                
            }
        
    }
    
    public function getConfirmacionAuhtorize1($id, Guard $auth) {
        
            //ENVIO EL ID DE LA RESERVA
            if (isset($id)){
                
                //VERIFICO QUE EL ID DE LA RESERVA ESTE EN LA TABLA PAGO PAYPAL
                $verificoPagoConsumido = DB::table('pago_authorizes')
                         ->select(DB::raw('consumido'))
                         ->where('id_reserva', '=', $id)
                         ->get();
                 
                 if(empty($verificoPagoConsumido)){
                     //SI NO EXISTE EN LA TABLA DE PAGO PAYPAL
                     //ME REDIRIGE A LA TABLA DE ERROR DE PAYPAL
                     return view('public_page.front.confirmacionError');
                     
                 }elseif($verificoPagoConsumido[0]->consumido == true){
                     //SI EXISTE EN LA TABLA DE PAGO PAYPAL Y CONSUMIDO ES TRUE
                     //ME REDIRIGE A LA TABLA DE ERROR DE PAYPAL
                     return view('public_page.front.confirmacionError');
                     
                 }else{
                    $estado = true;
                    $updateReserva = DB::table('pago_authorizes')
                                     ->where('id_reserva',$id)
                                    ->update(['consumido'=>$estado]);

                    $infoPago = DB::table('pago_authorizes')
                             ->select(DB::raw('*'))
                             ->where('id_reserva', '=', $id)
                             ->get();

                   $infoReservas = DB::table('booking_abcalendar_reservations')
                             ->select(DB::raw('*'))
                             ->where('id', '=', $id)
                             ->get(); 
                   
                   $estadoReserva = $infoPago[0]->estadoPago;
                   
                   //$estadoReserva = "Fail";
                   
                   if($estadoReserva == "This transaction has been approved."){
                       
                    //BUSCO EL ID DEL CALENDARIO
                    $infoReserva = DB::table('booking_abcalendar_reservations')
                                    ->select(DB::raw('calendar_id'))
                                    ->where('id', '=', $id)
                                    ->get();
        
                    $idCalendario = $infoReserva[0]->calendar_id;
        
                    //BUSCO EL ID DEL USUARIO SERVICIO
                    $infoReserva1 = DB::table('booking_abcalendar_calendars')
                                 ->select(DB::raw('id_usuario_servicio'))
                                 ->where('id', '=', $idCalendario)
                                 ->get();

                    $idUsuarioServicio = $infoReserva1[0]->id_usuario_servicio;
                    
                    $user = $auth->user();
                    
                    if(empty($user)) {
                        // EL VOLVER ES A LA PARTE PUBLICA                    
                        // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                        $tipoUsuario = "public";
                        $updateReserva = DB::table('booking_abcalendar_reservations')
                                        ->where('id',$id)
                                        ->update(['tipo_usuario'=>$tipoUsuario]);
                        
                        //BUSCO EL ID DEL USUARIO OPERADOR
                        $infoUsuarioOperador = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_usuario_operador'))
                                 ->where('id', '=', $idUsuarioServicio)
                                 ->get();
                        
                        $idUsuarioPeradorPublica = $infoUsuarioOperador[0]->id_usuario_operador;
                        
                        //OBTENGO LA INFORMACION DEL USUARIO OPERADOR
                        $infoReserva2 = DB::table('usuario_operadores')
                                 ->select(DB::raw('*'))
                                 ->where('id_usuario_op', '=', $idUsuarioPeradorPublica)
                                 ->get();
                        
                        $statusReserva = 1;
                        $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                        
                        return view('public_page.front.confirmacionAuhtorize', compact('infoPago','infoReservas','user','infoReserva2','idUsuarioServicio'));
                        
                    }else{

                        // VOLVER A LA PARTE ADMIN
                        // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                        $tipoUsuario = "admin";
                        $updateReserva = DB::table('booking_abcalendar_reservations')
                                         ->where('id',$id)
                                        ->update(['tipo_usuario'=>$tipoUsuario]);

                        //BUSCO EL ID DEL USUARIO OPERADOR
                        $infoReserva2 = DB::table('usuario_operadores')
                                 ->select(DB::raw('*'))
                                 ->where('id_usuario', '=', $user->id)
                                 ->get();

                        $idUsuarioOperador = $infoReserva2[0]->id_usuario_op;
                        
                    //SI EL USUARIO ESTA LOGUEADO PERO VIENE DE LA PARTE PUBLICA
                    //COMPROBAR QUE EL USUARIO SERVICIO DEL CALENDARIO PERTENEZCA 
                    // AL USUARIO SERVCIO DEL OPERADOR
                    //BUSCO EL ID DEL Catalogo
                        $idUsuarioOperadorLogueado = session('operador_id');
                        $infoReservaComprobar = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_catalogo_servicio'))
                                 ->where('id', '=', $idUsuarioServicio)
                                ->where('id_usuario_operador', '=', $idUsuarioOperadorLogueado)
                                 ->get();
                        
                    if (empty($infoReservaComprobar)) {
                        
                        $statusReserva = 1;
                        $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva));
                        
                        $partePublica = true;
                        return view('public_page.front.confirmacionAuhtorize', compact('infoPago','infoReservas','user','partePublica','infoReserva2','idUsuarioServicio'));
                    }else{
                       
                       $statusReserva = 1; 
                       $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                       
                       $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                       $partePublica = false;
                       return view('public_page.front.confirmacionAuhtorize', compact('infoPago','infoReservas','user','partePublica','idCatalogo','idUsuarioServicio','infoReserva2'));
                    }
                    

                            
                    }
                       
                   }else{
                       
                       //CUANDO EL PAGO CON PAYPAL NO SE COMPLETO
                       //PARTE PUBLICA Y PRIVADA
                         $user = $auth->user();
                         
                         $infoPago = DB::table('pago_authorizes')
                             ->select(DB::raw('*'))
                             ->where('id_reserva', '=', $id)
                             ->get();

                       $infoReservas = DB::table('booking_abcalendar_reservations')
                             ->select(DB::raw('*'))
                             ->where('id', '=', $id)
                             ->get(); 
                       
                          $idCalendario = $infoReservas[0]->calendar_id;
        
                    //BUSCO EL ID DEL USUARIO SERVICIO
                    $infoReserva1 = DB::table('booking_abcalendar_calendars')
                                 ->select(DB::raw('id_usuario_servicio'))
                                 ->where('id', '=', $idCalendario)
                                 ->get();

                    $idUsuarioServicio = $infoReserva1[0]->id_usuario_servicio;
                       
                       $sql1 = DB::table('booking_abcalendar_reservations')
                                 ->select(DB::raw('calendar_id'))
                                 ->where('id', '=', $id)
                                 ->get();
                       $idCalendarioError = $sql1[0]->calendar_id;
                       
                       $sql2 = DB::table('booking_abcalendar_calendars')
                                 ->select(DB::raw('id_usuario_servicio'))
                                 ->where('id', '=', $idCalendarioError)
                                 ->get();
                       $idUsuarioServicioError = $sql2[0]->id_usuario_servicio;
                       
                       $sql3 = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_usuario_operador'))
                                 ->where('id', '=', $idUsuarioServicioError)
                                 ->get();
                       $idUsuarioOperadorError = $sql3[0]->id_usuario_operador;
                       
                       $infoReserva2 = DB::table('usuario_operadores')
                                 ->select(DB::raw('*'))
                                 ->where('id_usuario_op', '=', $idUsuarioOperadorError)
                                 ->get();
                       
                        $idUsuarioOperadorLogueado = session('operador_id');
                        $infoReservaComprobar = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_catalogo_servicio'))
                                 ->where('id', '=', $idUsuarioServicio)
                                ->where('id_usuario_operador', '=', $idUsuarioOperadorLogueado)
                                 ->get();
                        
                    if (empty($infoReservaComprobar)) {
                        $partePublica = true;
                        return view('public_page.front.errorAuthorize', compact('infoReservas','infoPago','user','partePublica','infoReserva2',"idUsuarioServicio",'idCatalogo'));    
                        //return view('public_page.front.confirmacionPaypal', compact('infoPago','infoReservas','user','partePublica','infoReserva2','idUsuarioServicio'));
                    }else{
                       $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                       $partePublica = false;
                       return view('public_page.front.errorAuthorize', compact('infoReservas','infoPago','user','infoReserva2','partePublica',"idUsuarioServicio",'idCatalogo'));    
                       //return view('public_page.front.confirmacionPaypal', compact('infoPago','infoReservas','user','partePublica','idCatalogo','idUsuarioServicio','infoReserva2'));
                    }
                       
                       //return view('public_page.front.errorPaypal', compact('infoReservas','infoPago','user','infoReserva2',"idUsuarioServicio",'idCatalogo'));    
                       
                   }
                   
                   //return view('public_page.front.confirmacionPaypal', compact('$infoPago','$infoReserva'));
                   
                     
                 }
                

                
            }
        
    }
    
    /************************************************/
/*         HOME PUBLIC CONTROLLER               */
/************************************************/

    public function agrupamientos($nombre_agrupamiento,$id_usuario_servicio,$id_agrupamiento,
                    PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1) {

        $agrupacion = $gestion->getInfoAgrupamiento($id_agrupamiento);
        $calendarios = $gestion->getCalendariosAgrupamiento($id_agrupamiento,$id_usuario_servicio);
        $imagenes = $gestion1->getImageAgrupamiento($id_agrupamiento,$id_usuario_servicio);
        $atraccion = $gestion->getNombreUsuarioServicio($id_usuario_servicio);
        
          return view('public_page.front.tours')
                    ->with('imagenes', $imagenes)
                    ->with('calendarios', $calendarios)
                    ->with('atraccion', $atraccion)
                    ->with('agrupacion', $agrupacion);
    }


    
    
    public function getNoAcceso() {
            
            return view('public_page.front.confirmacionError');
        
    }
    
    
    
    
    
    
    
    
    //************************************************************************//
    //              FUNCIONES PARA EL PAGO CON TARJETA DE CREDITO             //
    //************************************************************************//
    public function pagoTarjetaCredito($reservacion_id,$token,Guard $auth,PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1){
        /*echo "Reservacion ID".$reservacion_id;
        echo "<br>";
        echo "Token ".$token;
        echo "<br>";echo "<br>";*/
        $getReserva = $gestion->getReserva($reservacion_id);
        /*echo "Infor reserva ";
        print_r($getReserva);echo "<br>";echo "<br>";*/
        $getPagoInfo = $gestion->getPagoInfo($reservacion_id,$token);
        /*echo "Infor Pago ";
        print_r($getPagoInfo);echo "<br>";echo "<br>";*/
        $getTokenInfo = $gestion->getTokenInfo($token);
        //print_r($getTokenInfo);echo "<br>";echo "<br>";
        $getCalendarInfo = $gestion->getCalendarInfo($getPagoInfo[0]->calendario_id);
        //print_r($getCalendarInfo);echo "<br>";echo "<br>";        

        if(empty($getPagoInfo)|| $getPagoInfo[0]->consumido == 1 || $getTokenInfo[0]->consumido == 1){
            //SI NO EXISTE EN LA TABLA DE PAGO PAGOS O YA FUE CONSUMIDO EL TOKEN
            //ME REDIRIGE A LA TABLA DE ERROR DE PAYPAL
            return view('public_page.front.confirmaciontErrorTarjetaCredito');
            
        }elseif($getPagoInfo[0]->consumido == 0 && $getTokenInfo[0]->consumido == 0){
            //ACTUALIZO EL CONSUMIDO DEL PAGO A 1
            //$updateReserva = $gestion->updateConsumidoReserva($getPagoInfo[0]->id);
            //$updateToken = $gestion->updateConsumidoToken($getTokenInfo[0]->id);

            $estadoReserva = $getPagoInfo[0]->estado_pago;

            if($estadoReserva == "Pendiente"){

                //BUSCO EL ID DEL CALENDARIO
                /*$infoReserva = DB::table('booking_abcalendar_reservations')
                                ->select(DB::raw('calendar_id'))
                                ->where('id', '=', $id)
                                ->get();

                $idCalendario = $infoReserva[0]->calendar_id;*/
                $idCalendario = $getPagoInfo[0]->calendario_id;

                //BUSCO EL ID DEL USUARIO SERVICIO
                /*$infoReserva1 = DB::table('booking_abcalendar_calendars')
                             ->select(DB::raw('id_usuario_servicio'))
                             ->where('id', '=', $idCalendario)
                             ->get();

                $idUsuarioServicio = $infoReserva1[0]->id_usuario_servicio;*/
                $idUsuarioServicio = $getCalendarInfo[0]->id_usuario_servicio;

                $user = $auth->user();

                if(empty($user)) {
                    // EL VOLVER ES A LA PARTE PUBLICA                    
                    // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                    /*$tipoUsuario = "public";
                    $estatusReserva = "Pending";*/

                    //$updateReserva = $gestion->updateReserva($reservacion_id,1);

                    //BUSCO EL ID DEL USUARIO OPERADOR
                    $infoUsuarioOperador = $gestion->getIdUsuarioOperador($idUsuarioServicio);

                    $idUsuarioPeradorPublica = $infoUsuarioOperador[0]->id_usuario_operador;

                    //OBTENGO LA INFORMACION DEL USUARIO OPERADOR
                    $infoReserva2 = $gestion->getInfoUsuarioOperador($idUsuarioPeradorPublica);

                    $statusReserva = 1;
                    echo "Parte Publica No Logueado";
                    //$this->dispatch(new ReservacionMail($getReserva,$getPagoInfo,$infoReserva2,$statusReserva)); 
                    //return view('public_page.front.confirmacionCashPublica', compact('infoPago','infoReservas','user','infoReserva2','idUsuarioServicio'))->render();

                }else{
                    // VOLVER A LA PARTE ADMIN
                    //BUSCO EL ID DEL USUARIO OPERADOR
                    /*$buscoIdUsuarioServicio = DB::table('usuario_servicios')
                             ->select(DB::raw('id_usuario_operador'))
                             ->where('id', '=', $idUsuarioServicio)
                             ->get();*/
                    $buscoIdUsuarioServicio = $gestion->getIdUsuarioOperador($idUsuarioServicio);

                    $temIdOp = $buscoIdUsuarioServicio[0]->id_usuario_operador;

                    /*$buscoIdUsuario = DB::table('usuario_operadores')
                             ->select(DB::raw('id_usuario'))
                             ->where('id_usuario_op', '=', $temIdOp)
                             ->get(); 
                    $buscoIdUsuario = $gestion->getInfoUsuarioOperador($temIdOp);

                    $idUser = $buscoIdUsuario[0]->id_usuario;*/ 


                    /*$infoReserva2 = DB::table('usuario_operadores')
                             ->select(DB::raw('*'))
                             ->where('id_usuario', '=', $idUser)
                             ->get();*/

                    $infoReserva2 = $gestion->getInfoUsuarioOperador($temIdOp);
                    $idUsuarioOperador = $infoReserva2[0]->id_usuario_op;

                    //SI EL USUARIO ESTA LOGUEADO PERO VIENE DE LA PARTE PUBLICA
                    //COMPROBAR QUE EL USUARIO SERVICIO DEL CALENDARIO PERTENEZCA 
                    // AL USUARIO SERVCIO DEL OPERADOR
                    //BUSCO EL ID DEL Catalogo
                    $idUsuarioOperadorLogueado = session('operador_id');
                    $infoReservaComprobar = $gestion->getIdCatalogo($idUsuarioServicio,$idUsuarioOperadorLogueado);

                    if (empty($infoReservaComprobar)) {
                        // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                        /*$tipoUsuario = "admin";
                        $estatusReserva = "Pending";*/
                        //$updateReserva = $gestion->updateReserva($reservacion_id,2);

                        echo "Parte Publica Logueado";
                        $statusReserva = 1;
                        $infoPago = $getPagoInfo;
                        $infoReservas = $getReserva;
                        //$this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva));
                        $partePublica = true;
                        return view('public_page.front.confirmacionCashPublica', compact('infoPago','infoReservas','user','partePublica','infoReserva2','idUsuarioServicio'))->render();
                    }else{
                        // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                        /*$tipoUsuario = "admin";
                        $estatusReserva = "Confirmed";*/

                        //$updateReserva = $gestion->updateReserva($reservacion_id,2);
                        echo "Parte Privada Logueado";
                        $statusReserva = 1;
                        $infoPago = $getPagoInfo;
                        $infoReservas = $getReserva;
                        //$this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                        $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                        $partePublica = false;
                        return view('public_page.front.confirmacionTarjetaCredito', compact('infoPago','infoReservas','user','partePublica','idCatalogo','idUsuarioServicio','infoReserva2','nombreCalendario'));
                    }
                }
            }            
        }
    }
    
    public function confirmacion(Request $request,Guard $auth,PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1){
        //PARAMETROS ENVIADOS POR POST PAGOMEDIOS
        /*Array ( [authorization_result] => 00 
         *        [customer_id] => 1757146806 
         *        [order_id] => 427 
         *        [order_status] => Autorizado 
         *        [purchase_operation_number] => 877953883 
         *        [card_brand] => VISA 
         *        [card_number] => 485951******0036 
         *        [card_type] => CREDIT ) 
         */
        $request->authorization_result;
        $request->customer_id;
        $request->order_id;
        $request->order_status;
        $request->purchase_operation_number;
        $request->card_brand;
        $request->card_number;
        $request->card_type;
        //FIN PARAMETROS
        // valores $request->authorization_result
        // 00 Indica que la transacción ha sido	autorizada	
        // 01 Indica que la transacción	ha sido denegada en el Banco Emisor
        // 05 Indica que la transacción	ha sido rechazada	
        
        if($request->authorization_result == "00"){
            //OBTENGO LA INFORMACION DE LA RESERVA, PAGO Y USUARIO OPERADOR
            $infoReservas = $gestion->getReserva($request->order_id);
            $infoPago = $gestion->getInfoPagoReserva($request->order_id);
            $searchUsuServ = $gestion->getUsuarioServicio($infoReservas[0]->calendar_id);
            $idUsuarioServicio = $searchUsuServ[0]->id_usuario_servicio;  
            $nombreCalendario = $infoPago[0]->nombre_calendario;
            $buscoIdUsuarioServicio = $gestion->getIdUsuarioOperador($idUsuarioServicio);
            $infoReserva2 = $gestion->getInfoUsuarioOperador($buscoIdUsuarioServicio[0]->id_usuario_operador);

            //ACTUALIZO ESTADO DE RESERVA Y DEL PAGO
            $tipo = 0;
            $updateStatusReservaTDC = $gestion->updateStatusReservaTDC($request->order_id,$tipo); 
            $updateStatusPagoReservaTDC = $gestion->updateStatusPagoReservaTDC($request->order_id,$tipo); 
            
            //ENVIO EL CORREO CON LA URL DE CONSULTA
            $urlConsulta = 'https://iwanatrip.com/consultareservacion/'.$infoReservas[0]->token_consulta;
            //$urlConsulta = 'http://localhost:8000/consultareservacion/'.$infoReservas[0]->token_consulta;
            $this->dispatch(new ReservacionTDCMail($infoReservas,$urlConsulta)); 

            //ME VOY A LA PAGINA PARA QUE VEA LA INFO DE LA RESERVACION
            return redirect('/consultareservacion/'.$infoReservas[0]->token_consulta);
        }elseif($request->authorization_result == "01" || $request->authorization_result == "05"){
            $infoReservas = $gestion->getReserva($request->order_id);
            //ACTUALIZO ESTADO A CANCELADO DE LA RESERVA Y DEL PAGO
            if($request->authorization_result == "01"){
                $tipo = 1;
            }elseif($request->authorization_result == "05"){
                $tipo = 2;
            }
            $updateStatusReservaTDC = $gestion->updateStatusReservaTDC($request->order_id,$tipo); 
            $updateStatusPagoReservaTDC = $gestion->updateStatusPagoReservaTDC($request->order_id,$tipo); 
            //ME VOY A LA PAGINA PARA QUE VEA LA INFO DE LA RESERVACION Y MUESTRO MENSAJE
            return redirect('/errorsolicitudpago/'.$infoReservas[0]->token_consulta.'/'.$tipo);
        }
    }
    
    public function consultareservacion($token,Guard $auth,PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1){
        $infoReservas = $gestion->getReservaToken($token);
        if(empty($infoReservas)){
            //SI NO EXISTE EN LA TABLA DE RESERVAS, IR A PAGINA DE ERROR
            return view('public_page.front.confirmaciontErrorTarjetaCredito');
        }else{
            //OBTENGO LA INFORMACION DE LA RESERVA, PAGO Y USUARIO OPERADOR
            $infoReservas = $gestion->getReserva($infoReservas[0]->id);
            $infoPago = $gestion->getInfoPagoReserva($infoReservas[0]->id);
            $searchUsuServ = $gestion->getUsuarioServicio($infoReservas[0]->calendar_id);
            $idUsuarioServicio = $searchUsuServ[0]->id_usuario_servicio;  
            $nombreCalendario = $infoPago[0]->nombre_calendario;
            $buscoIdUsuarioServicio = $gestion->getIdUsuarioOperador($idUsuarioServicio);
            $infoReserva2 = $gestion->getInfoUsuarioOperador($buscoIdUsuarioServicio[0]->id_usuario_operador);
            //MUESTRO LA INFORMACION DE LA RESERVA
            return view('public_page.front.confirmaciontdc', compact('infoPago','infoReservas','idUsuarioServicio','infoReserva2','nombreCalendario'));
        }
    }

    public function errorSolicitudpagoTarjetaCredito($token,$tipo,PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1){
        $infoReservas = $gestion->getReservaToken($token);
        if(empty($infoReservas)){
            //SI NO EXISTE EN LA TABLA DE RESERVAS, IR A PAGINA DE ERROR
            return view('public_page.front.confirmaciontErrorTarjetaCredito');
        }else{
            $infoPago = $gestion->getInfoPagoReserva($infoReservas[0]->id);
            $searchUsuServ = $gestion->getUsuarioServicio($infoReservas[0]->calendar_id);
            $idUsuarioServicio = $searchUsuServ[0]->id_usuario_servicio;  
            $nombreCalendario = $infoPago[0]->nombre_calendario;
            $buscoIdUsuarioServicio = $gestion->getIdUsuarioOperador($idUsuarioServicio);
            $infoReserva2 = $gestion->getInfoUsuarioOperador($buscoIdUsuarioServicio[0]->id_usuario_operador);
            if($tipo == 1){
                $mensaje = "La transacción ha sido denegada en el Banco Emisor";
            }elseif($tipo == 2){
                $mensaje = "La transacción ha sido rechazada";
            }else{
                //SI NO EXISTE EN LA TABLA DE RESERVAS, IR A PAGINA DE ERROR
                return view('public_page.front.confirmaciontErrorTarjetaCredito');                
            }          
            return view('public_page.front.errorSolicitudTDC', compact('infoPago','infoReservas','idUsuarioServicio','infoReserva2','nombreCalendario','mensaje'));
        }
    }    
    
    public function confirmacionPrueba(Request $request) {
        dd($request->all());
       /*echo "Pasa por aqui"; 
       print_r($request);die();*/
    }
    
    
    //************************************************************************//
    //              FUNCIONES PARA EL PAGO CON TARJETA DE CREDITO             //
    //************************************************************************//
    public function getConfirmacionCash($token,Guard $auth,PublicServiceRepository $gestion, ServiciosOperadorRepository $gestion1) {
            $infoReservas = $gestion->getReservaToken($token);
            $inforeserva1 = $gestion->usuarioServicoCash($infoReservas[0]->calendar_id);
            $idUsuarioServicio = $inforeserva1[0]->id_usuario_servicio;            
            
            if(empty($infoReservas)){
                //SI NO EXISTE EN LA TABLA DE RESERVAS
                //ME REDIRIGE A LA PAGINA DE ERROR
                return view('public_page.front.confirmacionErrorCash');                
            }else{
                $id = $infoReservas[0]->id;
                $idCalendarioNew = $infoReservas[0]->calendar_id;
                $fecha = $infoReservas[0]->date_from;
                $correo = $infoReservas[0]->c_email;
                $verificarCorreo = $gestion1->verificarCorreo($idCalendarioNew,$fecha,$correo);
                
                //COMPRUEBO QUE NO EXISTA MAS DE UNA RESERVA CON ESA FECHA 
                if($verificarCorreo[0]->correo > 1){
                //ya existe una reserva con ese correo, cancelar la reserva
                $cancelarReserva = $gestion->cancelarReserva($id);
                
                //BUSCO EL ID DEL USUARIO OPERADOR
                $buscoIdUsuarioServicio = $gestion->usuarioOperadorCash($idUsuarioServicio);
                $temIdOp = $buscoIdUsuarioServicio[0]->id_usuario_operador;
                    
                //BUSCO EL ID DEL USUARIO
                $buscoIdUsuario = $gestion->usuarioCash($temIdOp);
                $idUser = $buscoIdUsuario[0]->id_usuario; 

                $infoReserva2 = $gestion->usuarioCash($temIdOp);
                $idUsuarioOperador = $buscoIdUsuario[0]->id_usuario_op;

                //SI EL USUARIO ESTA LOGUEADO PERO VIENE DE LA PARTE PUBLICA
                //COMPROBAR QUE EL USUARIO SERVICIO DEL CALENDARIO PERTENEZCA 
                // AL USUARIO SERVCIO DEL OPERADOR
                //BUSCO EL ID DEL Catalogo
                $idUsuarioOperadorLogueado = session('operador_id');
                $infoReservaComprobar = $gestion->comprobarUsuarioLogueado($idUsuarioServicio,$idUsuarioOperadorLogueado);
                $user = $auth->user();
                if (empty($infoReservaComprobar)) {
                    $partePublica = true;
                    return view('public_page.front.cancelarReservaCash', compact('user','partePublica','idUsuarioServicio'))->render();
                }else{         
                    $partePublica = false;
                    $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                    return view('public_page.front.cancelarReservaCash', compact('user','partePublica','idCatalogo','idUsuarioServicio'))->render();
                }       
            }else{
                //reserva nueva    
                $verificoPagoConsumido = $gestion->getConsumidoCash($id);
                if(empty($verificoPagoConsumido)){
                    //SI CONSUMIDO ES 1 ME REDIRIGE A LA PAGINA DE ERROR
                    return view('public_page.front.confirmacionErrorCash');
                }elseif($verificoPagoConsumido[0]->consumido == 0){

                    $updateReserva = $gestion->updateConsumidoReservaCash($id);
                    $infoPago = $gestion->infoPagosCash($id);
                    $estadoReserva = $infoPago[0]->estado_pago;

                    if($estadoReserva == "Pendiente"){
                        //BUSCO EL ID DEL CALENDARIO
                        $idCalendario = $infoReservas[0]->calendar_id;
                        $user = $auth->user();

                        if(empty($user)) {
                               // EL VOLVER ES A LA PARTE PUBLICA                    
                               // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                               $updateReserva = $gestion->updateStatusReservaCash($infoReservas[0]->id,1);

                               //BUSCO EL ID DEL USUARIO OPERADOR
                               $infoUsuarioOperador = $gestion->usuarioOperadorCash($idUsuarioServicio);

                               $idUsuarioPeradorPublica = $infoUsuarioOperador[0]->id_usuario_operador;

                               //OBTENGO LA INFORMACION DEL USUARIO OPERADOR
                               $infoReserva2 = $gestion->usuarioCash($idUsuarioPeradorPublica);

                               $statusReserva = 0;
                               $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                               return view('public_page.front.confirmacionCashPublica', compact('infoPago','infoReservas','user','infoReserva2','idUsuarioServicio'))->render();

                        }else{

                            // VOLVER A LA PARTE ADMIN
                            //BUSCO EL ID DEL USUARIO OPERADOR
                            $buscoIdUsuarioServicio = $gestion->usuarioOperadorCash($idUsuarioServicio);
                            $temIdOp = $buscoIdUsuarioServicio[0]->id_usuario_operador;

                            $buscoIdUsuario = $gestion->usuarioCash($temIdOp);
                            $idUser = $buscoIdUsuario[0]->id_usuario; 

                            $infoReserva2 = $buscoIdUsuario;

                            $idUsuarioOperador = $infoReserva2[0]->id_usuario_op;

                           //SI EL USUARIO ESTA LOGUEADO PERO VIENE DE LA PARTE PUBLICA
                           //COMPROBAR QUE EL USUARIO SERVICIO DEL CALENDARIO PERTENEZCA 
                           // AL USUARIO SERVCIO DEL OPERADOR
                           //BUSCO EL ID DEL Catalogo
                           $idUsuarioOperadorLogueado = session('operador_id');
                           $infoReservaComprobar = $gestion->comprobarUsuarioLogueado($idUsuarioServicio,$idUsuarioOperadorLogueado);
                           
                           if (empty($infoReservaComprobar)) {
                               // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                               $updateReserva = $gestion->updateStatusReservaCash($infoReservas[0]->id,2);
                               $statusReserva = 0;
                               $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                               $partePublica = true;
                               return view('public_page.front.confirmacionCashPublica', compact('infoPago','infoReservas','user','partePublica','infoReserva2','idUsuarioServicio'))->render();
                           }else{
                                // ACTUALIZO EL ESTADO Y EL TIPO DE USUARIO DE LA RESERVA
                                $updateReserva = $gestion->updateStatusReservaCash($infoReservas[0]->id,3);
                                $statusReserva = 1;
                                $this->dispatch(new ReservacionMail($infoReservas,$infoPago,$infoReserva2,$statusReserva)); 
                                $idCatalogo = $infoReservaComprobar[0]->id_catalogo_servicio;
                                $partePublica = false;
                                return view('public_page.front.confirmacionCash', compact('infoPago','infoReservas','user','partePublica','idCatalogo','idUsuarioServicio','infoReserva2'));
                           }
                        }
                    }
               }else{
                    return view('public_page.front.confirmacionErrorCash');
               }                
            }                
        }
    }
  





}
