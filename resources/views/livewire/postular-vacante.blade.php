
    {{-- mensaje de notificacion--}}
    <div class="bg-cyan-500 p-5 mt-10 flex flex-col justify-center items-center sm:rounded-lg">
        <h3 class="text-center text-2xl font-bold my-4 text-white">Postularme a esta vacante</h3>
    @if (session()->has('mensaje'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2" role="alert">
        <p class="font-bold"><span class="font-light">  {{ session('mensaje') }}</span></p>
    </div>   
    @else
        @auth
            <form  wire:submit.prevent='postularme' class="w-96 mt-5">
                <div class="mb-4">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"                   for="titulo">
                        Titulo vacante
                    </label>
                    <input 
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        id="cv"
                        accept=".pdf"
                        wire:model="cv"
                        type="file">
                        <p class="text-white text-xs italic">Suba su hoja de vida en formato PDF</p>
        
                </div>
                    @error('cv')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
        
                    <x-button class="my-5 bg-cyan-800">
                        {{__('Postularme')}}
                    </x-button>
            </form>
        @endauth

    @endif
  
</div>
