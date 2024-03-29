<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{   
   
    protected $listeners = ['eliminarVacante'];
    //eliminar una vacante
    public function eliminarVacante(Vacante $vacante )
    {
        $vacante->delete();
    }
    public function render()
    {   
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(3);
        
        return view('livewire.mostrar-vacantes', [

            'vacantes' => $vacantes
        
        ]);
    } 
}
