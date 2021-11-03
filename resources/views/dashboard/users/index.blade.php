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
                <table>
                    <thead>
                        <tr>
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td class="p-3 border">{{ $u->name }}</td>
                            <td class="p-3 border">{{ $u->email }}</td>
                            <td class="p-3 border">
                                <x-a class="p-1">
                                   
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 bg-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                      </svg>
                                </x-a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>

                @endslot
            </x-card-component>

            
        </div>
    </div>
</x-app-layout>