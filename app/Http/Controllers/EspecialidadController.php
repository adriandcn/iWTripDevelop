<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Booking\Especialidad;
use Illuminate\Contracts\Auth\Guard;
use Validator;
use Input;
use App\Repositories\ServiciosOperadorRepository;
use App\Repositories\EspecialidadRepository;
use Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
       public function __construct(Especialidad $EspecilaidadU) {
        $this->model = $EspecilaidadU;
         }
    
      public function postItinerario(Request $request) {
     
        $empleados = Especialidad::create(Request::all());
	return $empleados;
        
        /*$inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        //$permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);

        //$object = $gestion->storeNewEspecialidad($formFields);
        $EspecilaidadU = new $this->model;
        $EspecilaidadU->id_usuario_servicio = trim($inputs['id_usuario_servicio']);
        $EspecilaidadU->id_catalogo_especialidad = trim($inputs['id_catalogo_especialidad']);
        $EspecilaidadU->nombre_especialidad = trim($inputs['nombre_especialidad']);
        $EspecilaidadU->descripcion_especialidad = trim($inputs['descripcion_especialidad']);
        $EspecilaidadU->activo = trim($inputs['activo']);
        
        $returnHTML = ('/especialidad/' . $object->id);
        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {
            return view('errors.404');
        }
        
        return $EspecilaidadU;*/
        //return response()->json(array('success' => true, 'redirectto' => $returnHTML));


     
//        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {
//
//            return view('errors.404');
//        }
//
//        
//        $validator = Validator::make($formFields, Itinerario_Usuario_Servicio::$rulesP);
//        if ($validator->fails()) {
//            return response()->json(array(
//                        'fail' => true,
//                        'errors' => $validator->getMessageBag()->toArray()
//            ));
//        }
//
//        //obtengo llas promociones por id
//        if (isset($formFields['id'])) {
//            $Itinerario = $gestion->getItinerario($formFields['id']);
//        }
//        //si ya existe el objeto se hace el update
//        if (isset($Itinerario)) {
//            //logica update
//
//            $gestion->storeUpdateItinerario($formFields, $Itinerario);
//            
//            //Gestion de actualizacion de busqueda    
//            
//            $search=$formFields['nombre_itinerario']." ".$formFields['descripcion_itinerario']." ".$formFields['observaciones_itinerario']." ".$formFields['tags'];            
//            $gestion->storeUpdateSerchEngine( $Itinerario,3,$formFields['id'],$search);
//        
//            
//
//            $returnHTML = ('/itinerario/' . $formFields['id']);
//        } else { //logica de insert
//            //Arreglo de inputs prestados que vienen del formulario
//            $object = $gestion->storeNewItinerario($formFields);
//            
//            //Gestion de nueva de busqueda    
//            $search=$formFields['nombre_itinerario']." ".$formFields['descripcion_itinerario'];            
//            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,3,$object->id);
//            
//            $returnHTML = ('/itinerario/' . $object->id);
//        }
//
//
//
//
//        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    //*******************************************************************************************//
    //                     CODIGO PARA GUARDAR UNA NUEVA ESPECIALIDAD                            //
    //*******************************************************************************************//
//     public function postEspecialidad(EspecialidadRepository $gestion) {
//
//        $inputData = Input::get('formData');
//        parse_str($inputData, $formFields);
//        
//        $object = $gestion->store($formFields);
//        $returnHTML = ('/especialidad/' . $object->id);
//        return response()->json(array('success' => true, 'redirectto' => $formFields));
//        //return response()->json(array('success' => true, 'redirectto' => $formFields));
//        
//        //return response()->json(array('success' => true, 'redirectto' => $especialidad));
//        
//          ////logica de insert
//          //Arreglo de inputs prestados que vienen del formulario
//          //$object = $gestion->storeNewEspecialidad($formFields);
//            
//          //Gestion de nueva de busqueda    
//          //$search=$formFields['nombre_especialidad']." ".$formFields['descripcion_especialidad'];            
//         //$gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,3,$object->id);
//          
//         //$returnHTML = ('/especialidad/' . $object->id);
//         
//        //return $formFields;
//        
//        //return response()->json(array('success' => true, 'redirectto' => $returnHTML));
//        
//        /*$permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);
//
//
//        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {
//
//            return view('errors.404');
//        }
//
//   
//        //obtengo las especialidades por id
//        if (isset($formFields['id'])) {
//            $Especialidad = $gestion->getEspecialidad($formFields['id']);
//        }
//        
//        //si ya existe el objeto se hace el update
//        if (isset($Especialidad)) {
//            //logica update
//
//            $gestion->storeUpdateItinerario($formFields, $Especialidad);
//            
//            //Gestion de actualizacion de busqueda    
//            $search=$formFields['nombre_especialidad']." ".$formFields['descripcion_especialidad']." ".$formFields['tags'];            
//            $gestion->storeUpdateSerchEngine($Especialidad,3,$formFields['id'],$search);
//        
//            $returnHTML = ('/especialidad/' . $formFields['id']);
//            
//        } else { 
//        
//            ////logica de insert
//            //Arreglo de inputs prestados que vienen del formulario
//            $object = $gestion->storeNewEspecialidad($formFields);
//            
//            //Gestion de nueva de busqueda    
//            $search=$formFields['nombre_especialidad']." ".$formFields['descripcion_especialidad'];            
//            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,3,$object->id);
//            
//            $returnHTML = ('/especialidad/' . $object->id);
//        }
//
//        return response()->json(array('success' => true, 'redirectto' => $returnHTML));*/
//    }
//    
    //*******************************************************************************************//
    //                     CODIGO PARA GUARDAR UNA NUEVA ESPECIALIDAD                            //
    //*******************************************************************************************//
        public function getEspecialidad(Guard $auth,$id, ServiciosOperadorRepository $gestion) {
        //
        $validacion = $gestion->getPermisoItinerario($id);
        if (isset($validacion))
        {$permiso = $gestion->getPermiso($validacion->id_usuario_servicio);}
        else
        {return view('errors.404');}

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

            return view('errors.404');
        }

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listItinerarios = $gestion->getItinerariosUsuario($id);

        foreach ($listItinerarios as $servicioBase) {

            $servicio = $gestion->getUsuario_serv($servicioBase->id_usuario_servicio);
        }

        //imagenes de la promocion
        
        $listDificultades = $gestion->getCatalogoDificultad();

        $view = view('Registro.editEspecialidad', compact( 'listItinerarios', 'listDificultades', 'servicio'));
        return ($view);
    }
}
