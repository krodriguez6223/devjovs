<div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            @forelse ($vacantes as $vacante )
                    
                    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="space-y-3">
                            <a href="#" class="text-xl font-bold">
                                {{ $vacante->titulo }}
                            </a>
                            <p> {{ $vacante->empresa }} </p>
                            <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex gap-3 items-center mt-5 md:mt-0">
                            <a href="#"
                            class="bg-slate-800 py-1 px-3 rounded-lg text-white "
                            >Candidatos</a>
        
                            <a href="{{ route('vacantes.edit', $vacante->id) }}"
                            class="bg-blue-800 py-1 px-3 rounded-lg text-white "
                            ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg></a>
        
                            <button 
                                wire:click="$emit('mostrarAlerta', {{ $vacante->id }}) "
                                class="bg-red-600 py-1 px-3 rounded-lg text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                             </button>
                        </div>
                    </div>
        
            @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
            @endforelse
        
        </div>
        
        <div class=" mt-10">
            {{ $vacantes->links()}}      
        </div>
        @push('scripts')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>

            Livewire.on('mostrarAlerta', vacanteId =>[

                Swal.fire({
                        title: "¿Eliminar vacante?",
                        text: "Realmente desea eliminar ésta vacante!",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'No, Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                       
                            if (result.isConfirmed) {

                                //eliminar la vacante
                                Livewire.emit('eliminarVacante', vacanteId )
                                
                                Swal.fire(
                                'Eliminado!',
                                'La vacante ha sido eliminada.',
                                'success'
                                )
                        }
                    })
            ]);
        </script>

        @endpush

</div>

