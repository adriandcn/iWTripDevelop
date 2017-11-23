<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OperadorRepository;
use Validator;
use Illuminate\Support\Facades\Hash;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\ServiciosOperadorRepository;
use Illuminate\Support\Facades\Session;
use App\Repositories\PublicServiceRepository;
use Illuminate\Support\Facades\DB;

//use App\Models\Catalogo_Servicio;

class ServicioController extends Controller {

    protected $validationRules = [
        //'nombre_empresa_operador' => 'required|max:255',
        'nombre_contacto_operador_1' => 'required|max:255',
        'direccion_empresa_operador' => 'required|max:255',
        'email_contacto_operador' => 'required|max:255',
        'telf_contacto_operador_1' => 'required|max:255'
    ];
    
      protected  $messages = [
        
        'nombre_contacto_operador_1.required' => 'El nombre del contacto es requerido',
          'direccion_empresa_operador.required' => 'La dirección del contacto es requerido',
          'email_contacto_operador.required' => 'El email del contacto es requerido',
          'telf_contacto_operador_1.required' => 'El teléfono del contacto es requerido'
    ];
    protected $validationUsuarioServicios = [
        'nombre_servicio' => 'required|max:255|',
            //'detalle_servicio' => 'required|max:255|',
            //'precio_desde' => 'required|max:255',
            //'precio_hasta' => 'required|max:255',
//			'precio_anterior' => 'required|max:255',
//			'precio_actual' => 'required|max:255',
//			'descuento_servico' => 'required|max:255',
            //'direccion_servicio' => 'required|max:255',
            //'correo_contacto' => 'required|max:255',
            //'pagina_web' => 'required|max:255',
//			'nombre_comercial' => 'required|max:255',
//			'tags' => 'required|max:255',
//			'descuento_clientes' => 'required|max:255',
//			'tags_servicio' => 'required|max:255'
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    public function Auth(Guard $auth, $view) {

        if ($auth->check()) {
            $view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
        } else {

            $view = view('auth.completeRegister');
        }
    }

    /**
     * Display a listing of the resource.
     * 	
     * @return \Illuminate\Http\Response
     */
    public function index(Guard $auth, OperadorRepository $operador_gestion) {
        if ($auth->check()) {

            $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            $view = view('RegistroOperadores.registroStep1', compact('listOperadores')); // revisar debe redirecccionar a otro lado
        } else {
            $view = view('auth.completeRegister');
        }
        return $view;
    }
    
    
    public function registerMobile() {
        
        return view('mobile.logInMobile.registerMobile');
    }
    
    
    
        
    
    public function getMyProfileOp(Guard $auth, OperadorRepository $operador_gestion) {
        //
        if ($auth->check()) {
            

            $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            $view = view('Welcome.myprofileOp', compact('listOperadores')); // revisar debe redirecccionar a otro lado
        } else {
            $view = view('auth.completeRegister');
        }
        return $view;
    }

    

    public function step2(Guard $auth, OperadorRepository $operador_gestion) {
        if ($auth->check()) {
            $operador = $operador_gestion->getOperadorTipo($auth->user()->id, session('tip_oper'));
            $data['tipoOperador'] = session('tip_oper');
            $view = view('RegistroOperadores.registroStep2', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
        } else {
            $view = view('auth.completeRegister');
        }


        return $view;
    }

    
    public function step3() {
        return view('Registro.catalogoServicio');
    }

    public function step4(Guard $auth, $id, $id_catalogo, ServiciosOperadorRepository $gestion) {
        session()->forget('parroquia_admin');
        //permisssion
        $permiso = $gestion->getPermiso($id);

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {


            return view('errors.404');
        }

        $operador_gestion = new OperadorRepository();

        $usuarioServicio = $operador_gestion->getUsuarioServicio($id);
        $Servicio = $operador_gestion->getServicio($id_catalogo);
        $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimientoExistente($id_catalogo, $id);
        if (count($catalogoServicioEstablecimiento) == 0)
            $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimiento($id_catalogo);
        $ImgPromociones = $gestion->getImageOperador($id, 1);
        
        $calendarios = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'] )->get();
        
        //$calendarios1 = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', '57' )->get();
        
        //$contadorCalendario = DB::select('SELECT COUNT(id_usuario_servicio) AS contador FROM booking_abcalendar_calendars WHERE id_usuario_servicio ='.$usuarioServicio[0]['id'])->get();
        //$contadorCalendario = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'] )->count();
        
        if($calendarios != Array()){
        //if($contadorCalendario[0]->contador != ""){ 
            
            $contadorCalendario = DB::table('booking_abcalendar_calendars')
                     ->select(DB::raw('COUNT(id_usuario_servicio) AS contador'))
                     ->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'])
                     ->groupBy('id_usuario_servicio')
                     ->get();
            
            $arrayId = array();
            
            for($i=0; $i < $contadorCalendario[0]->contador; $i++){
                $arrayId[] .= $calendarios[$i]->id;
            }

            $arrayDeIds = implode(', ', $arrayId);
            
            $calendarioConNombre = DB::table('booking_abcalendar_calendars')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('booking_abcalendar_calendars.* , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->whereNotNull('booking_abcalendar_multi_lang.content')
                         //->where('booking_abcalendar_multi_lang.content IS NOT NULL')
                         ->where('booking_abcalendar_calendars.id_usuario_servicio','=',$usuarioServicio[0]['id'])
                         //->where('booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')
                         ->whereIn('booking_abcalendar_calendars.id',$arrayId)
                         ->get();
            
            /*$calendarioConNombre = DB::select(DB::raw("select booking_abcalendar_calendars.* , booking_abcalendar_multi_lang.content,count(booking_abcalendar_reservations.calendar_id) as reservas "
                    . "from `booking_abcalendar_calendars`, `booking_abcalendar_multi_lang`, `booking_abcalendar_reservations` "
                    . "where `booking_abcalendar_calendars`.`id` = `booking_abcalendar_multi_lang`.`foreign_id` "
                    . "and `booking_abcalendar_reservations`.`calendar_id` = `booking_abcalendar_multi_lang`.`foreign_id` "
                    . "and `booking_abcalendar_multi_lang`.`model` = 'pjCalendar' "
                    . "and `booking_abcalendar_multi_lang`.`field` = 'name' "
                    . "and `booking_abcalendar_multi_lang`.`content` is not null "
                    . "and `booking_abcalendar_calendars`.`id_usuario_servicio` = ".$usuarioServicio[0]['id']." "
                    . "and `booking_abcalendar_calendars`.`id` in (".$arrayDeIds.") "
                    . "group by `booking_abcalendar_multi_lang`.`content`"));*/
            

            
               $reservacionesConNombre = DB::table('booking_abcalendar_reservations')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_reservations.calendar_id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('count(booking_abcalendar_reservations.calendar_id) as reservas , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->whereNotNull('booking_abcalendar_multi_lang.content')
                         ->whereIn('booking_abcalendar_reservations.calendar_id',$arrayId)
                          ->groupBy('booking_abcalendar_multi_lang.content')
                         ->get();
               
            return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 
                        'id_catalogo', 'ImgPromociones', 'Servicio' ,'calendarios', 
                        'contadorCalendario','arrayDeIds','calendarioConNombre','reservacionesConNombre'));
            
        }else{
            return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 
                        'id_catalogo', 'ImgPromociones', 'Servicio','calendarios'));
            
        }
        
       
        /*return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 'id_catalogo', 'ImgPromociones', 'Servicio'
                        ,'calendarios', 'contadorCalendario','arrayDeIds','calendarioConNombre'));*/
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postOperadores(Guard $auth,Request $request, OperadorRepository $operador_gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $operadorData = array(
            //'nombre_empresa_operador' => $formFields['nombre_empresa_operador'],
            'nombre_contacto_operador_1' => $formFields['nombre_contacto_operador_1'],
            'telf_contacto_operador_1' => $formFields['telf_contacto_operador_1'],
            'ip_registro_operador' => $this->getIp(),
            'email_contacto_operador' => $formFields['email_contacto_operador'],
            'direccion_empresa_operador' => $formFields['direccion_empresa_operador'],
            'id_usuario' => $auth->user()->id,
            'id_tipo_operador' => $formFields['id_tipo_operador'],
            'estado_contacto_operador' => 1,
            'id_usuario_op' => $formFields['id_usuario_op']
        );
        $validator = Validator::make($operadorData, $this->validationRules, $this->messages);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            if ($formFields['id_usuario_op'] > 0) {
                $id_usuario_op = $formFields['id_usuario_op'];
                $request->session()->put('operador_id', $formFields['id_usuario_op']);

                $operador = $operador_gestion->update($operadorData);
            } else {
                $operador = $operador_gestion->store($operadorData);
                $request->session()->put('operador_id', $operador->id);
               // $operadores = $operador_gestion->getLastIdInsert($operadorData);
                // foreach ($operadores as $operador)
                    $id_usuario_op = $operador->id_usuario_op;
            }
        }
        $returnHTML = ('/userservice');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    public function postTipoOperadores(Request $request, OperadorRepository $operador_gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $request->session()->put('tip_oper', $formFields['tipo_operador']);
        $operadorData = array(
            'tipo_operador' => $formFields['tipo_operador'],
        );
        $returnHTML = ('operador');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function postTipoOperadoresProfile(Request $request, OperadorRepository $operador_gestion) {

        Session::forget('operador_id');
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $request->session()->put('tip_oper', $formFields['tipo_operador']);
        $request->session()->put('operador_id', $formFields['operador_id']);
      
        $returnHTML = ('detalleServicios');
        
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    public function postUsuarioServicios(Request $request, OperadorRepository $usuarioSevicio_gestion, ServiciosOperadorRepository $gestion) {
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        if (isset($formFields['id_servicio_est'])) {
            foreach ($formFields['id_servicio_est'] as $catalogo)
                $servicio_establecimiento_usuario[] = $catalogo;
        } else {
            $servicio_establecimiento_usuario[] = "";
        }
//     	var_dump($servicio_establecimiento_usuario);
//     	exit;

          if (!isset($formFields['fecha_ingreso']))
            $formFields['fecha_ingreso'] = '0000-00-00 00:00:00';
        if (!isset($formFields['fecha_fin']))
            $formFields['fecha_fin'] ='0000-00-00 00:00:00';
        if (!isset($formFields['id_provincia']))
            $formFields['id_provincia'] = 0;
        if (!isset($formFields['id_canton']))
            $formFields['id_canton'] = 0;
        if (!isset($formFields['id_parroquia']))
            $formFields['id_parroquia'] = 0;

        $usuarioServicioData = array(
                 'nombre_servicio' => $formFields['nombre_servicio'],
                'detalle_servicio' => $formFields['detalle_servicio'],
            'detalle_servicio_eng' => $formFields['detalle_servicio_eng'],
                'precio_desde' => $formFields['precio_desde'],
                'precio_hasta' => $formFields['precio_hasta'],
    //    			'precio_anterior' => $formFields['precio_anterior'],
    //    			'precio_actual' => $formFields['precio_actual'],
    //    			'descuento_servico' => $formFields['descuento_servico'],
                'direccion_servicio' => $formFields['direccion_servicio'],
                'correo_contacto' => $formFields['correo_contacto'],
                'pagina_web' => $formFields['pagina_web'],
    //    			'nombre_comercial' => $formFields['nombre_comercial'],
                            'tags' => $formFields['tags'],
    //    			'descuento_clientes' => $formFields['descuento_clientes'],
                            'tags' => $formFields['tags'],
    //    			'observaciones' => $formFields['observaciones'],
                'telefono' => $formFields['telefono'],
                'latitud_servicio' => $formFields['latitud_servicio'],
                'longitud_servicio' => $formFields['longitud_servicio'],
                'id_usuario_servicio' => $formFields['id'],
                'id_provincia' => $formFields['id_provincia'],
                'id_canton' => $formFields['id_canton'],
                'id_parroquia' => $formFields['id_parroquia'],
                    'como_llegar1' => $formFields['como_llegar1'],
                    'como_llegar1_1' => $formFields['como_llegar1_1'],
                    'como_llegar2_2' => $formFields['como_llegar2_2'],
            'horario' => $formFields['horario'],
                    'como_llegar2' => $formFields['como_llegar2'],
                    'fecha_ingreso' => $formFields['fecha_ingreso'],
                    'fecha_fin' => $formFields['fecha_fin']
        );
        $validator = Validator::make($usuarioServicioData, $this->validationUsuarioServicios);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            //return $servicio_establecimiento_usuario;
            $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServicios($usuarioServicioData, $servicio_establecimiento_usuario, $formFields['id'], $formFields['id_catalogo']);
              if ($formFields['id'] == 0)
		{
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($formFields['id'], $search,4,$usuarioServicio->id);
            
		} else {
                 //update
                    $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio']." ".$formFields['tags']." ".$formFields['detalle_servicio_eng']." ".$formFields['como_llegar1_1']." ".$formFields['como_llegar2_2'];            
                    $gestion->storeUpdateSerchEngine( $usuarioServicio,4,$formFields['id'],$search);
		}
        }
        $returnHTML = ('/servicios/serviciooperador/' . $formFields['id'] . '/' . $formFields['id_catalogo']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    public function postUsuarioServiciosMini(Request $request, OperadorRepository $usuarioSevicio_gestion, ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $usuarioServicioData = array(
            'nombre_servicio' => $formFields['nombre_servicio'],
            'detalle_servicio' => $formFields['detalle_servicio'],
            'id_usuario_operador' => $formFields['id_usuario_operador'],
            'id_catalogo_servicio' => $formFields['id_catalogo_servicio']
        );
        $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServiciosMini($usuarioServicioData);
        	//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($usuarioServicio, $search,4,$usuarioServicio);
            
        $returnHTML = ('/servicios/serviciooperador/' . $usuarioServicio . '/' . $formFields['id_catalogo_servicio']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
        public function postUsuarioServiciosMiniPadre(Request $request, OperadorRepository $usuarioSevicio_gestion, ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $usuarioServicioData = array(
            'nombre_servicio' => $formFields['nombre_servicio'],
            'detalle_servicio' => $formFields['detalle_servicio'],
            'id_usuario_operador' => $formFields['id_usuario_operador'],
            'id_catalogo_servicio' => $formFields['id_catalogo_servicio'],
            'id_padre' => $formFields['id_padre']
        );
        $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServiciosMiniPadre($usuarioServicioData);
    
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($usuarioServicio, $search,4,$usuarioServicio);
            
		
        $returnHTML = ('/servicios/serviciooperador/' . $usuarioServicio . '/' . $formFields['id_catalogo_servicio']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    
    
    public function getAboutUs(Guard $auth, OperadorRepository $operador_gestion) {
        //
       
        if ($auth->check()) {
          
            $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            if($listOperadores){
                $view = view('responsive.aboutUS', compact('listOperadores')); 
                
            }else{
             $view = view('userservice');    
                
            }
            
        } else {
            $view = view('responsive.completeRegister');
        }
        return $view;
    }
    
   public function postTipoOperadoresProfileRes(Guard $auth,Request $request, OperadorRepository $operador_gestion) {

        Session::forget('operador_id');
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $request->session()->put('tip_oper', $formFields['tipo_operador']);
        $request->session()->put('operador_id', $formFields['operador_id']);
      
        
        
        $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            
        if($listOperadores){  
                //$returnHTML = ('userservice');
                $returnHTML = ('myinfo');
        }else{
                //$returnHTML = ('detalleServicios');
                $returnHTML = ('myinfo');
        }

        return response()->json(array('success' => true, 'redirectto' => $returnHTML)); 

    }
    
    public function step2res(Guard $auth, OperadorRepository $operador_gestion) {
        if ($auth->check()) {
            $operador = $operador_gestion->getOperadorTipo($auth->user()->id, session('tip_oper'));
            $data['tipoOperador'] = session('tip_oper');
            //$view = view('responsive.operadores', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
            $view = view('responsive.myInfo', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
            //$view = view('responsive.operadores', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
        } else {
            $view = view('responsive.completeRegister');
        }


        return $view;
    }
    
    public function step2pru(Guard $auth, OperadorRepository $operador_gestion) {
        if ($auth->check()) {
            $operador = $operador_gestion->getOperadorTipo($auth->user()->id, session('tip_oper'));
            $data['tipoOperador'] = session('tip_oper');
            //$view = view('responsive.operadores', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
            //$view = view('responsive.servicios', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
            $view = view('responsive.servicios'); 
        } else {
            //$view = view('responsive.operadorespru');
            $view = view('responsive.servicios'); 
        }


        return $view;
    }
    
    public function step2res1(Guard $auth, OperadorRepository $operador_gestion) {
        if ($auth->check()) {
            $operador = $operador_gestion->getOperadorTipo($auth->user()->id, session('tip_oper'));
            $data['tipoOperador'] = session('tip_oper');
            //$view = view('responsive.operadores', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
            $view = view('responsive.myInfoMenu', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
        } else {
            //$view = view('responsive.operadorespru');
            $view = view('responsive.myInfoMenu', compact('data', 'operador')); 
        }


        return $view;
    }
    
    public function postOperadores1(Guard $auth,Request $request, OperadorRepository $operador_gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        
        $operadorData = array(
            //'nombre_empresa_operador' => $formFields['nombre_empresa_operador'],
            'nombre_contacto_operador_1' => $formFields['nombre_contacto_operador_1'],
            'telf_contacto_operador_1' => $formFields['telf_contacto_operador_1'],
            'ip_registro_operador' => $this->getIp(),
            'email_contacto_operador' => $formFields['email_contacto_operador'],
            'direccion_empresa_operador' => $formFields['direccion_empresa_operador'],
            'id_usuario' => $auth->user()->id,
            'id_tipo_operador' => $formFields['id_tipo_operador'],
            'estado_contacto_operador' => 1,
            'id_usuario_op' => $formFields['id_usuario_op']
        );
        $validator = Validator::make($operadorData, $this->validationRules, $this->messages);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            if ($formFields['id_usuario_op'] > 0) {
                $id_usuario_op = $formFields['id_usuario_op'];
                $request->session()->put('operador_id', $formFields['id_usuario_op']);

                $operador = $operador_gestion->update($operadorData);
            }
            
            else {
                $operador = $operador_gestion->store($operadorData);
                $request->session()->put('operador_id', $operador->id);
                $operadores = $operador_gestion->getLastIdInsert($operadorData);
                //foreach ($operadores as $operador)
                    $id_usuario_op = $operador->id_usuario_op;
                    
            }
        }
        $returnHTML = ('/serviciosres');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        
        
    }
    
    public function UploadInfoOperado2(Guard $auth,Request $request,OperadorRepository $operador_gestion) {

                
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        
        $operadorData = array(
            //'nombre_empresa_operador' => $formFields['nombre_empresa_operador'],
            'nombre_contacto_operador_1' => $formFields['nombre_contacto_operador_1'],
            'telf_contacto_operador_1' => $formFields['telf_contacto_operador_1'],
            'ip_registro_operador' => $this->getIp(),
            'email_contacto_operador' => $formFields['email_contacto_operador'],
            'direccion_empresa_operador' => $formFields['direccion_empresa_operador'],
            'id_usuario' => $auth->user()->id,
            'id_tipo_operador' => $formFields['id_tipo_operador'],
            'estado_contacto_operador' => 1,
            'id_usuario_op' => $formFields['id_usuario_op']
        );
        
       
        $validator = Validator::make($operadorData, $this->validationRules, $this->messages);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            if ($formFields['id_usuario_op'] > 0) {
                $id_usuario_op = $formFields['id_usuario_op'];
                $request->session()->put('operador_id', $formFields['id_usuario_op']);

                $operador = $operador_gestion->update($operadorData);
            }
            
            else {
                $operador = $operador_gestion->store($operadorData);
                $request->session()->put('operador_id', $operador->id);
                $operadores = $operador_gestion->getLastIdInsert($operadorData);
                //foreach ($operadores as $operador)
                    $id_usuario_op = $operador->id_usuario_op;
                    
            }
        }
        
                $returnHTML = ('/myinfores');
                return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        
        
        
    }
    
    public function vistaPreviaServicios1(){
        $usuarioServicio = session('usu_servicio');
        print_r($usuarioServicio);
        
    }
    
    public function vistaPreviaServicios(Request $request,$id){
        
        $request->session()->put('usu_servicio', $id);
        $returnHTML = ('/previewServicio');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function step4res(Guard $auth, $id, $id_catalogo, ServiciosOperadorRepository $gestion) {
        session()->forget('parroquia_admin');
        //permisssion
        $permiso = $gestion->getPermiso($id);

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {


            return view('errors.404');
        }

        $operador_gestion = new OperadorRepository();

        $usuarioServicio = $operador_gestion->getUsuarioServicio($id);
        $Servicio = $operador_gestion->getServicio($id_catalogo);
        $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimientoExistente($id_catalogo, $id);
        if (count($catalogoServicioEstablecimiento) == 0)
            $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimiento($id_catalogo);
        $ImgPromociones = $gestion->getImageOperador($id, 1);
        
        $calendarios = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'] )->get();
        
        //$calendarios1 = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', '57' )->get();
        
        //$contadorCalendario = DB::select('SELECT COUNT(id_usuario_servicio) AS contador FROM booking_abcalendar_calendars WHERE id_usuario_servicio ='.$usuarioServicio[0]['id'])->get();
        //$contadorCalendario = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'] )->count();
        
        if($calendarios != Array()){
        //if($contadorCalendario[0]->contador != ""){ 
            
            $contadorCalendario = DB::table('booking_abcalendar_calendars')
                     ->select(DB::raw('COUNT(id_usuario_servicio) AS contador'))
                     ->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'])
                     ->groupBy('id_usuario_servicio')
                     ->get();
            
            $arrayId = array();
            
            for($i=0; $i < $contadorCalendario[0]->contador; $i++){
                $arrayId[] .= $calendarios[$i]->id;
            }

            $arrayDeIds = implode(', ', $arrayId);
            
            $calendarioConNombre = DB::table('booking_abcalendar_calendars')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('booking_abcalendar_calendars.* , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->whereNotNull('booking_abcalendar_multi_lang.content')
                         //->where('booking_abcalendar_multi_lang.content IS NOT NULL')
                         ->where('booking_abcalendar_calendars.id_usuario_servicio','=',$usuarioServicio[0]['id'])
                         //->where('booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')
                         ->whereIn('booking_abcalendar_calendars.id',$arrayId)
                         ->get();
            
            
               $reservacionesConNombre = DB::table('booking_abcalendar_reservations')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_reservations.calendar_id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('count(booking_abcalendar_reservations.calendar_id) as reservas , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->whereNotNull('booking_abcalendar_multi_lang.content')
                         ->whereIn('booking_abcalendar_reservations.calendar_id',$arrayId)
                          ->groupBy('booking_abcalendar_multi_lang.content')
                         ->get();
               
            return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 
                        'id_catalogo', 'ImgPromociones', 'Servicio' ,'calendarios', 
                        'contadorCalendario','arrayDeIds','calendarioConNombre','reservacionesConNombre'));
            
        }else{
            return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 
                        'id_catalogo', 'ImgPromociones', 'Servicio','calendarios'));
            
        }
        
       
        /*return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 'id_catalogo', 'ImgPromociones', 'Servicio'
                        ,'calendarios', 'contadorCalendario','arrayDeIds','calendarioConNombre'));*/
    }
    
    public function operadorpru() {

                return view('responsive.operadorespru');

    }
    
    public function postUsuarioServiciosMini1(Request $request, OperadorRepository $usuarioSevicio_gestion, 
                                        ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $usuarioServicioData = array(
            'nombre_servicio' => $formFields['nombre_servicio'],
            'detalle_servicio' => $formFields['detalle_servicio'],
            'id_usuario_operador' => $formFields['id_usuario_operador'],
            'id_catalogo_servicio' => $formFields['id_catalogo_servicio']
        );
        
        $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServiciosMini($usuarioServicioData);
        if($formFields['id_catalogo_servicio'] == 1){
           $contadorControl = $usuarioSevicio_gestion->verificarSiExiste($formFields['id_catalogo_servicio'],$formFields['id_usuario_operador'] );
        }elseif($formFields['id_catalogo_servicio'] == 2){
           $contadorControl = $usuarioSevicio_gestion->verificarSiExiste($formFields['id_catalogo_servicio'],$formFields['id_usuario_operador'] );
        }elseif($formFields['id_catalogo_servicio'] == 3){
           $contadorControl = $usuarioSevicio_gestion->verificarSiExiste($formFields['id_catalogo_servicio'],$formFields['id_usuario_operador'] );
        }
        
        if($contadorControl[0]->contador == 0){
            $controlDashboard = $usuarioSevicio_gestion->storageControlDashboardMini($usuarioServicioData);
        }
        
        
		//new       
            $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($usuarioServicio, $search,4,$usuarioServicio);
            
	$request->session()->put('usu_serviciocrear', $usuarioServicio);
        $request->session()->put('catalogocrear', $formFields['id_catalogo_servicio']);
        
        //$returnHTML = ('/servicios/serviciooperador1/' . $usuarioServicio . '/' . $formFields['id_catalogo_servicio']);
        //return response()->json(array('success' => true, 'redirectto' => $returnHTML));
         $returnHTML = ('/edicionServicios');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function redirectStep4() {
        
        $returnHTML = ('/serviciosres');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    
    

public function edicionServicios(ServiciosOperadorRepository $gestion,Guard $auth,PublicServiceRepository $gestion1){
        
        $id =  session('usu_serviciocrear');
        $id_catalogo = session('catalogocrear');
        session()->forget('parroquia_admin');
        //permisssion
        $permiso = $gestion->getPermiso($id);

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {


            return view('errors.404');
        }

        $operador_gestion = new OperadorRepository();

        $usuarioServicio = $operador_gestion->getUsuarioServicio($id);
        $Servicio = $operador_gestion->getServicio($id_catalogo);
        $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimientoExistente($id_catalogo, $id);
        if (count($catalogoServicioEstablecimiento) == 0)
            $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimiento($id_catalogo);
        $ImgPromociones = $gestion->getImageOperador($id, 1);
        
        $imagenes = $gestion1->getAtraccionImages($id);
        $atraccion = $gestion1->getAtraccionDetails($id);
        
        //***********************************************************************//
        //                  para las promociones y los eventos                   //   
        //***********************************************************************//        
        $promociones = $gestion->getPromocionesUsuarioServicio($id);
        $eventos = $gestion->getEventosUsuarioServicio($id);
        
        $calendarios = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'] )->get();
        
        //$calendarios1 = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', '57' )->get();
        
        //$contadorCalendario = DB::select('SELECT COUNT(id_usuario_servicio) AS contador FROM booking_abcalendar_calendars WHERE id_usuario_servicio ='.$usuarioServicio[0]['id'])->get();
        //$contadorCalendario = DB::table('booking_abcalendar_calendars')->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'] )->count();
        
        if($calendarios != Array()){
        //if($contadorCalendario[0]->contador != ""){ 
            
            $contadorCalendario = DB::table('booking_abcalendar_calendars')
                     ->select(DB::raw('COUNT(id_usuario_servicio) AS contador'))
                     ->where('id_usuario_servicio', '=', $usuarioServicio[0]['id'])
                     ->groupBy('id_usuario_servicio')
                     ->get();
            
            $arrayId = array();
            
            for($i=0; $i < $contadorCalendario[0]->contador; $i++){
                $arrayId[] .= $calendarios[$i]->id;
            }

            $arrayDeIds = implode(', ', $arrayId);
            
            $calendarioConNombre = DB::table('booking_abcalendar_calendars')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('booking_abcalendar_calendars.* , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->whereNotNull('booking_abcalendar_multi_lang.content')
                         //->where('booking_abcalendar_multi_lang.content IS NOT NULL')
                         ->where('booking_abcalendar_calendars.id_usuario_servicio','=',$usuarioServicio[0]['id'])
                         //->where('booking_abcalendar_calendars.id','=','booking_abcalendar_multi_lang.foreign_id')
                         ->whereIn('booking_abcalendar_calendars.id',$arrayId)
                         ->get();
            
            
               $reservacionesConNombre = DB::table('booking_abcalendar_reservations')
                         ->join('booking_abcalendar_multi_lang','booking_abcalendar_reservations.calendar_id','=','booking_abcalendar_multi_lang.foreign_id')  
                         ->select(DB::raw('count(booking_abcalendar_reservations.calendar_id) as reservas , booking_abcalendar_multi_lang.content'))
                         ->where('booking_abcalendar_multi_lang.model', '=', 'pjCalendar')
                         ->where('booking_abcalendar_multi_lang.field','=','name')
                         ->whereNotNull('booking_abcalendar_multi_lang.content')
                         ->whereIn('booking_abcalendar_reservations.calendar_id',$arrayId)
                          ->groupBy('booking_abcalendar_multi_lang.content')
                         ->get();
               
            return view('responsive.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 
                        'id_catalogo', 'ImgPromociones', 'Servicio' ,'calendarios', 
                        'contadorCalendario','arrayDeIds','calendarioConNombre','reservacionesConNombre',
                        'imagenes','atraccion','promociones','eventos'));
            
        }else{
            return view('responsive.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 
                        'id_catalogo', 'ImgPromociones', 'Servicio','calendarios','imagenes',
                        'atraccion','promociones','eventos'));
            
        }
    }

    
    
    public function step4crear(Request $request,$id, $id_catalogo) {
        
        $request->session()->put('usu_serviciocrear', $id);
        $request->session()->put('catalogocrear', $id_catalogo);
        $returnHTML = ('/edicionServicios');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    
    public function postUsuarioServicios1(Request $request, OperadorRepository $usuarioSevicio_gestion , ServiciosOperadorRepository $gestion) {
        
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        
        if (isset($formFields['id_servicio_est'])) {
            foreach ($formFields['id_servicio_est'] as $catalogo)
                $servicio_establecimiento_usuario[] = $catalogo;
        } else {
            $servicio_establecimiento_usuario[] = "";
        }

        if (!isset($formFields['fecha_ingreso']))
            $formFields['fecha_ingreso'] = '0000-00-00 00:00:00';
        if (!isset($formFields['fecha_fin']))
            $formFields['fecha_fin'] ='0000-00-00 00:00:00';

        if (!isset($formFields['id_provincia']))
            $formFields['id_provincia'] = 0;
        if (!isset($formFields['id_canton']))
            $formFields['id_canton'] = 0;
        if (!isset($formFields['id_parroquia']))
            $formFields['id_parroquia'] = 0;

        $usuarioServicioData = array(
                'nombre_servicio' => $formFields['nombre_servicio'],
                'detalle_servicio' => $formFields['detalle_servicio'],
            'detalle_servicio_eng' => $formFields['detalle_servicio_eng'],
                'precio_desde' => $formFields['precio_desde'],
                'precio_hasta' => $formFields['precio_hasta'],
    //    			'precio_anterior' => $formFields['precio_anterior'],
    //    			'precio_actual' => $formFields['precio_actual'],
    //    			'descuento_servico' => $formFields['descuento_servico'],
                'direccion_servicio' => $formFields['direccion_servicio'],
                'correo_contacto' => $formFields['correo_contacto'],
                'pagina_web' => $formFields['pagina_web'],
    //    			'nombre_comercial' => $formFields['nombre_comercial'],
                            'tags' => $formFields['tags'],
    //    			'descuento_clientes' => $formFields['descuento_clientes'],
                            'tags' => $formFields['tags'],
    //    			'observaciones' => $formFields['observaciones'],
                'telefono' => $formFields['telefono'],
                'latitud_servicio' => $formFields['latitud_servicio'],
                'longitud_servicio' => $formFields['longitud_servicio'],
                'id_usuario_servicio' => $formFields['id'],
                'id_provincia' => $formFields['id_provincia'],
                'id_canton' => $formFields['id_canton'],
                'id_parroquia' => $formFields['id_parroquia'],
                    'como_llegar1' => $formFields['como_llegar1'],
                    'como_llegar1_1' => $formFields['como_llegar1_1'],
                    'como_llegar2_2' => $formFields['como_llegar2_2'],
                    'como_llegar2' => $formFields['como_llegar2'],
                    'fecha_ingreso' => $formFields['fecha_ingreso'],
            'horario' => $formFields['horario'],
                    'fecha_fin' => $formFields['fecha_fin']
                
        );
        
        //VALIDACION DE LOS CAMPOS DE LA DATA
        $validator = Validator::make($usuarioServicioData, $this->validationUsuarioServicios);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            //return $servicio_establecimiento_usuario;
            $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServicios($usuarioServicioData, $servicio_establecimiento_usuario, $formFields['id'], $formFields['id_catalogo']);
            
           if ($formFields['id'] == 0)
		{
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($formFields['id'], $search,4,$usuarioServicio->id);
            
		} else {
                 //update
                    $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio']." ".$formFields['tags'];            
                    $gestion->storeUpdateSerchEngine( $usuarioServicio,4,$formFields['id'],$search);
		}
             
        }
        
        $returnHTML = ('/updateServicios');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function uploadServiciosRes(Request $request, OperadorRepository $usuarioSevicio_gestion , ServiciosOperadorRepository $gestion) {
        
            $inputData = Input::get('formData');
            parse_str($inputData, $formFields);
        
        
        if (isset($formFields['id_servicio_est'])) {
            foreach ($formFields['id_servicio_est'] as $catalogo)
                $servicio_establecimiento_usuario[] = $catalogo;
        } else {
            $servicio_establecimiento_usuario[] = "";
        }

        if (!isset($formFields['fecha_ingreso']))
            $formFields['fecha_ingreso'] = '0000-00-00 00:00:00';
        if (!isset($formFields['fecha_fin']))
            $formFields['fecha_fin'] ='0000-00-00 00:00:00';

        if (!isset($formFields['id_provincia']))
            $formFields['id_provincia'] = 0;
        if (!isset($formFields['id_canton']))
            $formFields['id_canton'] = 0;
        if (!isset($formFields['id_parroquia']))
            $formFields['id_parroquia'] = 0;

        $usuarioServicioData = array(
                'nombre_servicio' => $formFields['nombre_servicio'],
                'detalle_servicio' => $formFields['detalle_servicio'],
            'detalle_servicio_eng' => $formFields['detalle_servicio_eng'],
                'precio_desde' => $formFields['precio_desde'],
                'precio_hasta' => $formFields['precio_hasta'],
    //    			'precio_anterior' => $formFields['precio_anterior'],
    //    			'precio_actual' => $formFields['precio_actual'],
    //    			'descuento_servico' => $formFields['descuento_servico'],
                'direccion_servicio' => $formFields['direccion_servicio'],
                'correo_contacto' => $formFields['correo_contacto'],
                'pagina_web' => $formFields['pagina_web'],
    //    			'nombre_comercial' => $formFields['nombre_comercial'],
                            'tags' => $formFields['tags'],
    //    			'descuento_clientes' => $formFields['descuento_clientes'],
                            'tags' => $formFields['tags'],
    //    			'observaciones' => $formFields['observaciones'],
                'telefono' => $formFields['telefono'],
                'latitud_servicio' => $formFields['latitud_servicio'],
                'longitud_servicio' => $formFields['longitud_servicio'],
                'id_usuario_servicio' => $formFields['id'],
                'id_provincia' => $formFields['id_provincia'],
                'id_canton' => $formFields['id_canton'],
                'id_parroquia' => $formFields['id_parroquia'],
                    'como_llegar1' => $formFields['como_llegar1'],
                    'como_llegar1_1' => $formFields['como_llegar1_1'],
                    'como_llegar2_2' => $formFields['como_llegar2_2'],
                    'como_llegar2' => $formFields['como_llegar2'],
                    'fecha_ingreso' => $formFields['fecha_ingreso'],
            'horario' => $formFields['horario'],
                    'fecha_fin' => $formFields['fecha_fin']
                
        );
        
        
        //VALIDACION DE LOS CAMPOS DE LA DATA
        $validator = Validator::make($usuarioServicioData, $this->validationUsuarioServicios);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            //return $servicio_establecimiento_usuario;
            $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServicios($usuarioServicioData, $servicio_establecimiento_usuario, $formFields['id'], $formFields['id_catalogo']);
            
               
            
            if ($formFields['id'] == 0)
		{
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($formFields['id'], $search,4,$usuarioServicio->id);
            
		} else {
                 //update
                    $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio']." ".$formFields['tags'];            
                    $gestion->storeUpdateSerchEngine( $usuarioServicio,4,$formFields['id'],$search);
		}
             
        }
        $returnHTML = ('/edicionServicios');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    } 
    
    
    //SERVICIOCONTROLLER


    
    public function uploadServiciosRes1(Request $request, OperadorRepository $usuarioSevicio_gestion , ServiciosOperadorRepository $gestion) {
        
            $inputData = Input::get('formData');
            parse_str($inputData, $formFields);
        
        
        if (isset($formFields['id_servicio_est'])) {
            foreach ($formFields['id_servicio_est'] as $catalogo)
                $servicio_establecimiento_usuario[] = $catalogo;
        } else {
            $servicio_establecimiento_usuario[] = "";
        }

        if (!isset($formFields['fecha_ingreso']))
            $formFields['fecha_ingreso'] = '0000-00-00 00:00:00';
        if (!isset($formFields['fecha_fin']))
            $formFields['fecha_fin'] ='0000-00-00 00:00:00';

        if (!isset($formFields['id_provincia']))
            $formFields['id_provincia'] = 0;
        if (!isset($formFields['id_canton']))
            $formFields['id_canton'] = 0;
        if (!isset($formFields['id_parroquia']))
            $formFields['id_parroquia'] = 0;

        $usuarioServicioData = array(
                'nombre_servicio' => $formFields['nombre_servicio'],
                'detalle_servicio' => $formFields['detalle_servicio'],
            'detalle_servicio_eng' => $formFields['detalle_servicio_eng'],
                'precio_desde' => $formFields['precio_desde'],
                'precio_hasta' => $formFields['precio_hasta'],
    //    			'precio_anterior' => $formFields['precio_anterior'],
    //    			'precio_actual' => $formFields['precio_actual'],
    //    			'descuento_servico' => $formFields['descuento_servico'],
                'direccion_servicio' => $formFields['direccion_servicio'],
                'correo_contacto' => $formFields['correo_contacto'],
                'pagina_web' => $formFields['pagina_web'],
    //    			'nombre_comercial' => $formFields['nombre_comercial'],
                            'tags' => $formFields['tags'],
    //    			'descuento_clientes' => $formFields['descuento_clientes'],
                            'tags' => $formFields['tags'],
    //    			'observaciones' => $formFields['observaciones'],
                'telefono' => $formFields['telefono'],
                'latitud_servicio' => $formFields['latitud_servicio'],
                'longitud_servicio' => $formFields['longitud_servicio'],
                'id_usuario_servicio' => $formFields['id'],
                'id_provincia' => $formFields['id_provincia'],
                'id_canton' => $formFields['id_canton'],
                'id_parroquia' => $formFields['id_parroquia'],
                    'como_llegar1' => $formFields['como_llegar1'],
                    'como_llegar1_1' => $formFields['como_llegar1_1'],
                    'como_llegar2_2' => $formFields['como_llegar2_2'],
                    'como_llegar2' => $formFields['como_llegar2'],
                    'fecha_ingreso' => $formFields['fecha_ingreso'],
            'horario' => $formFields['horario'],
                    'fecha_fin' => $formFields['fecha_fin']
                
        );
        
        
        //VALIDACION DE LOS CAMPOS DE LA DATA
        $validator = Validator::make($usuarioServicioData, $this->validationUsuarioServicios);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            //return $servicio_establecimiento_usuario;
            $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServicios($usuarioServicioData, $servicio_establecimiento_usuario, $formFields['id'], $formFields['id_catalogo']);
            
               
            
            if ($formFields['id'] == 0)
		{
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($formFields['id'], $search,4,$usuarioServicio->id);
            
		} else {
                 //update
                    $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio']." ".$formFields['tags'];            
                    $gestion->storeUpdateSerchEngine( $usuarioServicio,4,$formFields['id'],$search);
		}
             
        }
        $returnHTML = ('/serviciosres');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    } 
   

    
    
       public function uploadServiciosActivo($id_usuario_servicio, OperadorRepository $usuarioSevicio_gestion , ServiciosOperadorRepository $gestion) {
        
        
        $usuarioServicio = $usuarioSevicio_gestion->getUsuarioServicio($id_usuario_servicio);
        
       
        $estado_servicio = $usuarioServicio[0]->estado_servicio_usuario;
        if($estado_servicio == 1){
            $estado_servicio = 0;
            $estado = $usuarioSevicio_gestion->updateEstadoUsuarioServicios($id_usuario_servicio,$estado_servicio);
        }elseif($estado_servicio == 0){
            $estado_servicio = 1;
            $estado = $usuarioSevicio_gestion->updateEstadoUsuarioServicios($id_usuario_servicio,$estado_servicio);
        }
            
        return response()->json(array('success' => true, 'redirectto' => $estado));
    } 

    
}
