<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Catalogo_Servicio;

class CatalogoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        
         $catalogos = Catalogo_Servicio::All();

        $html = View::make('countries.list', compact('countries'))->render();

        return Response::json(['html' => $html]);
    }
}