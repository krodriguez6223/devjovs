<div class="p-10">
    <div class="mb-5">
            <h3 class="font-bold text-2xl text-gray-800 my-3">

                {{ $vacante->titulo }}
            </h3>

           <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-10 sm:rounded-lg">
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Empresa: 
                    <span class="normal-case font-normal"> {{ $vacante->empresa }}</span>
                 </p>
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Último día para postularse: 
                    <span class="normal-case font-normal"> {{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
                 </p>
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Categoría: 
                    <span class="normal-case font-normal"> {{ $vacante->categoria->categoria }}</span>
                 </p>
                <p class="font-bold text-sm uppercase text-gray-800 my-3">
                    Sueldo: 
                    <span class="normal-case font-normal"> {{ $vacante->salario->salario }}</span>
                 </p>
           </div>
           <div class="md:grid md:grid-cols-6 bg-gray-100 p-4 my-10 sm:rounded-lg">
                <div class="md:col-span-4">
                    <p class="font-bold text-sm uppercase text-gray-800 my-3">
                        Descripción: 
                        <span class="normal-case font-normal"> {{ $vacante->descripcion }}</span>
                     </p>
                </div>
                <div class="md:col-span-2">
                    <p class="font-bold text-sm uppercase text-gray-800 my-3">
                       <img src="{{ asset('storage/vacantes/'. $vacante->imagen) }}" alt="{{ 'imagen vacante'. $vacante->titulo }}">
                     </p>
                </div>
            </div>
            @guest
                <div class="mt-5 bg-gray-100 border-dashed p-5 text-center">
                    <p>
                        ¿Desea aplicar a esta vacante? <a class="font-bold text-cyan-600" href="{{ route('register') }}">Obtener una cuenta y aplicar a otras ofertas</a>
                    </p>
                  </div>

            @endguest
             {{-- cannont sirve para restringir acceso, en este caso solo mostrara el fromulario a los dev  --}}
            @cannot('create', App\Models\Vacante::class)            
                 <livewire:postular-vacante :vacante="$vacante" />
            @endcannot
    </div>
    
</div>
