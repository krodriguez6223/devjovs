<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificaciónController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        $notificaciones = auth()->user()->unreadNotifications;

        //limpiar notificaciones una vez vistas es decir al recargar la pagina
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',[
            'notificaciones' => $notificaciones
        ]);
    }
}
