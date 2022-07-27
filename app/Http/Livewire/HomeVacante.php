<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacante extends Component
{   
    public $termino;
    public $salario;
    public $categoria;

    //escucha de la funcion leeFormulario el emit 'termino busqueda' y le asocia la funcion buscar
    protected $listeners = ['terminosBuquedas' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
       $this->termino = $termino;
       $this->categoria = $categoria;
       $this->salario = $salario;
    }

    public function render() 
    {   
        $vacantes = Vacante::when($this->termino, function($query){
            
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%" );
        })
            ->when($this->termino, function($query){
            $query->orWhere('empresa', 'LIKE', '%' . $this->termino . "%");  
        })
            ->when($this->termino, function($query){
            $query->where('categoria_id', 'LIKE', '%' . $this->categoria);  
        })
            ->when($this->salario, function($query){
            $query->where('salario_id', 'LIKE', '%' . $this->salario);   
        })
        
        ->paginate(20);

        return view('livewire.home-vacante', [
            
            'vacantes' => $vacantes
        ]);
    }
}
