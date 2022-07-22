<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    //variable message para mostrar errores en los formularios
    public $message;
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
