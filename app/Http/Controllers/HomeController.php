<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Jobs\ChangeLocale;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index(Guard $auth) {
        //	


        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        if ($auth->check()) {
            $user = $auth->user();
           // $view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
            return redirect('/servicios')->with('user', $user->id);
        } else {

            $view = view('auth.completeRegister');
        }
        return $view;
    }

    /**
     * Change language.
     *
     * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
     * @return Response
     */
    public function language(
    ChangeLocale $changeLocale) {
        $this->dispatch($changeLocale);

        return redirect()->back();
    }
    
    
            public function indexres(Guard $auth) {
        //	


        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        if ($auth->check()) {
            $user = $auth->user();
           // $view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
            return redirect('/serviciosres')->with('user', $user->id);
        } else {

            $view = view('responsive.completeRegister');
        }
        return $view;
    }


   

}
