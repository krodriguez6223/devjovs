<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2" role="alert">
                    <p class="font-bold"><span class="font-light">  {{ session('mensaje') }}</span></p>
                </div>
            @endif
            
            <h1 class="text-2xl font-bold text-center my-10">Mis notificaciones</h1>
           
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="divide-y divide-gray-200">

                    @forelse ($notificaciones as $notificacion )
                    <div class="p-5 lg:flex lg:justify-between lg:items-center">
                        <div>
                            <p class="font-bold">Tienes un nuevo candidato en:
                                <span>{{ $notificacion->data['nombre_vacante'] }}</span>
                            </p>
                            <p>
                                 <span>{{ $notificacion->created_at->diffForHumans() }}</span>
                            </p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a class="bg-cyan-600 p-3  text-sm uppercase text-white rounded-lg" 
                                       href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}">Ver candidatos
                                    </a>
                        </div>
                     </div>
                    @empty
                            <p class="text-center text-gray-600">No hay notificaciones</p>
                    @endforelse
                </div>
                        
            </div>
        </div>  
    </div>
</x-app-layout>