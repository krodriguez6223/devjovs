<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2" role="alert">
                   
                    <p class="font-bold"><span class="font-light">  {{ session('mensaje') }}</span></p>
                </div>
                
            @endif

          <livewire:mostrar-vacantes />
        </div>  
    </div>
</x-app-layout>