<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2" role="alert">
                   
                    <p class="font-bold"><span class="font-light">  {{ session('mensaje') }}</span></p>
                </div>
                
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <h1 class="text-2xl font-bold text-center my-10">Vacante: {{$vacante->titulo }}</h1>
                
                <div class="md:flex md:justify-center p-5">
                    <ul class="divide-y divide-gray-200 w-full">
                        
                        @forelse ($vacante->candidatos as $candidato )
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                    <p class="text-sm  text-gray-600"><span class="font-bold">Correo: </span>{{ $candidato->user->email }}</p>
                                    <p class="text-sm  text-gray-600"> <span class="font-bold">Dia de postulación: </span>{{ $candidato->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    <a  target="_blank"
                                        rel="noreferrer noopener"
                                        href="{{ asset('storage/cv/' . $candidato->cv ) }}"
                                       class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-200 
                                              ">
                                       Ver CV

                                    </a>

                                </div>
                            </li>
                        @empty
                            <p class="p-3 text-center text-sm text-gray-600">no hay candidatos a esta vacante</p>
                        @endforelse

                    </ul>
                    
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>