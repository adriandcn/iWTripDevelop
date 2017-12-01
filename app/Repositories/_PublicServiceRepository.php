<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Satisfechos_Usuario_Servicio;
use App\Models\Review_Usuario_Servicio;
use App\Models\Usuario_Servicio;
use Carbon\Carbon;

class PublicServiceRepository extends BaseRepository {
    /**
     * The Role instance.
     *
     * @var App\Models\Usuario Servicios
     */

    /**
     * Create a new ServiciosOperadorRepository instance.
     *
     * @param  App\Models\UserServicios $userservicios

     * @return void
     */
    protected $satisfechos;
    protected $usuario_servicio;
    protected $review;

    public function __construct() {
        $this->satisfechos = new Satisfechos_Usuario_Servicio();
        $this->usuario_servicio = new Usuario_Servicio();
        $this->review = new Review_Usuario_Servicio();
    }

//Entrega el arreglo de los servicios más visitados por provincia
    public function getHijosAtraccion($id_atraccion) {

        $visitados = DB::table('usuario_servicios')
                        ->where('usuario_servicios.estado_servicio', '=', '1')
                        ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                        ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                        ->select('usuario_servicios.id')
                        ->orderBy('num_visitas', 'desc')
                        ->orderBy('prioridad', 'desc')
                        ->take(10)->get();




        if ($visitados != null) {
            $array = array();
            foreach ($visitados as $visitado) {


                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }


            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->get();
        } else {
            $imagenesF = DB::table('images')
                            ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                            ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                            ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                            ->where('estado_fotografia', '=', '1')
                            ->where('estado_fotografia', '=', '1')
                            ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                            ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                            ->orderBy('id_auxiliar', 'desc')
                            ->take(10)->get();
        }

        return $imagenesF;
    }
    
       //Obtiene los usuarios servicios para sitemap
    public function getSitemapUsuariosServicio() {



        $sitemapServicios = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio_usuario', '=',1)
                ->where('usuario_servicios.estado_servicio', '=',1)
                  ->select("usuario_servicios.*")
                ->get();
        return $sitemapServicios;
    }

    public function storeNew($inputs) {
        $review = new $this->review;
        $review->calificacion = trim($inputs['calificacion']);
        $review->nombre_reviewer = trim($inputs['nombre_reviewer']);
        $review->email_reviewer = trim($inputs['email_reviewer']);
        $review->ip_reviewer = trim($inputs['ip_reviewer']);
        $review->estado_review = '0';
        $review->id_usuario_servicio = trim($inputs['id_usuario_servicio']);
        $review->id_tipo_review = trim($inputs['id_tipo_review']);
        $review->confirmation_rev_code = $inputs['confirmation_rev_code'];
        $this->save($review);
        return $review;
    }

    
    
    
    
    //Obtiene otros trips excepto el que se muestra
    public function getotherTrips($id) {

        $moreTrips = DB::table('usuario_servicios')
                ->where('id_catalogo_servicio', '=', 11)
                ->where('id', '!=', $id)
                ->where('estado_servicio', '=', 1)
                ->where('estado_servicio_usuario', '=', 1)
                
                ->select('usuario_servicios.*')
                ->get();


        return $moreTrips;
    }
    
    
        //*************************************************************************//
    //                          NUEVAS FUNCIONES                               //  
    //*************************************************************************//
    
    public function getErrores() {

        $errores = DB::table('errores')->get();
        return $errores;
    }
    
      public function guardarError($id_usuario_servicio, $id_error, $ip, $dispositivo){
        $fecha = date("Y-m-d h:i:s");
        $nuevoReportado = DB::table('reportados')->insert(['id_usuario_servicio' => $id_usuario_servicio, 
                                                            'tipo_error' => $id_error, 'estado' => 1,
                                                             'ip_envio_error' => $ip, 'dispositivo' => $dispositivo,   
                                                            'created_at' => $fecha, 'updated_at' => $fecha ]);
        return $nuevoReportado;
    }

    public function guardarErrorContacto($id_usuario_servicio, $id_error,$nombre, $email,$telefono,$ip, $dispositivo){
        $fecha = date("Y-m-d h:i:s");
        $nuevoReportado1 = DB::table('reportados')->insert(['id_usuario_servicio' => $id_usuario_servicio, 
                                                            'tipo_error' => $id_error, 'estado' => 1,
                                                            'email' => $email, 'nombre' => $nombre,
                                                            'telefono' => $telefono,
                                                            'ip_envio_error' => $ip, 'dispositivo' => $dispositivo,     
                                                            'created_at' => $fecha, 'updated_at' => $fecha ]);
        return $nuevoReportado1;
    }
    
        public function guardarContactos($nombre, $apellido, $correo, $mensaje){
        $fecha = date("Y-m-d h:i:s");
        $nuevoContactanos = DB::table('contactanos')->insert(['correo_cliente' => $correo, 
                                                            'estado_atendido' => 0, 'nombre_cliente' => $nombre,
                                                            'apellido_cliente' => $apellido, 'mensaje' => $mensaje,
                                                            'created_at' => $fecha, 'updated_at' => $fecha ]);
        return $nuevoContactanos;
    }

public function getInfoAgrupamiento($id) {

        $agrupamiento = DB::table('booking_abcalendar_agrupamiento')->where('id', '=', $id)->get();
        return $agrupamiento;
    }

    public function getCalendariosAgrupamiento($id,$id_usuario_servicio) {

            $calendarInfo = DB::table('booking_abcalendar_calendars')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('booking_abcalendar_calendars.* , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->where('booking_abcalendar_calendars.id_usuario_servicio','=',$id_usuario_servicio)
                         ->where('booking_abcalendar_calendars.id_agrupamiento','=',$id)
                         ->get();

        
        return $calendarInfo;
    } 

    //Despliega los 3 primeros lugares para comer en la ruta
    public function getTripToDo($id_atraccion, $idCatalogo) {

         

        $provincias = DB::table('usuario_servicios')
                ->join('servicio_establecimiento_usuario', 'id_usuario_servicio', '=', 'usuario_servicios.id')
                ->join('catalogo_servicio_establecimiento', 'servicio_establecimiento_usuario.id_servicio_est', '=', 'catalogo_servicio_establecimiento.id')
                ->distinct()->select('catalogo_servicio_establecimiento.nombre_servicio_est')
                ->where('servicio_establecimiento_usuario.id_usuario_servicio', '=', $id_atraccion)
                //->where('estado_servicio', '=', 1)
                ->where('estado_servicio_usuario', '=', 1)
                ->where('estado_servicio_est', '=', 1)
                ->get();

        //Obtiene las provincias que cruza el itinerario
        if ($provincias != null) {

            $array = array();
            $arrayservicio = array();
            $aleatorias= array();

            foreach ($provincias as $provincia) {

                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.nombre', '=', $provincia->nombre_servicio_est)
                        ->where('ubicacion_geografica.idUbicacionGeograficaPadre', '=', 1)
                                ->select('ubicacion_geografica.*')->first();

                $array[] = $ubicGeo;
            }

            if(count($array)<=5)
            $aleatorias=array_rand($array,count($array));
            else
                $aleatorias=array_rand($array,5);
            
              foreach ($aleatorias as $provincial) {
        //print_r($array[$provincial]->id."--");
                  if(isset($array[$provincial]->id)){
                     $Servicios = DB::table('usuario_servicios')
                         ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                            ->where('estado_servicio_usuario', '=', '1')
                            //->where('estado_servicio', '=', '1')
                             ->where('usuario_servicios.id_provincia', '=', $array[$provincial]->id)
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $idCatalogo)
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.prioridad')
                            ->orderBy('usuario_servicios.num_visitas')
                            ->first();
                     $arrayservicio[] = $Servicios;
                  }
                  
            
            
            }
            //print_r($arrayservicio);
            
            
            $arrayServ = array();
            if ($arrayservicio != null) {
                 foreach ($arrayservicio as $servicio) {
                   //  print_r($servicio->id." -- ");
            if($servicio!=null){
                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                        ->where('id_auxiliar', '=', $servicio->id)
                        ->where('estado_fotografia', '=', '1')
                        ->select('images.*','usuario_servicios.*','ubicacion_geografica.nombre as ubicacion')
                        ->orderBy('usuario_servicios.prioridad')
                        ->orderBy('usuario_servicios.num_visitas')
                        ->orderBy('id_auxiliar', 'desc')
                        ->first();
                $arrayServ[] = $imagenes;
}
                 }
                return $arrayServ;
            }
        } else {

            return null;
        }

    }
    
    
    //Entrega el arreglo de los servicios más visitados por provincia
    public function getVisitadosProvincia($id_provincia) {

        $visitados = DB::table('usuario_servicios')
                        ->where('usuario_servicios.estado_servicio', '=', '1')
                        ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                        ->where('usuario_servicios.id_provincia', '=', $id_provincia)
                        ->select('usuario_servicios.id')
                        ->orderBy('num_visitas', 'desc')
                        ->orderBy('prioridad', 'desc')
                        ->take(10)->get();




        if ($visitados != null) {
            $array = array();
            foreach ($visitados as $visitado) {


                $imagenes = DB::table('images')
                                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                                ->where('id_usuario_servicio', '=', $visitado->id)
                                ->where('estado_fotografia', '=', '1')
                                ->select('images.id')
                                ->orderBy('id_auxiliar', 'desc')
                                ->take(2)->get();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen->id;
                    }
                }
            }






            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->get();
        } else {
            $imagenesF = DB::table('images')
                            ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                            ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                            ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                            ->where('estado_fotografia', '=', '1')
                            ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                            ->orderBy('id_auxiliar', 'desc')
                            ->take(10)->get();
        }
        return $imagenesF;
    }

    //Entrega el detalle geografico de la atraccion
    public function getUbicacionDet($id_ubicacion) {


        $ubicacion = DB::table('ubicacion_geografica')
                ->where('id', '=', $id_ubicacion)
                ->get();
        return $ubicacion;
    }

    
    
    //Entrega el arreglo de los servicios con imagenes para los Trips
    public function getDetailsServiciosAtraccionTrips($catalogo_servicios, $page_now, $page_stoped, $pagination) {

        $orderkey = "precio_desde";
        $ordervalue = "asc";


        $catalogo = null;
        if ($catalogo_servicios != null) {
            
            $array = array();
            foreach ($catalogo_servicios as $visitado) {
                $catalogo = $visitado->id_catalogo_servicio;

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('usuario_servicios.estado_servicio', '=', '1')
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }
            if ($page_now != null) {

                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    //->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    //->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('usuario_servicios.estado_servicio', '=', '1')
                   // ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv',  'usuario_servicios.*', 'images.*'))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
        } else {
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    //->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    //->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->where('usuario_servicios.estado_servicio', '=', '1')
                    //->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv',  'usuario_servicios.*', 'images.*'))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
        }

        return $imagenesF;
    }
    
    
    //Despliega los trips cerca de una atraccion
    public function getTripList($id_atraccion, $idCatalogo) {


        
        $atraccion = DB::table('usuario_servicios')
                ->where('id', '=', $id_atraccion)
                ->where('estado_servicio', '=', '1')
                ->where('estado_servicio_usuario', '=', 1)
                ->select('usuario_servicios.*')
                ->first();

        
          $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', $atraccion->id_provincia)
                                ->select('ubicacion_geografica.*')->first();

        
//        $trips = DB::table('usuario_servicios')
//                ->join('servicio_establecimiento_usuario', 'id_usuario_servicio', '=', 'usuario_servicios.id')
//                ->join('catalogo_servicio_establecimiento', 'servicio_establecimiento_usuario.id_servicio_est', '=', 'catalogo_servicio_establecimiento.id')
//                ->select('usuario_servicios.*')
//                ->where('catalogo_servicio_establecimiento.nombre_servicio_est', '=', $ubicGeo->nombre)
//                ->where('estado_servicio', '=', 1)
//                ->where('catalogo_servicio_establecimiento.id_catalogo_servicio', '=', 11)
//                ->where('estado_servicio_usuario', '=', 1)
//                ->where('estado_servicio_est', '=', 1)
//                ->get();

     
    
        $trips = DB::table('usuario_servicios')
                ->join('servicio_establecimiento_usuario', 'id_usuario_servicio', '=', 'usuario_servicios.id')
                ->join('catalogo_servicio_establecimiento', 'servicio_establecimiento_usuario.id_servicio_est', '=', 'catalogo_servicio_establecimiento.id')
                ->select('usuario_servicios.*')
                ->where('estado_servicio', '=', 1)
                ->where('estado_servicio_usuario', '=', 1)
                ->where('estado_servicio_est', '=', 1)
                

                
                   ->where(function($query) use ($ubicGeo){        
         $query->where('catalogo_servicio_establecimiento.id_catalogo_servicio', '=', 11)
                         ->where('catalogo_servicio_establecimiento.nombre_servicio_est', '=', $ubicGeo->nombre);
         })
                
            ->Orwhere(function($query) use ($ubicGeo){        
         $query->where('catalogo_servicio_establecimiento.id_catalogo_servicio', '=', 3)
                         ->where('catalogo_servicio_establecimiento.nombre_servicio_est', '=', 'Tours en '.$ubicGeo->nombre);
         })
                ->get();
          
          
            return $trips;

        
    }
    
     
       //Obtiene los operadores que viajan a esas provincias
    public function getOperadores($id_provincia) {


            $nombreProvincia = DB::table('ubicacion_geografica')
                        ->where('ubicacion_geografica.id', '=', $id_provincia)
                        ->select('ubicacion_geografica.nombre')->first();

        if(isset($nombreProvincia))
        {
        
        $servicios = DB::table('catalogo_servicios')
                        ->join('usuario_servicios', 'id_catalogo_servicios', '=', 'usuario_servicios.id_catalogo_servicio')
                        ->join('catalogo_servicio_establecimiento', 'catalogo_servicio_establecimiento.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('usuario_servicios.id_catalogo_servicio', '=', 3)        
                         ->where('catalogo_servicio_establecimiento.nombre_servicio_est', '=','Tours en '.$nombreProvincia->nombre)        
                        ->where('usuario_servicios.estado_servicio_usuario', '=', 1)
                        ->where('usuario_servicios.estado_servicio', '=', 1)
                ->where('usuario_servicios.id_provincia', '<>', 0)
                        ->select('usuario_servicios.*','catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'catalogo_servicios.nombre_servicio_eng')
                        ->distinct()->get();

        
        return $servicios;}
        else
            return null;
    }
    
    //Obtiene los trips que pasan por esa provincia
    public function getTrips($id_provincia) {


            $nombreProvincia = DB::table('ubicacion_geografica')
                        ->where('ubicacion_geografica.id', '=', $id_provincia)
                        ->select('ubicacion_geografica.nombre')->first();

        if(isset($nombreProvincia)){
        
        $servicios = DB::table('catalogo_servicios')
                        ->join('usuario_servicios', 'id_catalogo_servicios', '=', 'usuario_servicios.id_catalogo_servicio')
                        ->join('catalogo_servicio_establecimiento', 'catalogo_servicio_establecimiento.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('usuario_servicios.id_catalogo_servicio', '=', 11)        
                         ->where('catalogo_servicio_establecimiento.nombre_servicio_est', '=', $nombreProvincia->nombre)        
                        ->where('usuario_servicios.estado_servicio_usuario', '=', 1)
                        ->where('usuario_servicios.estado_servicio', '=', 1)
                ->where('usuario_servicios.id_provincia', '<>', 0)
                        ->select('usuario_servicios.*','catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'catalogo_servicios.nombre_servicio_eng')
                        ->distinct()->get();

        
        return $servicios;
    }
    else
        return null;
    }
    
//Entrega el arreglo de los servicios más visitados por provincia
    public function getProvinciaIntern($id_provincia, $id_atraccion, $canton, $parroquia, $page_now, $page_stoped) {

        $arrayAtraccion = array();
        if ($parroquia == 0) {
            $parroquia = 1;
        }

        if ($canton == 0) {
            $canton = 1;
        }



        $img_Atraccion = $this->getHijosAtraccion($id_atraccion);
        //verifica que no se repitan las atracciones hijas
        if ($img_Atraccion != null) {
            $arrayAtraccion = array_pluck($img_Atraccion, 'id_usuario_servicio');
        }



        $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_provincia', '=', $id_provincia)
                ->whereIn('id_catalogo_servicio', array(4, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->whereNotIn('usuario_servicios.id', $arrayAtraccion)
                ->whereNotIn('usuario_servicios.id_canton', array($canton))
                ->whereNotIn('usuario_servicios.id_parroquia', array($parroquia))
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();



        if ($visitados != null) {
            $array = array();

            foreach ($visitados as $visitado) {

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->whereNotIn('images.id_usuario_servicio', $arrayAtraccion)
                        ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->orderBy('usuario_servicios.prioridad', 'desc')
                        ->orderBy('usuario_servicios.num_visitas', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }

            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('id_catalogo_fotografia', '=', '1')
                    ->whereNotIn('images.id', $arrayAtraccion)
                    ->whereNotIn('usuario_servicios.id_canton', array($canton))
                    ->whereNotIn('usuario_servicios.id_parroquia', array($parroquia))
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
        } else {
            $imagenesF = null;
        }
        return $imagenesF;
    }

    //Obtiene las fotografias de inspiracion
    public function getInspiration($take, $pagination) {





        $inspiration = null;

        if (session('locale') == 'es') {
            $inspiration = DB::table('usuario_servicios')
                            ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])//codigo del catalogo inspiration
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('servicio_establecimiento_usuario.id_servicio_est', '=', '69')//español
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.created_at', 'desc')
                            ->take($take)->get();
        } else {
            $inspiration = DB::table('usuario_servicios')
                            ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('servicio_establecimiento_usuario.id_servicio_est', '=', '68')//ingles
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.created_at', 'desc')
                            ->take($take)->get();
        }


        if (isset($inspiration) && $inspiration != null) {
            $array = array();

            foreach ($inspiration as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null) {
                    $array[] = $imagenes->id;
                }
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'usuario_servicios.id as id_usuario_serviciox')
                    ->orderBy('usuario_servicios.id_padre', 'asc')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->orderBy('usuario_servicios.created_at', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }
    
    
     //*************************************************************************//
    //                 DETALLES PROMOCIONES Y EVENTOSS                         //  
    //*************************************************************************//
    public function getInfoPromo($id) {

        $promoInfo = DB::table('promocion_usuario_servicio')->where('id', '=', $id)->get();
        return $promoInfo;
    }
    
    public function getInfoEvento($id) {

        $eventoInfo = DB::table('eventos_usuario_servicios')->where('id', '=', $id)->get();
        return $eventoInfo;
    }

    public function getNombreUsuarioServicio($id) {

        //$nombreUsuarioServ = DB::table('usuario_servicios')->where('id', '=', $id)->select('nombre_servicio')->get();
        $nombreUsuarioServ = DB::table('usuario_servicios')->where('id', '=', $id)->get();
        
        return $nombreUsuarioServ;
    }

    
       public function updateErrorRevisado($id,$ipUser,$fecha,$usuario){
        
        $updateDataError = DB::table('reportados')
                            ->where('id',$id)
                            ->update(['estado' => 0, 'usuario_revision' => $usuario, 'ip_revision' => $ipUser, 'fecha_revision' => $fecha]); 
        return $updateDataError;
    }

    
    public function getNombreUsuarioServicioEvento($id) {

        $nombreUsuarioServ = DB::table('usuario_servicios')->where('id', '=', $id)->select('nombre_servicio')->get();
        
        return $nombreUsuarioServ;
    } 

    //Entrega el arreglo de los servicios más visitados por provincia canton para la parte interna
    public function getCantonIntern($id_canton, $id_atraccion, $parroquia, $page_now, $page_stoped) {

        $atraccion=$this->getAtraccionDetails($id_atraccion);
        $arrayAtraccion = array();

        if ($parroquia == 0) {
            $parroquia = 1;
        }

        $img_Atraccion = $this->getHijosAtraccion($id_atraccion);
        //verifica que no se repitan las atracciones hijas
        if ($img_Atraccion != null) {
            $arrayAtraccion = array_pluck($img_Atraccion, 'id_usuario_servicio');
        }



     if($atraccion ==null)
        {

        $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_canton', '=', $id_canton)
                ->whereIn('id_catalogo_servicio', array(4, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->whereNotIn('usuario_servicios.id', $arrayAtraccion)
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();

        }
        else
        {
            $catalogo=$atraccion->id_catalogo_servicio;
            $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_canton', '=', $id_canton)
                ->whereIn('id_catalogo_servicio', array($catalogo, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->whereNotIn('usuario_servicios.id', $arrayAtraccion)
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();
            
        }



        if ($visitados != null) {
            $array = array();

            foreach ($visitados as $visitado) {

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->whereNotIn('images.id_usuario_servicio', $arrayAtraccion)
                        ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->orderBy('usuario_servicios.prioridad', 'desc')
                        ->orderBy('usuario_servicios.num_visitas', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }

            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('id_catalogo_fotografia', '=', '1')
                    ->whereNotIn('images.id', $arrayAtraccion)
                    ->where('usuario_servicios.id_parroquia', '<>', $parroquia)
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
        } else {
            $imagenesF = null;
        }
        return $imagenesF;
    }

    //Entrega el arreglo de los servicios más visitados por provincia
    public function getParroquiaIntern($id_parroquia, $id_atraccion) {

        $arrayAtraccion = array();
        $img_Atraccion = $this->getHijosAtraccion($id_atraccion);
        if ($img_Atraccion != null) {
            foreach ($arrayAtraccion as $imagen) {
                $arrayAtraccion[] = $imagen->id;
            }
        }

        $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_parroquia', '=', $id_parroquia)
                ->whereIn('id_catalogo_servicio', array(4, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();



        if ($visitados != null) {
            $array = array();

            foreach ($visitados as $visitado) {

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->whereNotIn('images.id', $arrayAtraccion)
                        ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->orderBy('usuario_servicios.prioridad', 'desc')
                        ->orderBy('usuario_servicios.num_visitas', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }

            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_parroquia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('id_catalogo_fotografia', '=', '1')
                    ->whereNotIn('images.id', $arrayAtraccion)
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
        } else {
            $imagenesF = null;
        }
        return $imagenesF;
    }

    //Entrega el arreglo de los catalogos según la localización padre
    public function getBusquedaInicialCatalogoPadre($catalogo, $ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }

        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        } else {


            $eventos = DB::table('usuario_servicios')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();

            $eventosP = DB::table('usuario_servicios')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            foreach ($eventosP as $toK) {
                $imagenesx = DB::table('images')
                        ->where('images.id_auxiliar', '=', $toK->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenesx != null)
                    $array1[] = $imagenesx->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }






            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $array)
                    ->whereNotIn('images.id', $array1)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);





            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los catalogos según la localización
    public function getBusquedaInicialCatalogo($catalogo, $ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }

        if ($ubicGeo == null) {
            if($catalogo==4)
            {
                $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            
                        ->whereIn('usuario_servicios.id_catalogo_servicio', array(4,6,9,10))
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
            ->take($take)->get();
                
            }
            else{
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
            ->take($take)->get();}
        } else {


            $tipoUbicacion = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', $ubicGeo->id)
                            ->select('ubicacion_geografica.*')->first();



            $arrayUbicaciones = array();
            $arrayUbicaciones[] = $ubicGeo->id;
            $idNivelPadre = $tipoUbicacion->idUbicacionGeograficaPadre;

            //si es parroquia valida canton sube un nivel     
            if ($idNivelPadre != 0) {

                $arrayUbicaciones[] = $idNivelPadre;
                $tipoUbicacion2 = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', $idNivelPadre)
                                ->select('ubicacion_geografica.*')->first();
                $idNivelPadre2 = $tipoUbicacion2->idUbicacionGeograficaPadre;
            }
            if (isset($idNivelPadre2)) {
                if ($idNivelPadre2 != 0) {

                    $arrayUbicaciones[] = $idNivelPadre2;
                }
            }

if($catalogo==4)
{
    $eventos = DB::table('usuario_servicios')
                            ->where(function($query) use ($arrayUbicaciones) {
                                $query->orWhereIn('usuario_servicios.id_parroquia', $arrayUbicaciones)
                                ->orWhereIn('usuario_servicios.id_provincia', $arrayUbicaciones)
                                ->orWhereIn('usuario_servicios.id_canton', $arrayUbicaciones);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', array(4,6,9,10))
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
    
}
else
{
            $eventos = DB::table('usuario_servicios')
                            ->where(function($query) use ($arrayUbicaciones) {
                                $query->orWhereIn('usuario_servicios.id_parroquia', $arrayUbicaciones)
                                ->orWhereIn('usuario_servicios.id_provincia', $arrayUbicaciones)
                                ->orWhereIn('usuario_servicios.id_canton', $arrayUbicaciones);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
}
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $resulte = array_diff($array, $array1);



            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    //->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $resulte)
                    //->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    //->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->select('usuario_servicios.id as id_usr_serv', 'usuario_servicios.*', 'images.*','ubicacion_geografica.nombre as geografica')
                    ->groupby('usuario_servicios.id')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);





            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los catalogos según la localización
    public function getBusquedaInicialCatalogoFiltros($catalogo, $ubicacion, $filtros, $precio_min, $precio_max, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }

        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->join('catalogo_servicio_establecimiento', 'catalogo_servicio_establecimiento.id', '=', 'servicio_establecimiento_usuario.id_servicio_est')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('servicio_establecimiento_usuario.estado_servicio_est_us', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->whereIn('catalogo_servicio_establecimiento.id', $filtros)
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        } else {
            $eventos = DB::table('usuario_servicios')
                            ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->join('catalogo_servicio_establecimiento', 'catalogo_servicio_establecimiento.id', '=', 'servicio_establecimiento_usuario.id_servicio_est')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('servicio_establecimiento_usuario.estado_servicio_est_us', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('usuario_servicios.precio_desde', '>=', $precio_min)
                            ->where('usuario_servicios.precio_hasta', '<=', $precio_max)
                            ->whereIn('catalogo_servicio_establecimiento.id', $filtros)
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $resulte = array_diff($array, $array1);



            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $resulte)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->get();





            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsDepProvince($ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */

$dt = Carbon::now();
        if ($ubicacion != "") {



            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        if ($ubicGeo == null) {
            
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('eventos_usuario_servicios.fecha_hasta', '>=',$dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        } else {


            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.fecha_hasta', '>=', $dt)
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            $allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $resulte = array_diff($array, $array1);
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                    ->whereIn('images.id', $resulte)
                    ->whereNotIn('images.id', $allCity)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'eventos_usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);


            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsIndepProvince($ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('usuario_servicios.fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        } else {


            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }



        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            $allCity = $this->getEventsIndepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $resulte = array_diff($array, $array1);
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $resulte)
                    ->whereNotIn('images.id', $allCity)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);


            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización que son dependientes de un servicio
    public function getPromoDepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */

$dt = Carbon::now();
        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }


        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('promocion_usuario_servicio.estado_promocion', '=', '1')
                            ->where('promocion_usuario_servicio.fecha_hasta', '>=', $dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->select('promocion_usuario_servicio.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if (isset($eventos) && $eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '2')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'promocion_usuario_servicio.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización que son dependientes de un servicio
    public function getEventsDepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */

$dt = Carbon::now();
        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo->id == 1) {
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('fecha_hasta', '>=', $dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($ubicGeo != null && $ubicGeo->id != 1) {
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('fecha_hasta', '>=', $dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if (isset($eventos) && $eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'usuario_servicios.id as id_usuario_serviciox', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'eventos_usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getAtraccionesByCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }

        ///Si la $ubicacion es null
        else {
            return null;
        }




        if ($ubicGeo->id == 1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [4])
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($ubicGeo != null && $ubicGeo->id != 1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [4])
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }


        if (isset($eventos) && $eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'usuario_servicios.id as id_usuario_serviciox')
                    ->orderBy('usuario_servicios.id_padre', 'asc')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->orderByRaw("RAND()")
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsIndepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }

        ///Si la $ubicacion es null
        else {
            return null;
        }


        if ($ubicGeo->id == 1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($ubicGeo != null && $ubicGeo->id != 1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }


        if (isset($eventos) && $eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'usuario_servicios.id as id_usuario_serviciox', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización para la pantalla interna
    public function getPromoIntern($ubicacion) {

$dt = Carbon::now();
        $array = array();
        $array = array_pluck($ubicacion, 'id_usuario_servicio');

        $promo = DB::table('promocion_usuario_servicio')
                ->whereIn('promocion_usuario_servicio.id_usuario_servicio', $array)
                ->where('fecha_hasta', '>=',$dt)
                ->where('promocion_usuario_servicio.estado_promocion', '=', '1')
                ->select('promocion_usuario_servicio.id')
                ->take(10)
                ->get();


        if ($promo != null) {
            $array = array();

            foreach ($promo as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '2')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '2')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'promocion_usuario_servicio.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->get();

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización para la pantalla interna
    public function getEventIntern($ubicacion) {

$dt = Carbon::now();
        $array = array();

        foreach ($ubicacion as $ub) {
            $array[] = $ub->id_usuario_servicio;
        }

        $eventos = DB::table('eventos_usuario_servicios')
                         ->join('usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                        ->whereIn('eventos_usuario_servicios.id_usuario_servicio', $array)
                        ->where('fecha_hasta', '>=', $dt)
                        ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                         ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                        ->select('eventos_usuario_servicios.id')
                        ->orderBy('eventos_usuario_servicios.id_usuario_servicio', 'desc')
                        ->take(10)->get();

        if ($eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('eventos_usuario_servicios as ev', 'ev.id', '=', 'images.id_auxiliar')
                    ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '4')
                    ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                    ->select('images.*', 'usuario_servicios.*', 'eventos_usuario_servicios.*')
                    ->get();

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsDepCityAll($ubicacion, $take) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */
$dt = Carbon::now();

        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {


            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('fecha_hasta', '>=', $dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($eventos != null) {
            $array = array();


            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            return $array;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsIndepCityAll($ubicacion, $take) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();

            if (is_null($ubicGeo)) {
                $ubicGeo = DB::table('ubicacion_geografica')
                                ->where('ubicacion_geografica.id', '=', '207')
                                ->select('ubicacion_geografica.*')->first();
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->where(function($query) use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($eventos != null) {
            $array = array();


            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            return $array;
        }
        return null;
    }

//Entrega el arreglo de los servicios más visitados
    public function getUsuario_serv($ubicacion) {

        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();

            if ($ubicGeo == null) {

                $visitados = DB::table('usuario_servicios')
                                ->where('usuario_servicios.estado_servicio', '=', '1')
                                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                ->select('usuario_servicios.id')
                                ->orderBy('num_visitas', 'desc')
                                ->take(10)->get();
            } else {

//foreach ($ubicGeo as $unique) {

                $visitados = DB::table('usuario_servicios')
                                ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
                                ->where('usuario_servicios.estado_servicio', '=', '1')
                                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                ->select('usuario_servicios.id')
                                ->orderBy('num_visitas', 'desc')
                                ->take(10)->get();


//}

                if ($visitados == null || count($visitados < 10)) {

//foreach ($ubicGeo as $unique) {

                    $visitados = DB::table('usuario_servicios')
                                    ->where('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                    ->where('usuario_servicios.estado_servicio', '=', '1')
                                    ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                    ->select('usuario_servicios.id')
                                    ->orderBy('num_visitas', 'desc')
                                    ->take(10)->get();

// }
                }
            }
        } else {

            $visitados = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take(10)->get();
        }

        if ($visitados != null) {
            $array = array();
            $array = array_pluck($visitados, 'id');
            //$array = array();
            //foreach ($visitados as $visitado) {
            //  $array[] = $visitado->id;
            //}



            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('id_usuario_servicio', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
                    ->get();
        }
        return $imagenes;
    }

    public function updateCodeReview($code) {
        $review = new $this->review;
        $review1 = $review::where('confirmation_rev_code', $code);
        $review1->update(['review_verificado' => '1']);

        $review1->update(['seen' => '1']);
        $review1->update(['estado_review' => '1']);
        $review1->update(['updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
    }

    public function getRevCode($code) {
        $review = new $this->review;
        $review1 = $review::where('confirmation_rev_code', $code)
                ->select('id_usuario_servicio')
                ->first();

        return $review1;
    }

    //Motor de busqueda
    public function getSearchTotal($term) {



       $query = DB::table('searchengine')
                ->whereRaw("match(search) against ('" . $term . "'  in boolean mode)")
                ->select(array('searchengine.id_usuario_servicio', 'searchengine.tipo_busqueda', DB::raw("match (search) against ('" . $term . "')as rank")))
                ->orderBy('rank', 'DESC')
                ->get();

        return $query;
    }
    
    
    
    
       //Obtiene las top n eventos para el home
    public function getTopEvents($take) {
        
        $dt = Carbon::now();
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->join('ubicacion_geografica', 'ubicacion_geografica.id', '=', 'usuario_servicios.id_provincia')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('eventos_usuario_servicios.fecha_hasta', '>=', $dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
            
            
        


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            
      

            
            $imagenes2 = DB::table('images')
                    ->join('eventos_usuario_servicios', 'images.id_auxiliar', '=', 'eventos_usuario_servicios.id')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                   ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                   
                  ->join('ubicacion_geografica', 'ubicacion_geografica.id', '=', 'usuario_servicios.id_provincia')
                   ->whereIn('images.id', $array)
            ->where('eventos_usuario_servicios.fecha_hasta', '>=', $dt)
                   ->where('estado_fotografia', '=', '1')
                  ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                  ->select('usuario_servicios.*', 'images.*', 'eventos_usuario_servicios.*','eventos_usuario_servicios.id as id_evento','ubicacion_geografica.*')
                  //    ->select('images.*')
                    
                    ->paginate(4);

            
            //dd($imagenes2);
            return $imagenes2;
        }
        else
                 return null;
        
        
    }
    
            //Obtiene llos eventos de usuario servicio macro
    public function getTopEventsIndividual($n) {



         $dt = Carbon::now();


        
            $top = DB::table('usuario_servicios')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '10')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('fecha_fin', '>=', $dt)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->orderBy('usuario_servicios.prioridad', 'desc')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($n)->get();

            if ($top != null) {
                foreach ($top as $to) {
                    $imagenes = DB::table('images')
                            ->where('images.id_auxiliar', '=', $to->id)
                            ->where('estado_fotografia', '=', '1')
                            ->where('id_catalogo_fotografia', '=', '1')
                            ->select('images.id')
                            ->first();

                    if ($imagenes != null)
                        $final_top[] = $imagenes->id;
                }
          
        


        $imagenesF = DB::table('images')
                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->whereIn('images.id', $final_top)
                ->select('images.*', 'usuario_servicios.*', 'ubicacion_geografica.nombre', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region')
                ->orderBy('usuario_servicios.prioridad', 'desc')
                //->orderBy('usuario_servicios.num_visitas', 'desc')
                ->orderByRaw('RAND()')
                ->paginate(4);

        return $imagenesF;  }
        return null;
    }


    public function getDespliegueBusqueda($codigos, $pagination, $tipoBusqueda,$term) {

        /* Se despliegan las imagenes de los codigos encontrados en las busquedas
         *          */

        $array1 = array();

        foreach ($codigos as $to) {

            if ($to->tipo_busqueda == $tipoBusqueda)
                $array[] = $to->id_usuario_servicio;
            
        }


        $servicio = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->whereIn('usuario_servicios.id', $array)
                ->select('usuario_servicios.id')
               // ->orderBy('usuario_servicios.num_visitas', 'desc')
                ->get();

        if ($servicio != null) {
            $array = array();
            $array1 = array();

            foreach ($servicio as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array1[] = $imagenes->id;
            }

  
            $imagenes = DB::table('images')
                    ->join('searchengine','searchengine.id_usuario_servicio','=','images.id_usuario_servicio')
                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                ->whereRaw("match(search) against ('" . $term . "'  in boolean mode)")
                    ->where('estado_fotografia', '=', '1')
                    ->where('tipo_busqueda', '=', '4')
                    ->whereIn('images.id', $array1)
                //->select('images.*', 'usuario_servicios.id as id_usr_serv','usuario_servicios.*', 'ubicacion_geografica.nombre as nombreUbicacion', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region')
                   ->select (array('images.*', 'usuario_servicios.id as id_usr_serv','usuario_servicios.*', 'ubicacion_geografica.nombre as nombreUbicacion', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region','searchengine.id_usuario_servicio', 'searchengine.tipo_busqueda', DB::raw("match (search) against ('" . $term . "')as rank")))
                    ->distinct()
                   ->orderBy('usuario_servicios.num_visitas', 'DESC')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                      ->orderBy('rank', 'DESC')
                
                   
                
                //->orderByRaw('RAND()')
                ->paginate($pagination);


              

            return $imagenes;
        }
        return null;
    }

    
    
    
    
    
    //Entrega el arreglo de los catalogos según la localización
    public function getBusquedaInicialCatalogoIntern($id,$catalogo, $busquedaI, $page_now, $page_stoped, $take, $pagination) {

            $servicio = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id', '=', $id)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.*')
                            ->first();
        


             $arrayBusqueda = array();
      
            $arrayBusqueda[]=$busquedaI;
            


            $busqueda = DB::table('usuario_servicios')
                           
                            ->Where(function($query) use ($arrayBusqueda) {
                                $query->where('usuario_servicios.nombre_servicio','like', "%" . $arrayBusqueda[0])
                                ->orWhere('usuario_servicios.nombre_servicio', 'like', $arrayBusqueda[0] . "%")
                                ->orWhere('usuario_servicios.nombre_servicio', 'like', "%" . $arrayBusqueda[0] . "%")
                                        ->orWhere('usuario_servicios.detalle_servicio','like', "%" . $arrayBusqueda[0])
                                ->orWhere('usuario_servicios.detalle_servicio', 'like', $arrayBusqueda[0] . "%")
                                ->orWhere('usuario_servicios.detalle_servicio', 'like', "%" . $arrayBusqueda[0] . "%")
                                        ->orWhere('usuario_servicios.detalle_servicio_eng','like', "%" . $arrayBusqueda[0])
                                ->orWhere('usuario_servicios.detalle_servicio_eng', 'like', $arrayBusqueda[0] . "%")
                                ->orWhere('usuario_servicios.detalle_servicio_eng', 'like', "%" . $arrayBusqueda[0] . "%");
                                
                            })
                            
                            
                            
                     
                            ->where('usuario_servicios.id_provincia', $servicio->id_provincia)
                           
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            //->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        


        if ($busqueda != null) {
            $array = array();
            $array1 = array();

            foreach ($busqueda as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $resulte = array_diff($array, $array1);



            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    //->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $resulte)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select('usuario_servicios.id as id_usr_serv', 'usuario_servicios.*', 'images.*', 'ubicacion_geografica.nombre as nombre_ubicacion')
                    ->groupby('usuario_servicios.id')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);





            return $imagenes;
        }
        return null;
    }
    
    
    
    
    
    
    
    //Entrega el arreglo de los catalogos según la localización padre
    public function getBusquedaInicialCatalogoPadreIntern($id,$catalogo, $busquedaI, $page_now, $page_stoped, $take, $pagination) {

   


            $servicio = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id', '=', $id)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.*')
                            ->first();
        


            $arrayUbicaciones = array();
            $arrayUbicaciones[] = $servicio->id_canton;
            $arrayUbicaciones[] = $servicio->id_provincia;

             $arrayBusqueda = array();
      
            $arrayBusqueda[]=$busquedaI;
            


         $busqueda = DB::table('usuario_servicios')
                           
                            ->Where(function($query) use ($arrayBusqueda) {
                                $query->where('usuario_servicios.nombre_servicio','like', "%" . $arrayBusqueda[0])
                                ->orWhere('usuario_servicios.nombre_servicio', 'like', $arrayBusqueda[0] . "%")
                                ->orWhere('usuario_servicios.nombre_servicio', 'like', "%" . $arrayBusqueda[0] . "%")
                                        ->orWhere('usuario_servicios.detalle_servicio','like', "%" . $arrayBusqueda[0])
                                ->orWhere('usuario_servicios.detalle_servicio', 'like', $arrayBusqueda[0] . "%")
                                ->orWhere('usuario_servicios.detalle_servicio', 'like', "%" . $arrayBusqueda[0] . "%")
                                        ->orWhere('usuario_servicios.detalle_servicio_eng','like', "%" . $arrayBusqueda[0])
                                ->orWhere('usuario_servicios.detalle_servicio_eng', 'like', $arrayBusqueda[0] . "%")
                                ->orWhere('usuario_servicios.detalle_servicio_eng', 'like', "%" . $arrayBusqueda[0] . "%");
                                
                            })
                            
                            
                            
                     
                            ->where('usuario_servicios.id_provincia', $servicio->id_provincia)
                           
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            //->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        




        if ($busqueda != null) {
            $array = array();
            $array1 = array();

            foreach ($busqueda as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

//            foreach ($eventosP as $toK) {
//                $imagenesx = DB::table('images')
//                        ->where('images.id_auxiliar', '=', $toK->id)
//                        ->where('estado_fotografia', '=', '1')
//                        ->where('id_catalogo_fotografia', '=', '1')
//                        ->select('images.id')
//                        ->first();
//
//                if ($imagenesx != null)
//                    $array1[] = $imagenesx->id;
//            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }



  $resulte = array_diff($array, $array1);


                $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    //->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $resulte)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select('usuario_servicios.id as id_usr_serv', 'usuario_servicios.*', 'images.*', 'ubicacion_geografica.nombre as nombre_ubicacion')
                    ->groupby('usuario_servicios.id')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);






            return $imagenes;
        }
        return null;
    }
    
    
    
    
    
    
    //Obtiene las top n places de cada provincia
    public function getTopPlaces($n, $region) {

//array de las regiones del ecuador
//1: Costa
//2: Sierra
//3:Oriente
//4:Galapagos

        dd($n);
        $array = array($region);

        $final_top = array();

       // $provincias = DB::table('ubicacion_geografica')
         //       ->whereIn('id_region', $array)
           //     ->select('ubicacion_geografica.id')
             //   ->get();


        //foreach ($provincias as $provincia) {
            $top = DB::table('usuario_servicios')
                    //->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                           // ->where('usuario_servicios.id_provincia', '=', $provincia->id)
                            //->where('usuario_servicios.id_catalogo_servicio', '=', '4')
                    
                    ->whereIn('usuario_servicios.id_catalogo_servicio', array(4, 8,9))
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                    
                    
                    
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->orderBy('usuario_servicios.prioridad', 'desc')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->orderByRaw('RAND()')
                            ->take($n)->get();

            
            if ($top != null) {
                foreach ($top as $to) {
                    $imagenes = DB::table('images')
                            ->where('images.id_auxiliar', '=', $to->id)
                            ->where('estado_fotografia', '=', '1')
                            ->where('id_catalogo_fotografia', '=', '1')
                            ->select('images.id')
                            ->first();

                    if ($imagenes != null)
                        $final_top[] = $imagenes->id;
                }
            }
       // }


        $imagenesF = DB::table('images')
                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->whereIn('images.id', $final_top)
                ->select('images.*', 'usuario_servicios.*', 'ubicacion_geografica.nombre', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region')
                ->orderBy('usuario_servicios.prioridad', 'desc')
                //->orderBy('usuario_servicios.num_visitas', 'desc')
                ->orderByRaw('RAND()')
                ->paginate(4);

        return $imagenesF;
    }

//Obtiene las top imagenes de cada region
    public function getImageporRegion($id_region) {

//array de las regiones del ecuador
//1: Costa
//2: Sierra
//3:Oriente
//4:Galapagos



        $id_imagenes = array();
        $final_imagen = array();



        $provincias = DB::table('ubicacion_geografica')
                ->join('usuario_servicios', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->where('id_region', '=', $id_region)
                ->select('usuario_servicios.id')
                ->take(50)
                ->get();





        foreach ($provincias as $provincia) {
            $id_imagenes = DB::table('images')
                            ->where('id_auxiliar', '=', $provincia->id)
                            ->where('id_catalogo_fotografia', '=', 1)
                            ->where('estado_fotografia', '=', '1')
                            ->select('images.id')->take(1)->get();

            if ($id_imagenes != null) {
                foreach ($id_imagenes as $imagen) {

                    $final_imagen[] = $imagen->id;
                }
            }
        }

        $imagenes = DB::table('images')
                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_auxiliar')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*', 'usuario_servicios.nombre_servicio as nombre', 'usuario_servicios.id as id_geo', 'usuario_servicios.id as id_region', 'usuario_servicios.detalle_servicio as descripcion_esp', 'usuario_servicios.detalle_servicio as descripcion_eng')
                ->get();


        return $imagenes;
    }

//Entrega el detalle de la provincia
    public function getProvinciaDetails($id_provincia) {

        $provincias = DB::table('ubicacion_geografica')
                ->where('id', '=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->first();
        return $provincias;
    }

    private function save($objeto) {

        $objeto->save();
    }

    //Actualiza el numero de visitas
    public function saveVisita($nombre, $atraccion) {

        //Transformo el arreglo en un solo objeto

        $visitas = DB::table('usuario_servicios')
                ->where('usuario_servicios.id', '=', $atraccion)
                ->select('usuario_servicios.num_visitas')
                ->first();


        $operador = new $this->usuario_servicio;

        if($visitas!=null){
        $operadorData = $operador::where('id', $atraccion)
                ->update(['num_visitas' => $visitas->num_visitas + 1], ['fecha_ultima_visita' => \Carbon\Carbon::now()->toDateTimeString()]);


        return true;}
        else
            return false;
    }

    //Actualiza el estado de la promocion
    public function storeLikes($atraccion, $ip) {

        //Transformo el arreglo en un solo objeto


        $objeto = new $this->satisfechos;
        $objeto->id_usuario_servicio = $atraccion;
        $objeto->ip_turista = $ip;
        $objeto->id_user = 0;

        $objeto->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $objeto->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($objeto);
        return true;
    }

    //Entrega el detalle de los likes por ip y por id
    public function getlikesIp($id_atraccion, $ip) {

        $likes = DB::table('satisfechos_usuario_servicio')
                ->where('satisfechos_usuario_servicio.id_usuario_servicio', '=', $id_atraccion)
                ->where('satisfechos_usuario_servicio.ip_turista', '=', $ip)
                ->first();
        return $likes;
    }

    //Entrega el detalle de los likes por ip y por id
    public function getReviewsIpEmail($id_atraccion, $email) {

        $review = DB::table('reviews_usuario_servicio')
                ->where('id_usuario_servicio', '=', $id_atraccion)
                ->where('email_reviewer', '=', $email)
                ->where('estado_review', '=', "1")
                ->where('review_verificado', '=', "1")
                ->first();
        return $review;
    }

    //Actualiza el estado de la promocion
    public function storeUpdateLikes($inputs, $Promocion) {

        //Transformo el arreglo en un solo objeto
        foreach ($Promocion as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServPromo($inputs, 'estado_promocion');
        }



        return true;
    }

    //Entrega el detalle de los servicios
    public function getServicios($id_provincia) {


if($id_provincia!=null && $id_provincia!=0  ){
        $servicios = DB::table('catalogo_servicios')
                        ->join('usuario_servicios', 'id_catalogo_servicios', '=', 'usuario_servicios.id_catalogo_servicio')
                        ->where('usuario_servicios.id_canton', '=', $id_provincia)
                        ->where('usuario_servicios.estado_servicio_usuario', '=', 1)
                        ->where('usuario_servicios.estado_servicio', '=', 1)
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'catalogo_servicios.nombre_servicio_eng')
                        ->distinct()->get();




        return $servicios;
}
else
    return null;

    }

    //Entrega el precio minimo de los servicios id_catalogo
    public function getMinPrice($id_catalogo) {


        $servicios = DB::table('usuario_servicios')
                ->where('usuario_servicios.id_catalogo_servicio', '=', $id_catalogo)
                ->min('precio_desde');

        return $servicios;
    }

    //Entrega el precio max de los servicios id_catalogo
    public function getMaxPrice($id_catalogo) {


        $servicios = DB::table('usuario_servicios')
                ->where('usuario_servicios.id_catalogo_servicio', '=', $id_catalogo)
                ->max('precio_hasta');

        return $servicios;
    }

    //Entrega el detalle de los servicios
    public function getServiciosAll() {



        $servicios = DB::table('catalogo_servicios')
                        ->join('usuario_servicios', 'id_catalogo_servicios', '=', 'usuario_servicios.id_catalogo_servicio')
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'catalogo_servicios.nombre_servicio_eng')
                        ->distinct()->get();




        return $servicios;
    }

    //Entrega la cuenta de likes por usuario_servicio
    public function getlikes($id_atraccion) {


        $servicios = DB::table('satisfechos_usuario_servicio')
                ->select(array(DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                ->where('satisfechos_usuario_servicio.id_usuario_servicio', '=', $id_atraccion)
                ->groupby('satisfechos_usuario_servicio.id_usuario_servicio')
                ->first();


        return $servicios;
    }

    /**
     * Create a new review instance.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\Models\Review 
     */
    public function store($inputs, $confirmation_code = null) {
        $rev = new $this->review;

        if ($confirmation_code) {
            $rev->confirmation_rev_code = $confirmation_code;
        } else {
            $rev->review_verificado = 1;
        }

        $this->save($rev, $inputs);

        return $user;
    }

    /**
     * Save the User.
     *
     * @param  App\Models\User $user
     * @param  Array  $inputs
     * @return void
     */
    private function saveRev($rev, $inputs) {
        if (isset($inputs['seen'])) {
            $user->seen = $inputs['seen'] == 'true';
        } else {

            $user->username = $inputs['username'];
            $user->email = $inputs['email'];

            if (isset($inputs['role'])) {
                $user->role_id = $inputs['role'];
            } else {
                $role_user = $this->role->where('slug', 'user')->first();
                $user->role_id = $role_user->id;
            }
        }

        $user->save();
    }

    //Despliea todos lis tipos de revies para calificar
    public function getTiporeviews($id_atraccion) {

        $reviews = DB::table('tipo_reviews')
                ->join('usuario_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'tipo_reviews.catalogo_servicio')
                ->where('usuario_servicios.id', '=', $id_atraccion)
                ->where('tipo_estado', '=', "1")
                ->select('tipo_reviews.*')
                ->get();

        return $reviews;
    }

    //Entrega el detalle de los servicios
    public function getReviews($id_atraccion) {

        $chuncks = DB::table('tipo_reviews')
                ->join('usuario_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'tipo_reviews.catalogo_servicio')
                ->where('usuario_servicios.id', '=', $id_atraccion)
                ->where('tipo_reviews.tipo_estado', '=', "1")
                ->select(array(DB::raw('COUNT(tipo_reviews.id) as cantidad')))
                ->first();



        if ($chuncks == null)
            $division = 1;
        else
            $division = $chuncks->cantidad * 2;
        
        
         if($division==0)
        {
            
            $division=1;
        }

        $reviews = DB::table('reviews_usuario_servicio')
                ->join('tipo_reviews', 'reviews_usuario_servicio.id_tipo_review', '=', 'tipo_reviews.id')
                ->where('reviews_usuario_servicio.id_usuario_servicio', '=', $id_atraccion)
                ->where('reviews_usuario_servicio.estado_review', '=', "1")
                ->where('reviews_usuario_servicio.review_verificado', '=', "1")
                ->select('reviews_usuario_servicio.*', 'tipo_reviews.peso_review', 'tipo_reviews.tipo_review', 'tipo_reviews.tipo_review_eng')
                //->groupBy('nombre_reviewer')
                ->orderBy('created_at', 'desc')
                ->paginate($division);


        return $reviews;
    }

    //Entrega el detalle de la provincia
    public function getAtraccionDetails($id_atraccion) {


        $atraccion = DB::table('usuario_servicios')
                ->where('id', '=', $id_atraccion)
                ->select('usuario_servicios.*')
                ->first();
        return $atraccion;
    }

    //Entrega el detalle de la provincia
    public function getCatalogoDetail($id_catalogo) {


        $catalogo = DB::table('catalogo_servicios')
                ->where('id_catalogo_servicios', '=', $id_catalogo)
                ->select('catalogo_servicios.*')
                ->first();
        return $catalogo;
    }

//Entrega el arreglo de los servicios con imagenes
    public function getDetailsServiciosAtraccion($catalogo_servicios, $page_now, $page_stoped, $pagination) {

        $orderkey = "precio_desde";
        $ordervalue = "asc";


        $catalogo = null;
        if ($catalogo_servicios != null) {
            $array = array();
            foreach ($catalogo_servicios as $visitado) {
                $catalogo = $visitado->id_catalogo_servicio;

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_auxiliar', '=', $visitado->id)
                        ->where('estado_fotografia', '=', '1')
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }
            if ($page_now != null) {

                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }
            
            
if($catalogo==4){
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    
                    ->whereIn('usuario_servicios.id_catalogo_servicio', array(4,6,9,10))
                    ->select(array('usuario_servicios.id as id_usr_serv', 'ubicacion_geografica.nombre as nombre_ubicacion', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
}
else
{
         $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'ubicacion_geografica.nombre as nombre_ubicacion', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
    
}
        } else {
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'ubicacion_geografica.nombre as nombre_ubicacion', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
        }

        return $imagenesF;
    }

    //Entrega el detalle del catalogo por provincia
    public function getCatalogoDetailsProvincia($catalogo, $id_catalogo, $anterior) {



        $array = array();

        if ($anterior != null) {

            foreach ($anterior as $ant) {

                $array[] = $ant->id;
            }
        }
        if ($catalogo != null) {




            $servicioCatalogo = DB::table('usuario_servicios')
                    ->where('id_catalogo_servicio', '=', $id_catalogo)
                    ->whereNotIn('usuario_servicios.id', $array)
                    ->where('estado_servicio', '=', '1')
                    ->where('usuario_servicios.id_provincia', '=', $catalogo->id_provincia)
                    ->select('usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad')
                    ->orderBy('usuario_servicios.num_visitas')
                    ->get();
        } else {
            $servicioCatalogo = null;
        }


        return $servicioCatalogo;
    }

    public function getDetalleporPArroquia($idParroquia, $id_catalogo) {
        $servicioCatalogo = DB::table('usuario_servicios')
                ->where('id_catalogo_servicio', '=', $id_catalogo)
                ->where('estado_servicio', '=', '1')
                ->where('usuario_servicios.id_parroquia', '=', $idParroquia)
                ->select('usuario_servicios.*')
                ->orderBy('usuario_servicios.prioridad')
                ->orderBy('usuario_servicios.num_visitas')
                ->get();
        return $servicioCatalogo;
    }
    
    
       public function getDetalleporPArroquiaArrayCatalogo($idParroquia, $Array) {
        $servicioCatalogo = DB::table('usuario_servicios')
                
                ->whereIn('usuario_servicios.id_catalogo_servicio', $Array)
                ->where('estado_servicio', '=', '1')
                ->where('usuario_servicios.id_parroquia', '=', $idParroquia)
                ->select('usuario_servicios.*')
                ->orderBy('usuario_servicios.prioridad')
                ->orderBy('usuario_servicios.num_visitas')
                ->get();
        return $servicioCatalogo;
    }

    public function getDetalleporCanton($idCanton, $id_catalogo) {
        $servicioCatalogo = DB::table('usuario_servicios')
                ->where('id_catalogo_servicio', '=', $id_catalogo)
                ->where('estado_servicio', '=', '1')
                ->where('usuario_servicios.id_canton', '=', $idCanton)
                ->select('usuario_servicios.*')
                ->orderBy('usuario_servicios.prioridad')
                ->orderBy('usuario_servicios.num_visitas')
                ->get();
        return $servicioCatalogo;
    }
    
    
    public function getDetalleporCantonArrayCatalogo($idCanton, $Array) {
        $servicioCatalogo = DB::table('usuario_servicios')
                 ->whereIn('usuario_servicios.id_catalogo_servicio', $Array)
                ->where('estado_servicio', '=', '1')
                ->where('usuario_servicios.id_canton', '=', $idCanton)
                ->select('usuario_servicios.*')
                ->orderBy('usuario_servicios.prioridad')
                ->orderBy('usuario_servicios.num_visitas')
                ->get();
        return $servicioCatalogo;
    }


    public function getDetalleporProvinciaArrayProvincia($idProvincia, $Array) {
        $servicioCatalogo = DB::table('usuario_servicios')
                ->whereIn('usuario_servicios.id_catalogo_servicio', $Array)
                ->where('estado_servicio', '=', '1')
                ->where('usuario_servicios.id_provincia', '=', $idProvincia)
                ->select('usuario_servicios.*')
                ->orderBy('usuario_servicios.prioridad')
                ->orderBy('usuario_servicios.num_visitas')
                ->get();
        return $servicioCatalogo;
    }

    //Entrega el detalle del catalogo
    public function getCatalogoDetails($id_atraccion, $id_catalogo) {


        $atraccion = DB::table('usuario_servicios')
                ->where('id', '=', $id_atraccion)
                ->where('estado_servicio', '=', '1')
                ->select('usuario_servicios.*')
                ->first();

if($id_catalogo==4)
{
   $arreglo = array(4,6,9,10); 
}
else
{
    $arreglo = array($id_catalogo); 
}
        


        if ($atraccion != null) {

            if ($atraccion->id_parroquia != 0) {

                $servicioCatalogo = $this->getDetalleporPArroquiaArrayCatalogo($atraccion->id_parroquia, $arreglo);

                if ($servicioCatalogo == null) {

                    $servicioCatalogo = $this->getDetalleporCantonArrayCatalogo($atraccion->id_canton, $arreglo);
                    if ($servicioCatalogo == null) {
                        $servicioCatalogo = $this->getDetalleporProvinciaArrayProvincia($atraccion->id_provincia, $arreglo);
                    }
                }
            } else if ($atraccion->id_parroquia == 0 && $atraccion->id_canton != 0) {
                $servicioCatalogo = $this->getDetalleporCantonArrayCatalogo($atraccion->id_canton, $arreglo);
                if ($servicioCatalogo == null) {
                    $servicioCatalogo = $this->getDetalleporProvinciaArrayProvincia($atraccion->id_provincia,$arreglo);
                }
            } else if ($atraccion->id_parroquia == 0 && $atraccion->id_canton == 0 && $atraccion->id_provincia != 0) {

                $servicioCatalogo = $this->getDetalleporProvinciaArrayProvincia($atraccion->id_provincia, $arreglo);
            } else {
                $servicioCatalogo = DB::table('usuario_servicios')
                        
                        ->whereIn('id_catalogo_servicio', $arreglo)
                        ->where('estado_servicio', '=', '1')
                        ->select('usuario_servicios.*')
                        ->orderBy('usuario_servicios.prioridad')
                        ->orderBy('usuario_servicios.num_visitas')
                        ->get();
            }
        } else {
            $servicioCatalogo = DB::table('usuario_servicios')
                    ->whereIn('id_catalogo_servicio', $arreglo)
                    ->where('estado_servicio', '=', '1')
                    ->select('usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad')
                    ->orderBy('usuario_servicios.num_visitas')
                    ->get();
        }


        return $servicioCatalogo;
    }

    //Entrega el detalle geografico de la atraccion
    public function getUbicacionAtraccion($id_ubicacion) {


        $ubicacion = DB::table('ubicacion_geografica')
                ->where('id', '=', $id_ubicacion)
                ->select('ubicacion_geografica.nombre')
                ->first();
        return $ubicacion;
    }

//Entrega el detalle de la region
    public function getRegionDetails($id_region) {

        $provincias = DB::table('ubicacion_geografica')
                ->join('usuario_servicios', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->where('id_region', '=', $id_region)
                ->select('ubicacion_geografica.*')
                ->get();
        return $provincias;
    }

//Entrega las ciudades de la provincia
    public function getCiudades($id_provincia) {

        $ciudades = DB::table('ubicacion_geografica')
                ->where('idUbicacionGeograficaPadre', '=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->get();
        return $ciudades;
    }

    //Entrega los sitios o atracciones por provincia
    public function getExplorerbyCatalogo($id_catalogo) {

        $explore = DB::table('catalogo_servicios')
                ->join('catalogo_servicio_establecimiento', 'catalogo_servicios.id_catalogo_servicios', '=', 'catalogo_servicio_establecimiento.id_catalogo_servicio')
                ->distinct()->select('catalogo_servicio_establecimiento.nombre_servicio_est', 'catalogo_servicio_establecimiento.url_image', 'catalogo_servicio_establecimiento.id')
                ->where('catalogo_servicio_establecimiento.id_catalogo_servicio', '=', $id_catalogo)
                ->get();
        return $explore;
    }

//Entrega los sitios o atracciones por provincia
    public function getExplorer($id_provincia) {

        $explore = DB::table('usuario_servicios')
                ->join('servicio_establecimiento_usuario', 'id_usuario_servicio', '=', 'usuario_servicios.id')
                ->join('catalogo_servicio_establecimiento', 'servicio_establecimiento_usuario.id_servicio_est', '=', 'catalogo_servicio_establecimiento.id')
                ->distinct()->select('catalogo_servicio_establecimiento.nombre_servicio_est', 'catalogo_servicio_establecimiento.url_image')
                ->where('servicio_establecimiento_usuario.id_usuario_servicio', '=', $id_provincia)
                ->where('estado_servicio', '=', 1)
                ->where('estado_servicio_usuario', '=', 1)
                ->where('estado_servicio_est', '=', 1)
                ->get();
        return $explore;
    }

//Entrega los eventos de la provincia
    public function getEventosProvincia($id_provincia) {

        $ciudades = DB::table('ubicacion_geografica')
                ->where('idUbicacionGeograficaPadre', '=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->get();
        return $ciudades;
    }

//Entrega el arreglo de Imagenes por provincia
    public function getImageporProvincia($id_provincia) {

        $imagenes = DB::table('images')
                ->where('id_auxiliar', '=', $id_provincia)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*')
                ->get();


        return $imagenes;
    }

    //Entrega el arreglo de Imagenes por atraccion
    public function getAtraccionImages($id) {

        $imagenes = DB::table('images')
                ->where('id_auxiliar', '=', $id)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '1')
                ->select('images.*')
                ->get();


        return $imagenes;
    }

    public function getEventosImagenAtraccion($eventos) {

        $final_imagen = array();
        foreach ($eventos as $evento) {

            $imagenes = DB::table('images')
                    ->where('id_auxiliar', '=', $evento->id)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '4')
                    ->first();

            if ($imagenes != null) {


                $final_imagen[] = $imagenes->id;
            }
        }
        $imagenesf = DB::table('images')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '4')
                ->select('images.*')
                ->get();


        return $imagenesf;
    }

    public function getPromotionsImagenAtraccion($promos) {

        $final_imagen = array();
        foreach ($promos as $promo) {

            $imagenes = DB::table('images')
                    ->where('id_auxiliar', '=', $promo->id)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '2')
                    ->first();

            if ($imagenes != null) {


                $final_imagen[] = $imagenes->id;
            }
        }
        $imagenesf = DB::table('images')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '2')
                ->select('images.*')
                ->get();


        return $imagenesf;
    }

    public function getItinerImagenAtraccion($itinerarios) {

        $final_imagen = array();
        foreach ($itinerarios as $itiner) {

            $imagenes = DB::table('images')
                    ->where('id_auxiliar', '=', $itiner->id)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '3')
                    ->first();

            if ($imagenes != null) {


                $final_imagen[] = $imagenes->id;
            }
        }
        $imagenesf = DB::table('images')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '3')
                ->select('images.*')
                ->get();


        return $imagenesf;
    }

    public function getEventosAtraccion($id) {

        $dt = Carbon::now();

        $ids = array();

        $atraccion = DB::table('usuario_servicios')
                ->where('id', '=', $id)
                ->where('estado_servicio', '=', '1')
                ->where('estado_servicio_usuario', '=', 1)
                ->select('usuario_servicios.*')
                ->first();

        if ($atraccion != null) {


            $atraccionC = DB::table('usuario_servicios')
                    ->where('id_canton', '=', $atraccion->id_canton)
                    ->where('estado_servicio', '=', '1')
                    ->where('estado_servicio_usuario', '=', 1)
                    ->select('usuario_servicios.*')
                    ->get();
            if ($atraccionC != null) {
                foreach ($atraccionC as $atr) {

                    $ids[] = $atr->id;
                }
            }
        } else {
            $ids[] = $id;
        }



        $events = DB::table('eventos_usuario_servicios')
                ->whereIn('id_usuario_servicio', $ids)
                //->where('id_usuario_servicio', '=', $id)
                ->where('estado_evento', '=', '1')

                //->where('', '<=', "'" . Carbon::now()  . "'")
                // ->where('fecha_desde','>=',$dt)
                ->where('fecha_hasta', '>=', $dt)
                ->select('eventos_usuario_servicios.*')
                ->get();



        return $events;
    }

    public function getPromoAtraccion($id) {

        $dt = Carbon::now();
        $events = DB::table('promocion_usuario_servicio')
                ->where('id_usuario_servicio', '=', $id)
                ->where('estado_promocion', '=', '1')
                  ->where('fecha_hasta', '>=', $dt)
                ->select('promocion_usuario_servicio.*')
                ->get();


        return $events;
    }

    public function getItinerAtraccion($id) {

        $itiner = DB::table('itinerarios_usuario_servicios')
                ->where('id_usuario_servicio', '=', $id)
                ->where('estado_itinerario', '=', '1')
                ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                ->select('itinerarios_usuario_servicios.*')
                ->get();


        return $itiner;
    }
    
    
    
    
    
    
    //*************************************************************************//
    //                 PAGO CON TARJETA DE CREDITO                             //  
    //*************************************************************************//
        public function getReserva($id) {

            $reservaInfo = DB::table('booking_abcalendar_reservations')
                         ->where('id', '=', $id)
                         ->get();
      
            return $reservaInfo;
        }  

        public function getReservaToken($token) {
            $reservaInfo = DB::table('booking_abcalendar_reservations')
                         ->where('token_consulta', '=', $token)
                         ->get();
      
            return $reservaInfo;
        }
        
        public function getPagosToken($token) {
            $pagoInfo = DB::table('pagos')
                         ->where('token', '=', $token)
                         ->get();
      
            return $pagoInfo;
        }         
        
        public function getPagoInfo($id,$token) {
            $pagoInfo = DB::table('pagos')
                         ->where('reservacion_id', '=', $id)
                         ->where('token', '=', trim($token))
                         ->get();
      
            return $pagoInfo;
        }
        
        public function getInfoPagoReserva($id) {
            $pagoInfo = DB::table('pagos')
                         ->where('reservacion_id', '=', $id)
                         ->get();
            return $pagoInfo;
        }

        public function getUsuarioServicio($id) {
            $calendarInfo = DB::table('booking_abcalendar_calendars')
                         ->where('id', '=', $id)
                         ->get();
      
            return $calendarInfo;
        }         
        
            
        

        public function getTokenInfo($token) {
            $tokenInfo = DB::table('tokens')
                         ->where('uuid', '=', trim($token))
                         ->get();
      
            return $tokenInfo;
        }
        
        public function getCalendarInfo($id) {
            $calendarInfo = DB::table('booking_abcalendar_calendars')
                                 ->where('id', '=', $id)
                                 ->get(); 
      
            return $calendarInfo;
        }  
        
        public function getIdUsuarioOperador($id) {
            $usuServInfo = DB::table('usuario_servicios')
                                 ->select(DB::raw('id_usuario_operador'))
                                 ->where('id', '=', $id)
                                 ->get();   
      
            return $usuServInfo;
        }

        public function getInfoUsuarioOperador($id) {
            $usuOpe =  DB::table('usuario_operadores')
                            ->where('id_usuario_op', '=', $id)
                            ->get();  
      
            return $usuOpe;
        } 

        public function getIdCatalogo($idUsuarioServicio,$idUsuarioOperadorLogueado) {
            $idCatalogo =   DB::table('usuario_servicios')
                               ->select(DB::raw('id_catalogo_servicio'))
                               ->where('id', '=', $idUsuarioServicio)
                               ->where('id_usuario_operador', '=', $idUsuarioOperadorLogueado)
                               ->get();  
      
            return $idCatalogo;
        }         
        
        
                                   
        
        public function updateConsumidoReserva($id) {
            $estado = true;
            $updateReserva = DB::table('pagos')
                          ->where('id',$id)
                          ->update(['consumido' => $estado]);

             return $updateReserva;
        }
        
        
        public function updateConsumidoToken($id) {
            $estado = true;
            $updateToken = DB::table('tokens')
                          ->where('id',$id)
                          ->update(['consumido' => $estado]);

             return $updateToken;
        } 

        public function updateReserva($id,$tipo) {
            $estado = true;
            if($tipo == 1){
                $tipoUsuario = "public";
            }else{
                $tipoUsuario = "admin";
            }
            $estatusReserva = "Confirmed";
            $updateReserva = DB::table('booking_abcalendar_reservations')
                                    ->where('id',$id)
                                    ->update(['tipo_usuario'=>$tipoUsuario,'status'=>$estatusReserva]);

             return $updateReserva;
        }
        
        public function cancelarReserva($id) {
            $estatusReserva = "Cancelled";
            $updateReserva = DB::table('booking_abcalendar_reservations')
                                    ->where('id',$id)
                                    ->update(['status'=>$estatusReserva]);

             return $updateReserva;
        }

        public function updateStatusReservaTDC($id,$tipo) {
            if($tipo == 0){
                $estatusReserva = "Confirmed";
            }else{
                $estatusReserva = "Cancelled";
            }
            $updateReserva = DB::table('booking_abcalendar_reservations')
                                    ->where('id',$id)
                                    ->update(['status'=>$estatusReserva]);

             return $updateReserva;
        }
        

        public function updateStatusReservaCash($id,$tipo) {
            if($tipo == 1){
                $tipoUsuario = "public";
                $estatusReserva = "Pending";
            }elseif($tipo == 2){
                $tipoUsuario = "admin";
                $estatusReserva = "Pending";
            }elseif($tipo == 3){
                $tipoUsuario = "admin";
                $estatusReserva = "Confirmed";;
            }
            
            $updateReserva = DB::table('booking_abcalendar_reservations')
                                ->where('id',$id)
                                ->update(['tipo_usuario'=>$tipoUsuario,'status'=>$estatusReserva]);

             return $updateReserva;
        }        

        public function updateStatusPagoReservaTDC($id,$tipo) {
            $estado = true;
            if($tipo == 0){
                $estatusPago = "Confirmado";
            }else{
                $estatusPago = "Rechazado";
            }            
            $updatePago = DB::table('pagos')
                          ->where('reservacion_id',$id)
                          ->update(['consumido' => $estado,'estado_pago' => $estatusPago]);

             return $updatePago;
        }
        
        public function usuarioServicoCash($id) {
            $usuServCash = DB::table('booking_abcalendar_calendars')
                              ->select(DB::raw('id_usuario_servicio'))
                              ->where('id', '=', $id)->get();

             return $usuServCash;
        }
        
        public function usuarioOperadorCash($id) {
            $usuOpeCash = DB::table('usuario_servicios')
                         ->select(DB::raw('id_usuario_operador'))
                         ->where('id', '=', $id)
                         ->get();

             return $usuOpeCash;
        }   
        
        public function usuarioCash($id) {
            $usuarioCash = DB::table('usuario_operadores')
                         ->where('id_usuario_op', '=', $id)
                         ->get();

             return $usuarioCash;
        }         
        
        public function comprobarUsuarioLogueado($idUsuarioServicio,$idUsuarioOperadorLogueado) {
            $comprobar =  DB::table('usuario_servicios')
                             ->select(DB::raw('id_catalogo_servicio'))
                             ->where('id', '=', $idUsuarioServicio)
                            ->where('id_usuario_operador', '=', $idUsuarioOperadorLogueado)
                             ->get();  

             return $comprobar;
        }         
        

        public function infoPagoCash($id) {
            $usuarioCash = DB::table('usuario_operadores')
                         ->where('id_usuario_op', '=', $id)
                         ->get();

             return $usuarioCash;
        }

        public function infoPagosCash($id) {
            $usuarioCash =  DB::table('pagos')
                            ->where('reservacion_id', '=', $id)
                            ->get();

             return $usuarioCash;
        }        

        
        
        public function getConsumidoCash($idReserva) {
           $consumido = DB::table('pagos')
                             ->select(DB::raw('consumido'))
                             ->where('reservacion_id', '=', $idReserva)
                             ->get();
            return $consumido;
        } 

        public function updateConsumidoReservaCash($idReserva) {
           $estado = true;
           $updateReserva = DB::table('pagos')
                         ->where('reservacion_id',$idReserva)
                         ->update(['consumido' => $estado]);

            return $updateReserva;

        }        
 

}
