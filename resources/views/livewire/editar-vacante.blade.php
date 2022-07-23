<div>
    <form class="w-full max-w-5xl" wire:submit.prevent='editarVacante'>
       
        {{-- input de titulo de vacante --}}
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
           
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"                   for="titulo">
              Titulo vacante
            </label>
            <input 
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                id="titulo"
                wire:model="titulo" 
                type="text" 
                :value="old('titulo')">
              
                <p class="text-gray-600 text-xs italic">Escriba el título de la vacante</p>

                @error('titulo')
                 <livewire:mostrar-alerta :message="$message" />
                @enderror
           
          </div>
        </div>

        {{-- Salario de vacante --}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
             
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="salario">
                Salario Mensual
              </label>
              <select
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                  id="salario"
                  wire:model="salario" 
                  :value="old('salario')">

                  <option >-- Seleccione --</option>
                  @foreach ($salarios as $salario )

                  <option value="{{ $salario->id }}" >{{ $salario->salario }}</option>
                      
                  @endforeach

                </select>
             
                  <p class="text-gray-600 text-xs italic">Escriba el salario del puesto</p>
                 
                  @error('salario')
                  <livewire:mostrar-alerta :message="$message" />
                  @enderror
            </div>

            {{-- Categoria --}}
            <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categoria">
                Categoría
              </label>
              <select
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                    id="categoria"
                    wire:model="categoria" 
                    :value="old('categoria')">
                  
                    <option >-- Seleccione --</option>
                   
                    @foreach ($categorias as $categoria )
                   
                    <option value="{{ $categoria->id }}" >{{ $categoria->categoria }}</option>
                        
                    @endforeach
            </select>
            <p class="text-gray-600 text-xs italic">Categoria del puesto</p>

            @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
            @enderror

            </div>
        </div>

          {{-- Nombre de la empresa --}}
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="empresa">
              Empresa
            </label>
            <input 
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="empresa"
                wire:model="empresa"
                type="text"
                :value="old('empresa')">
            <p class="text-gray-600 text-xs italic">Escriba el nombre de la empresa</p>
            
            @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
             @enderror

          </div>
        </div>

         {{-- Dia de postulacion --}}
         <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ultimo_dia">
              Último día de postulación
              </label>
              <input 
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ultimo_dia"
                  wire:model="ultimo_dia"
                  type="date"
                  :value="old('ultimo_dia')">
              <p class="text-gray-600 text-xs italic">selecione la fecha del último dia del puesto</p>
             
              @error('ultimo_dia')
              <livewire:mostrar-alerta :message="$message" />
              @enderror

            </div>
          </div>

          {{-- Decripcion --}}
         <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="descripcion">
              Descripción del puesto
              </label>
             
              <textarea
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-32 " id="descripcion"
                  wire:model="descripcion"
                  :value="old('descripcion')">
                </textarea>
              <p class="text-gray-600 text-xs italic">Describa el puesto de trabajo</p>

            </div>
        </div>

         <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="imagen">
                Imagen Actual
              </label>
              <input 
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="imagen"
                  wire:model="imagen_nueva"
                  accept="image/*"
                  type="file">
              <p class="text-gray-600 text-xs italic">formatos de imagen permitidos: .jpg, .png, jpeg</p>
              
              <div class="my-5 w-80">
                           
                    <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante' . $titulo }}">
                 
              </div>
              <div class="my-5 w-80">
               
                  @if ($imagen_nueva)
                  
                    Imagen nueva:
                    <img src="{{ $imagen_nueva->temporaryUrl() }}">
                   
                    @endif
              </div>

              @error('imagen_nueva')
              <livewire:mostrar-alerta :message="$message" />
              @enderror

            </div>
          </div>
          <x-button>
           Actulizar vacante
          </x-button>
      </form>
      
</div>
 
