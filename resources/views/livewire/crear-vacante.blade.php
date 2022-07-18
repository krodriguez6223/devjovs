<div>
    <form class="w-full max-w-5xl">
       
        {{-- input de titulo de vacante --}}
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
           
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"                   for="titulo">
              Titulo vacante
            </label>
            <input 
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                id="titulo"
                name="titulo" 
                type="text" 
                :value="old('titulo')">
           
                <p class="text-gray-600 text-xs italic">Escriba el título de la vacante</p>
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
                  name="salario" 
                  :value="old('salario')">
                  <option >-- Seleccione --</option>
                  @foreach ($salarios as $salario )
                  <option value="{{ $salario->id }}" >{{ $salario->salario }}</option>
                      
                  @endforeach


                </select>
             
                  <p class="text-gray-600 text-xs italic">Escriba el salario del puesto</p>
            </div>

            {{-- Categoria --}}
            <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categoria">
                Categoría
              </label>
              <select
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                    id="categoria"
                    name="categoria" 
                    :value="old('categoria')">
            </select>
            <p class="text-gray-600 text-xs italic">Categoria del puesto</p>
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
                name="empresa"
                type="text"
                :value="old('empresa')">
            <p class="text-gray-600 text-xs italic">Escriba el nombre de la empresa</p>
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
                  name="ultimo_dia"
                  type="date"
                  :value="old('ultimo_dia')">
              <p class="text-gray-600 text-xs italic">selecione la fecha del último dia del puesto</p>
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
                  name="descripcion"
                  :value="old('descripcion')">
                </textarea>
              <p class="text-gray-600 text-xs italic">Describa el puesto de trabajo</p>
            </div>
        </div>

         {{-- Imagen --}}
         <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="imagen">
                Imagen
              </label>
              <input 
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="imagen"
                  name="imagen"
                  type="file">
              <p class="text-gray-600 text-xs italic">formatos de imagen permitidos: .jpg, .png, jpeg</p>
            </div>
          </div>
          <x-button>
            Crear vacante
          </x-button>
      </form>
      
</div>
 