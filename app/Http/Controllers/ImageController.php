<?php

namespace App\Http\Controllers;

use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    protected $image;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->image = $imageRepository;
    }

    public function getUpload()
    {
        return view('reusable.uploadImage');
    }

    public function postUpload()
    {
        $photo = Input::all();
        $response = $this->image->upload($photo);
        return $response;

    }

    public function deleteUpload()
    {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->delete( $filename );

        return $response;
    }
    
    
    public function postDeleteImage(ImageRepository $gestion) {



        $inputData = Input::get('formData');

        parse_str($inputData, $formFields);
        //Arreglo de servicios prestados que vienen del formulario
        //Arreglo de servicios prestados que vienen del formulario
        
        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if($value!="")
            $root_array[$key] = $value;
        }
        $idImage = $root_array['ids'];
        $Servicio = $gestion->getServiciosImageporId($idImage);
        if(isset($root_array['actionImage']))
        {
            $gestion->storeDescrFoto($root_array, $Servicio,$idImage);
            
        }
        else{
        
        $gestion->storeUpdateEstado($root_array, $Servicio);}

$returnHTML = ('/IguanaTrip/public/');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        
        
    }
    
    
       public function postDeleteImage1(ImageRepository $gestion) {

        $inputData = Input::get('formData');

        parse_str($inputData, $formFields);
        //Arreglo de servicios prestados que vienen del formulario
        //Arreglo de servicios prestados que vienen del formulario
        
        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if($value!="")
            $root_array[$key] = $value;
        }
        $idImage = $root_array['ids'];
        $Servicio = $gestion->getServiciosImageporId($idImage);
        if(isset($root_array['actionImage']))
        {
            $gestion->storeDescrFoto($root_array, $Servicio,$idImage);
            
        }
        
          if(isset($root_array['actionImageProfile']))
        {
            //print_r($Servicio);
            $gestion->storeProfileFoto($root_array, $Servicio[0]->id_usuario_servicio,$idImage);
            
        }
        else{
        
        $gestion->storeUpdateEstado($root_array, $Servicio);}

        $returnHTML = ('/edicionServicios');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        
        
    }

}