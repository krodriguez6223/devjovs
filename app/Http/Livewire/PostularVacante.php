<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{   
    public $cv;
    public $vacante;
    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
    public function postularme()
    {
        $datos = $this->validate();

        //Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);
        
        //Crear el candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);
        
        //Crear la notificacion y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato( $this->vacante->id, $this->vacante->titulo, auth()->user()->id ));
       
        //redireccionar al usuario
        session()->flash('mensaje', 'Se envió correctamenta la postulación, mucha suerte');
        return redirect()->back();                                                                  

        //Mostrar el usuario un mensaje de ok
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
