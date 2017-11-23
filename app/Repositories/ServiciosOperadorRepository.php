<?php

namespace App\Repositories;


use App\Models\Booking\Especialidad;
use App\Models\Booking\VerificacionBooking;

use App\Models\Usuario_Servicio;
use App\Models\Promocion_Usuario_Servicio;
use App\Models\Catalogo_Dificultad;
use App\Models\Detalle_Itinerario;
use App\Models\Itinerario_Usuario_Servicio;
use App\Models\Usuario_Operador;
use App\Models\Eventos_usuario_Servicio;
use App\Models\Invitaciones_Amigos;
use App\Models\UbicacionGeografica;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\SearchEngine;
use App\Models\Control_dahsboard;

class ServiciosOperadorRepository extends BaseRepository {

    /**
     * The Role instance.
     *
     * @var App\Models\Usuario Servicios
     */
    protected $userservicios;

    /**
     * The Promocion_Usuario_Servicio instance.
     *
     * @var App\Models\Role
     */
    protected $promocion;
    protected $catalogo_dificultad;
    protected $image;
    protected $itinerarios_u;
    protected $detalle_itinerarios_u;
    protected $eventos;
    protected $operador;
    protected $invitar_amigo;
    protected $ubicacion_geografica;
    protected $search_engine;
    
        protected $especialidad_u;
    protected $booking_u;
    protected $control_u;
    

    /**
     * Create a new ServiciosOperadorRepository instance.
     *
     * @param  App\Models\UserServicios $userservicios

     * @return void
     */
    public function __construct(Usuario_Servicio $userservicios) {
        $this->model = $userservicios;
        $this->promocion = new Promocion_Usuario_Servicio();
        $this->image = new Image();
        $this->catalogo_dificultad = new Catalogo_Dificultad();
        $this->itinerarios_u = new Itinerario_Usuario_Servicio();
        $this->detalle_itinerarios_u = new Detalle_Itinerario();
        $this->eventos = new Eventos_usuario_Servicio();
        $this->operador = new Usuario_Operador();
        $this->invitar_amigo = new Invitaciones_Amigos();
        $this->ubicacion_geografica = new UbicacionGeografica();
        $this->search_engine = new SearchEngine();
        
         $this->especialidad_u = new Especialidad();
        $this->booking_u = new VerificacionBooking();
        $this->control_u = new Control_dahsboard();
       
    }

    /**
     * Save the User.
     *
     * @param  App\Models\UserServicio $user_servicios

     * @return void
     */
    private function save($user_servicios) {

        $user_servicios->save();
    }

    /**
     * Create a user.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\Models\User 
     */
    public function storeNew($inputs) {
        $user_servicios = new $this->model;
        $user_servicios->id_catalogo_servicio = trim($inputs['id_catalogo_servicio']);
        $user_servicios->id_usuario_operador = trim($inputs['id_usuario_op']);
        $user_servicios->estado_servicio = '1';
        $user_servicios->estado_servicio_usuario = '1';
        $this->save($user_servicios);
        return $user_servicios;
    }

    
      //**********************************************************//		
    //Entrega el arreglo de Imagenes por evento por operador    //
    //**********************************************************//
    public function getImageEventosOperador($id_evento) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id_evento)
                        ->where('id_catalogo_fotografia', '=', 4)
                        ->where('estado_fotografia', '=', 1)->get();
    }

  
    /**/
    
     //Entrega el arreglo de servicios hijos por usuario servicio
    public function getHijosUsuarioServicio($id_usuario_servicio) {
        $servicios = new $this->model;
        return $servicios::where('id_padre', '=', $id_usuario_servicio)->get();


        return $eventos::All();
    }
    
    
     //***************************************************************//
    public function erroresReportados(){
        
  $errores = DB::table('reportados')
                         ->select(DB::raw('id,id_usuario_servicio, (SELECT nombre_servicio FROM usuario_servicios '
                                 . 'WHERE id = id_usuario_servicio) as servicio,'
                                 . '(SELECT nombre_espanol from errores where id = tipo_error) as tipo, '
                                 . 'estado,email,nombre,telefono,ip_envio_error,dispositivo,created_at as fecha_creacion'))
                         ->where('estado','=','1')
                         ->orderBy('created_at', 'DESC')
                         ->get(); 
       
    return $errores;    
        
    }
    
     public function storeUpdateEstadoPromocion1($estado, $id) {

        $operador = new $this->promocion;
        $operadorData = $operador::where('id', $id)
                ->update(['estado_promocion' => $estado]);                
        
        return $operadorData;


    }
    
        public function storeUpdateEstadoEvento1($estado, $id) {

        $operador = new $this->eventos;
        $operadorData = $operador::where('id', $id)
                ->update(['estado_evento' => $estado]);                
        
        return $operadorData;


    }
    
        //Guarda las promociones por usuario_servicio
    public function storeSearchEngine($usuario_servicio,$search,$tipo_busqueda,$id_tipo) {

        $objeto = new $this->search_engine;
        $objeto->id_usuario_servicio = $usuario_servicio;
        $objeto->search = $search;
        $objeto->estado_search = 1;
        $objeto->tipo_busqueda = $tipo_busqueda;
        $objeto->id_tipo = $id_tipo;
        
        $objeto->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $objeto->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($objeto);
        return true;
    }
    
    
    

    public function storeNewItinerario($inputs) {

        $ItinerarioU = new $this->itinerarios_u;
        $ItinerarioU->id_usuario_servicio = trim($inputs['id_usuario_servicio']);
        $ItinerarioU->id_fotografia = 3;
        $ItinerarioU->descripcion_itinerario = trim($inputs['descripcion_itinerario']);
        $ItinerarioU->nombre_itinerario = trim($inputs['nombre_itinerario']);
        $ItinerarioU->id_catalogo_dificultad = $inputs['id_dificultad'];
        $ItinerarioU->estado_itinerario = 1;
        $ItinerarioU->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $ItinerarioU->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($ItinerarioU);
        return $ItinerarioU;
    }

 
    public function storeNewDetalleItinerario($inputs) {

        $ItinerarioU = new $this->detalle_itinerarios_u;


        $ItinerarioU->id_itinerario = $inputs['id_itinerario'];
        $ItinerarioU->lugar_punto = trim($inputs['lugar_punto']);
        $ItinerarioU->longitud_punto = $inputs['longitud_servicio'];
        $ItinerarioU->latitud_punto = $inputs['latitud_servicio'];
        $ItinerarioU->estado_punto = 1;
        $ItinerarioU->diahora_punto = $inputs['diahora_punto'];
        $ItinerarioU->incluye_punto = $inputs['incluye_punto'];
        $ItinerarioU->tags_punto = trim($inputs['tag']);
        $ItinerarioU->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $ItinerarioU->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($ItinerarioU);
        return $ItinerarioU;
    }

    public function storeNewInviarAmigo($inputs) {

        $ItinerarioU = new $this->invitar_amigo;


        $ItinerarioU->invitacion_de = trim($inputs['invitacion_de']);
        $ItinerarioU->invitacion_para = trim($inputs['invitacion_para']);
        $ItinerarioU->correo = trim($inputs['correo']);
        $ItinerarioU->estado_invitacion = 1;
        $ItinerarioU->ip_envio = "";
        if ((session('user_id') != null))
        {
            $ItinerarioU->id_usuario_invita = session('user_id');
            }


        $ItinerarioU->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $ItinerarioU->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($ItinerarioU);
        return $ItinerarioU;
    }

    public function storeUpdateEstado($inputs, $usuario_servicio) {

        //Transformo el arreglo en un solo objeto
        foreach ($usuario_servicio as $servicioBase) {
            $inputs['id_usuario_servicio'] = $servicioBase->id;
            $this->updateServ($inputs, 'estado_servicio_usuario');
        }



        return true;
    }

    public function storeUpdateEstadoItinerario($inputs, $Itinerario) {

        //Transformo el arreglo en un solo objeto
        foreach ($Itinerario as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServDetItiner($inputs, 'estado_punto');
        }



        return true;
    }

    public function storeUpdateEstadoItinerarioPrincipal($inputs, $Itinerario) {

        //Transformo el arreglo en un solo objeto
        foreach ($Itinerario as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServItiner($inputs, 'estado_itinerario');
        }



        return true;
    }

    //Actualiza el estado del evento
    public function storeUpdateEstadoEvento($inputs, $Evento) {

        //Transformo el arreglo en un solo objeto
        foreach ($Evento as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServEvent($inputs, 'estado_evento');
        }



        return true;
    }
    
    //Entrega el arreglo de Servicios por operador
    public function getServiciosidUsuario($id_usuario) {
        
         return DB::table('usuario_servicios')
                ->join('usuario_operadores', 'usuario_servicios.id_usuario_operador', '=', 'usuario_operadores.id_usuario_op')
                ->join('users', 'usuario_operadores.id_usuario', '=', 'users.id')
                ->where('users.id', $id_usuario)
                ->where('estado_servicio', '=', 1)
                ->get();

    }
    

    //Actualiza el estado de la promocion
    public function storeUpdateEstadoPromocion($inputs, $Promocion) {

        //Transformo el arreglo en un solo objeto
        foreach ($Promocion as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServPromo($inputs, 'estado_promocion');
        }



        return true;
    }

    /**
     * Create a user.
     *
     * @param  array  $inputs
     * @param  int    $usuario_servicio
     * @return App\Models\User 
     */
    public function storeUpdate($inputs, $usuario_servicio) {

        //Transformo el arreglo en un solo objeto
        foreach ($usuario_servicio as $servicioBase) {
            $inputs['id_usuario_servicio'] = $servicioBase->id;
            $this->updateServ($inputs, 'estado_servicio');
        }

        return true;
    }

    //actualiza los eventos
    public function storeUpdateEvento($inputs, $evento) {

        foreach ($evento as $servicioBase) {
            $pro = $this->eventos->find($servicioBase->id);

            //Transformo el arreglo en un solo objeto
            $inputs['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $inputs['longitud_evento'] = $inputs['longitud_servicio'];
            $inputs['latitud_evento'] = $inputs['latitud_servicio'];
            $pro->fill($inputs)->save();
        }

        return true;
    }

    //actualiza los itinerarios
    public function storeUpdateItinerario($inputs, $itiner) {

        foreach ($itiner as $servicioBase) {
            $pro = $this->itinerarios_u->find($servicioBase->id);

            //Transformo el arreglo en un solo objeto
            $inputs['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $inputs['id_catalogo_dificultad'] = $inputs['id_dificultad'];

            $pro->fill($inputs)->save();
        }

        return true;
    }

    public function storeUpdatePromocion($inputs, $promo) {

        foreach ($promo as $servicioBase) {
            $pro = $this->promocion->find($servicioBase->id);
            //Transformo el arreglo en un solo objeto
            //$inputs['id'] =  $promo->id;
            $inputs['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $pro->fill($inputs)->save();
        }

        return true;
    }

    
    
    
    /*
Actualizar tabla de busqueda 
     * $inputs: parametros de entrada
     * $objeto: la instancia del objeto encontrado
     * $tipo:1=Promocion
     *       2=Evento
     *       3=Itinerario
     *       4=Usuario Servicio
     * $id_tipo: id de la instancia a actualizar
     *      */
        public function storeUpdateSerchEngine( $objeto,$tipo,$id_tipo,$search) {

        foreach ($objeto as $servicioBase) {
            
            $operador = new $this->search_engine;
        $operadorData = $operador::where('id_tipo', $id_tipo)
                ->where('tipo_busqueda', '=', $tipo)
                ->update(['search' => $search]);
        }

        return true;
    }

    
    
    
    
    public function UpdateGeoLoc($inputs) {

        if (isset($inputs['id_provincia']))
            $id = $inputs['id_provincia'];
        if (isset($inputs['id_canton']))
            $id = $inputs['id_canton'];
        if (isset($inputs['id_parroquia']))
            $id = $inputs['id_parroquia'];
        
        $pro = $this->ubicacion_geografica->find($id);
        //Transformo el arreglo en un solo objeto
        $pro->fill($inputs)->save();


        return true;
    }

    public function storeUpdateDetalleItinerario($inputs, $det_iti) {

        foreach ($det_iti as $servicioBase) {
            $pro = $this->detalle_itinerarios_u->find($servicioBase->id);
            //Transformo el arreglo en un solo objeto
            $inputs['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();

            $inputs['longitud_punto'] = $inputs['longitud_servicio'];
            $inputs['latitud_punto'] = $inputs['latitud_servicio'];
            $inputs['tags_punto'] = $inputs['tag'];



            $pro->fill($inputs)->save();
        }

        return true;
    }

    public function updatePromo($promo) {
        $operador = new $this->promocion;
        $operadorData = $operador::where('id', $promo['id'])
                ->update([$campo => $input[$campo]]);
    }

    //Realiza la logica del update
    public function updateServDetItiner($input, $campo) {
        $operador = new $this->detalle_itinerarios_u;
        $operadorData = $operador::where('id', $input['id'])
                ->update([$campo => $input[$campo]]);
    }

    //Realiza la logica del update
    public function updateServItiner($input, $campo) {
        $operador = new $this->itinerarios_u;
        $operadorData = $operador::where('id', $input['id'])
                ->update([$campo => $input[$campo]]);
    }

    //Realiza la logica del update
    public function updateServPromo($input, $campo) {
        $operador = new $this->promocion;
        $operadorData = $operador::where('id', $input['id'])
                ->update([$campo => $input[$campo]]);
    }

    //Realiza la logica del update
    public function updateServEvent($input, $campo) {
        $operador = new $this->eventos;
        $operadorData = $operador::where('id', $input['id'])
                ->update([$campo => $input[$campo]]);
    }

    //Realiza la logica del update
    public function updateServ($input, $campo) {
        $operador = new $this->model;
        $operadorData = $operador::where('id', $input['id_usuario_servicio'])
                ->update([$campo => $input[$campo]]);
    }

//Entrega el arreglo de Servicios por operador
    public function getServiciosOperador($id_usuario_operador) {
        $user_servicios = new $this->model;
        return $user_servicios::where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)->get();
    }

    //Entrega el arreglo de Servicios por operador
    public function getProvincias() {
        $ubicacion = new $this->ubicacion_geografica;
        return $ubicacion::where('idUbicacionGeograficaPadre', '=', 1)->get();
    }

    public function getRecursivo($id_geo) {
        $ubicacion = new $this->ubicacion_geografica;
        return $ubicacion::where('idUbicacionGeograficaPadre', '=', $id_geo)->get();
    }

    public function getRecursivoDescription($id_geo) {
        $ubicacion = new $this->ubicacion_geografica;
        return $ubicacion::where('id', '=', $id_geo)->get();
    }

    //detalle itinersrioo
    public function getEstadoDetalleItiner($id_detalleItinerario) {
        $itiner = new $this->detalle_itinerarios_u;
        return $itiner::where('id', $id_detalleItinerario)->get();
    }

    //detalle itinersrioo
    public function getEstadoItiner($id_Itinerario) {
        $itiner = new $this->itinerarios_u;
        return $itiner::where('id', $id_Itinerario)->get();
    }

    //detalle estado promocion
    public function getEstadoPromocion($id_promocion) {
        $promo = new $this->promocion;
        return $promo::where('id', $id_promocion)->get();
    }

    //estado evento
    public function getEstadoEvento($id_promocion) {
        $promo = new $this->eventos;
        return $promo::where('id', $id_promocion)->get();
    }

    //Entrega el arreglo de promociones por operador
    public function getPromocionesOperador($id_promocion) {
        $promociones = new $this->promocion;
        return $promociones::where('id', $id_promocion)->get();
    }




    //Entrega el arreglo de itinerarios por usuario_servicio
    public function getItinerariosporUsuario($id_usuario_servicio) {
        $itiner = new $this->itinerarios_u;
        return $itiner::where('id_usuario_servicio', $id_usuario_servicio)->get();
    }

    //Entrega el arreglo de itinerarios por operador
    public function getItinerariosUsuario($id_itinerario) {
        $itiner = new $this->itinerarios_u;
        return $itiner::where('id', $id_itinerario)->get();
    }

    //Entrega el arreglo de itinerarios por operador
    public function getUsuario_serv($id) {
        $itiner = new $this->model;
        return $itiner::where('id', $id)->first();
    }

    //Entrega el arreglo de detalle itinerarios por id tinerario
    public function getItinerariosDetalle($id_itinerario) {
        $itiner = new $this->detalle_itinerarios_u;
        return $itiner::where('id_itinerario', $id_itinerario)->get();
    }

    //Entrega el arreglo de Servicios por operador
    public function getCatalogoDificultad() {
        $dif = new $this->catalogo_dificultad;
        return $dif::All();
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getImagePromocionesOperador($id_promocion) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id_promocion)
                        ->where('id_catalogo_fotografia', '=', 2)
                        ->where('estado_fotografia', '=', 1)->get();
    }
    
    //Entrega el arreglo de Imagenes por promocion por operador
    public function getGenericImagePromocionesOperador($tipo,$idtipo) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $idtipo)
                        ->where('id_catalogo_fotografia', '=', $tipo)
                        ->where('estado_fotografia', '=', 1)->get();
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getImageUbcacionGeografica($id, $tipo) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id)
                        ->where('id_catalogo_fotografia', '=', $tipo)
                        ->where('estado_fotografia', '=', 1)->get();
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getImageOperador($id_aux, $catalogo) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id_aux)
                        ->where('id_catalogo_fotografia', '=', $catalogo)
                        ->where('estado_fotografia', '=', 1)->get();
    }

    //Entrega el arreglo de Itinerarios por operador
    public function getItinerario($id_itinerario) {

        return DB::table('itinerarios_usuario_servicios')
                        ->where('id', '=', $id_itinerario)->get();
    }

    //Entrega el arreglo de Itinerarios por operador
    public function deleteItinerario($id_itinerario) {

        $pro = $this->detalle_itinerarios_u->find($id_itinerario);
        $pro->delete();
    }

    //Entrega el arreglo de eventos por operador
    public function getEvento($id_evento) {

        return DB::table('eventos_usuario_servicios')
                        ->where('id', '=', $id_evento)->get();
    }

    //Entrega el arreglo de Detalle Itinerarios por operador
    public function getDetalleItinerario($id_detalle_itinerario) {

        return DB::table('detalles_itinerario')
                        ->where('id', '=', $id_detalle_itinerario)->get();
    }

    //Entrega el arreglo de Itinerarios por id

    public function getPromocion($id_promocion) {

        return DB::table('promocion_usuario_servicio')
                        ->where('id', '=', $id_promocion)->get();
    }

    //Entrega el arreglo de Servicios por operador completo incluyendo los nuevos ingresados por la 
    //pantalla de +
    public function getServiciosOperadorUnicos($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->groupby('usuario_servicios.id_catalogo_servicio')->distinct()
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'usuario_servicios.id', 'usuario_servicios.observaciones', 'usuario_servicios.estado_servicio_usuario', 'usuario_servicios.id_usuario_operador')
                        ->get();
    }

    public function getServiciosOperadorAll($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->select('usuario_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'usuario_servicios.id', 'usuario_servicios.estado_servicio_usuario', 'usuario_servicios.id_usuario_operador')
                        ->get();
    }

    public function getEventosporId($id) {
        return DB::table('eventos_usuario_servicios')
                        ->where('id', $id)->get();
    }

    //entrega el registro que corresponde al usuario
    public function getServiciosOperadorporIdServicio($id_usuario_operador, $id_catalogo) {

        $user_servicio = Usuario_Servicio::where('id_usuario_operador', '=', $id_usuario_operador)
                        ->where('id_catalogo_servicio', '=', $id_catalogo)->get();
        return $user_servicio;
    }

    //entrega el registro que corresponde al id usuario servicio
    public function getServiciosOperadorporIdUsuarioServicio($id_usuario_servicio) {

        $user_servicio = Usuario_Servicio::where('id', '=', $id_usuario_servicio)->get();

        return $user_servicio;
    }

    public function getPermiso($id) {

        return DB::table('usuario_servicios')
                        ->join('usuario_operadores', 'usuario_servicios.id_usuario_operador', '=', 'usuario_operadores.id_usuario_op')
                        ->where('usuario_servicios.id', $id)
                        ->select('usuario_operadores.id_usuario_op', 'usuario_operadores.id_usuario')
                        ->first();
    }

    public function getPermisoPromocion($id) {

        return DB::table('usuario_servicios')
                        ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                        ->where('promocion_usuario_servicio.id', $id)
                        ->select('promocion_usuario_servicio.id_usuario_servicio')
                        ->first();
    }

    public function getPermisoEvento($id) {

        return DB::table('usuario_servicios')
                        ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                        ->where('eventos_usuario_servicios.id', $id)
                        ->select('eventos_usuario_servicios.id_usuario_servicio')
                        ->first();
    }

    public function getPermisoItinerario($id) {

        return DB::table('usuario_servicios')
                        ->join('itinerarios_usuario_servicios', 'usuario_servicios.id', '=', 'itinerarios_usuario_servicios.id_usuario_servicio')
                        ->where('itinerarios_usuario_servicios.id', $id)
                        ->select('itinerarios_usuario_servicios.id_usuario_servicio')
                        ->first();
    }
    
    
    
    
    /*Booking*/
    
    
    
    //**********************************************************************************//
    //              CODIGO PARA GUARADAR LAS NUEVAS ESPECIALIDADES                      //
    //**********************************************************************************//
        public function storeNewEspecialidad($inputs) {
            
        $EspecilaidadU = new $this->especialidad_u;
        $EspecilaidadU->id_usuario_servicio = trim($inputs['id_usuario_servicio']);
        $EspecilaidadU->id_catalogo_especialidad = trim($inputs['id_catalogo_especialidad']);
        $EspecilaidadU->nombre_especialidad = trim($inputs['nombre_especialidad']);
        $EspecilaidadU->descripcion_especialidad = trim($inputs['descripcion_especialidad']);
        $EspecilaidadU->activo = trim($inputs['activo']);
        $EspecilaidadU->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $EspecilaidadU->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($EspecilaidadU);
        return $EspecilaidadU;
    }

    //***************************************************************************//
    //          ACTUALIZAR EL ESTADO DE LA ESPECIALIDAD                          // 
    //***************************************************************************//
    public function storeUpdateEstadoEspecialidadPrincipal($inputs, $Especialidad) {
        //Transformo el arreglo en un solo objeto
        foreach ($Especialidad as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServEspe($inputs, 'activo');
        }
        return true;
    }

    
    //***************************************************************************//
    //          ACTUALIZAR EL ESTADO DEL CALENDARIO BOOKING                      // 
    //***************************************************************************//
    public function storeUpdateEstadoBookingCalendar($inputs, $campoActivoCalendarBooking) {
        //Transformo el arreglo en un solo objeto
        foreach ($campoActivoCalendarBooking as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServBooking($inputs, 'activo');
        }
        return true;
    }


    //************************************************************************//
    //                  ACTUALIZAR LA ESPECIALIDAD                            //
    //************************************************************************//
    public function storeUpdateEspecialidad($inputs, $itiner) {

        foreach ($itiner as $servicioBase) {
            $pro = $this->especialidad_u->find($servicioBase->id);

            //Transformo el arreglo en un solo objeto
            $inputs['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
            //$inputs['id_catalogo_dificultad'] = $inputs['id_dificultad'];

            $pro->fill($inputs)->save();
        }

        return true;
    }


    //Realiza la logica del update
    public function updateServEspe($input, $campo) {
        $operador = new $this->especialidad_u;
        $operadorData = $operador::where('id', $input['id'])
                ->update([$campo => $input[$campo]]);
    }
    
    //Realiza la logica del update
    public function updateServBooking($input, $campo) {
        $operadorData = DB::table('booking_abcalendar_calendars')->where('id', $input['id'])->update([$campo => $input[$campo]]);
        /*$operadorData = DB::table('booking_abcalendar_calendars')
                                ->where('id', $input['id'])
                                ->update([$campo => $input[$campo]]);*/
        /*$operadorData = $operador::where('id', $input['id'])
                ->update([$campo => $input[$campo]]);*/
    }

   //****************************************************//
    //           DETALLE ESPECIALIDAD                     //
    //****************************************************//
    public function getEstadoEspecialidad($id_Especialidad) {
        $itiner = new $this->especialidad_u;
        return $itiner::where('id', $id_Especialidad)->get();
    }
    
    //****************************************************//
    //   OBTENGO EL ESTADO DEL CALENDARIO BOOKING         //
    //****************************************************//
    public function getEstadoBookingCalendar($id_booking_calendar) {
        
        return DB::table('booking_abcalendar_calendars')->where('id', $id_booking_calendar)->get();
        
    }

    //**************************************************************************//
    //           ENTREGA EL ARREGLO DE LA ESPECIALIDAD DEL OPERADOR             //
    //**************************************************************************//
    public function getEspecialidadUsuario($id_especialidad) {
        $especialidad = new $this->especialidad_u;
        return $especialidad::where('id', $id_especialidad)->get();
    }
    
    //**************************************************************************//
    //           ENTREGA EL ARREGLO DE LA ESPECIALIDAD por Usuario Servicio    //
    //**************************************************************************//
    public function getEspecialidadporUsuario($id_usuario_servicio) {
        $especialidad = new $this->especialidad_u;
        return $especialidad::where('id_usuario_servicio', $id_usuario_servicio)->get();
    }
    
    //**************************************************************************//
    //           DEVUELVE EL ID DEL USUARIO DEL OPERADOR                        //
    //**************************************************************************//
    public function getIDUsuario($id) {
        
        return DB::table('usuario_operadores')
                        ->select('id_usuario')
                        ->where('id_usuario_op', $id)
                        ->distinct()
                        ->get();
    }
    
        //**************************************************************************//
    //           DEVUELVE EL ID DEL USUARIO DEL OPERADOR                        //
    //**************************************************************************//
    public function getInfoUser($id) {
        
        return DB::table('users')->select('id', 'email','password','username')->where('id', $id)->get();
    }
    
    //**************************************************************************//
    //     VERIFICAR SI EL USUARIO EXISTE EN LA TABLA USER BOOKING              //
    //**************************************************************************//
    public function getVerificarUsuario($id,$email) {
        
        return DB::table('booking_abcalendar_users')->where('email', $email)->count();
    }
    
    //**************************************************************************//
    //     INSERTAR EL USUARIO EN LA TABLA USER BOOKING                         //
    //**************************************************************************//
    public function ingresarUsuario($id,$email,$password,$username,$fecha) {
    
        return DB::table('booking_abcalendar_users')->insert(['id'=> $id, 'role_id' => '3', 'email' => $email, 
                                                              'password' => '','name' => $username,
                                                              'created' => $fecha, 'status' => 'T', 
                                                              'is_active' => 'T','ip'=> '::1']);
        
    }
    //**************************************************************************//
    //           DEVUELVE EL ID DEL USUARIO DEL OPERADOR                        //
    //**************************************************************************//
    public function guardarVerificarBooking($idUser,$id,$encriptado) {

        $bookingU = new $this->booking_u;
        $bookingU->id_usuario = trim($idUser);
        $bookingU->id_usuario_servicio = trim($id);
        $bookingU->consumido = false;
        $bookingU->uuid = trim($encriptado);

        $this->save($bookingU);
        return $bookingU;
    }

    
    
    //****************************************************//
    //   OBTENGO EL ULTIMO ID DE LA RESERVA CON CASH      //
    //****************************************************//
    public function getLastIdPagoCash() {
        
        $ultimoID = DB::table('booking_abcalendar_reservations')
                         ->select(DB::raw('MAX(id) as idReserva'))
                         ->where('payment_method', '=', 'cash')
                         ->get();
        
        return $ultimoID;
        
    }
    
       //****************************************************//
    //   Verifico si el correo ya reservo para esa fecha     //
    //****************************************************//
    public function verificarCorreo($idCalendario,$fecha,$correo) {
        
        $ultimoID = DB::table('booking_abcalendar_reservations')
                         ->select(DB::raw('COUNT(id) as correo'))
                         ->where('date_from', '=', $fecha)
                         ->where('c_email', '=', $correo)
                         ->where('calendar_id', '=', $idCalendario)
                         ->get();
        
        return $ultimoID;
        
    }

    
    
     //****************************************************//
    //   OBTENGO EL CONSUMIDO DE LA RESERVA CON CASH      //
    //****************************************************//
    public function getConsumidoCash($idReserva) {
        
       $consumido = DB::table('cashes')
                         ->select(DB::raw('consumido'))
                         ->where('id_reserva', '=', $idReserva)
                         ->get();
        
        return $consumido;
        
    }
    
     //****************************************************//
    //   ACTUALIZO EL CONSUMIDO DE LA RESERVA CON CASH     //
    //****************************************************//
    public function updateConsumidoReserva($idReserva) {
        
       $estado = true;
       $updateReserva = DB::table('cashes')
                     ->where('id_reserva',$idReserva)
                     ->update(['consumido' => $estado]);
        
        return $updateReserva;
        
    }

    
    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    
    
      public function getControlDashboard($id_usuario_operador) {
        
        return DB::table('control_dahsboards')
                      ->select(DB::raw('id_usuario_operador,catalogo_servicio,cantidad'))  
                      ->where('id_usuario_operador', $id_usuario_operador)
                      ->where('estado', '=', 1)
                      ->get();
    }
    
    
    //Guarda las promociones por usuario_servicio
    public function storeNewPromocion($inputs) {

        $promocionU = new $this->promocion;
        $promocionU->id_usuario_servicio = trim($inputs['id_usuario_servicio']);
        $promocionU->id_catalogo_tipo_fotografia = 2;
        //$promocionU->descripcion_promocion = trim($inputs['descripcion_promocion']);
        $promocionU->nombre_promocion = trim($inputs['nombre_promocion']);
        $promocionU->estado_promocion = 1;
        $promocionU->fecha_desde = $inputs['fecha_inicio'];
        $promocionU->fecha_hasta = $inputs['fecha_fin'];
        //$promocionU->precio_normal = trim($inputs['precio_normal']);
        //$promocionU->descuento = trim($inputs['descuento']);
        //$promocionU->codigo_promocion = trim($inputs['codigo']);
        $promocionU->permanente = 0;
        $promocionU->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $promocionU->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($promocionU);
        return $promocionU;
    }

    public function storeNewEvento($inputs) {

        $evento = new $this->eventos;
        $evento->id_usuario_servicio = $inputs['id_usuario_servicio'];
        $evento->id_fotografia = 4;
        $evento->descripcion_evento = trim($inputs['descripcion_evento']);
        $evento->nombre_evento = trim($inputs['nombre_evento']);
        $evento->fecha_desde = $inputs['fecha_desde'];
        $evento->fecha_hasta = $inputs['fecha_hasta'];
        $evento->estado_evento = 1;
        $evento->permanente = 0;
        $evento->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $evento->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($evento);
        return $evento;
    }

    public function storeUpdatePermanentePromocion($permanente, $id) {

        $operador = new $this->promocion;
        $operadorData = $operador::where('id', $id)
                ->update(['permanente' => $permanente]);                
        
        return $operadorData;


    }
    
    public function storeUpdatePermanenteEvento($permanente, $id) {

        $operador = new $this->eventos;
        $operadorData = $operador::where('id', $id)
                ->update(['permanente' => $permanente]);                
        
        return $operadorData;


    }   

    //Entrega el arreglo de promociones por usuario servicio
    public function getPromocionesUsuarioServicio($id_usuario_servicio) {
        $promociones = new $this->promocion;
        return $promociones::where('id_usuario_servicio', '=', $id_usuario_servicio)->orderBy('updated_at', 'DESC')->get();


        return $promociones::All();
    }

    //Entrega el arreglo de eventos por usuario servicio
    public function getEventosUsuarioServicio($id_usuario_servicio) {
        $eventos = new $this->eventos;
        return $eventos::where('id_usuario_servicio', '=', $id_usuario_servicio)->orderBy('updated_at', 'DESC')->get();


        return $eventos::All();
    }  
    
    //Entrega el arreglo de Imagenes por AGRUPACIONES
    public function getImageAgrupamiento($id_agrupamiento) {
        $promociones = new $this->image;
        return       $promociones::where('id_auxiliar', $id_agrupamiento)
                        ->where('id_catalogo_fotografia', '=', 11)
                        ->where('estado_fotografia', '=', 1)->get();
    }   





}
