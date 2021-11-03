<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <x-card-component>
                @slot('title')
                    Usuarios
                    
                @endslot

                @slot('html')
                
                    <livewire:users-list></livewire:users-list>
                   
                @endslot
            </x-card-component>

            
        </div>
    </div>
</x-app-layout>
