<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-10 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center mb-10">Publicar Vacantes</h1>
                    
                        <livewire:crear-vacante /> 

                </div>
            </div>
        </div>
    </div>
</x-app-layout>