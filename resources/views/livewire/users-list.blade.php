<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Usuarios') }}
        </h2>
    </x-slot    
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card-component>
                @slot('title')
                <h1>Lista de usuarios</h1>                 
                @endslot

                @slot('html')
                <x-a href="{{route('user.create')}}" class="p-1 bg-green-600 hover:bg-green-800"> Crear</x-a>
                <div class="flex mt-1">
                    <x-jet-input wire:model="name" class="block w-full bg-gray-200"/>

                    <x-jet-secondary-button class="ml-2" wire:click="cleanFilter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                          </svg>

                    </x-jet-secondary-button>
                </div>

                <table class="w-full mb-3 table-auto">
                    <thead>
                        <tr>
                            <th class="p-3">ID</th>
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $u)
                        <tr>
                            <td class="p-3 border">{{ $u->id }}</td>
                            <td class="p-3 border">{{ $u->name }}</td>
                            <td class="p-3 border">{{ $u->email }}</td>
                            <td class="flex justify-center p-3 border">
                                <x-a class="p-1 mr-1 bg-blue-600" href="{{route('user.edit',$u->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </x-a>
                                <x-jet-danger-button class="p-sm-button" wire:click="delete({{ $u}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                </x-jet-danger-button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <p> No Hay Registros</p>
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                    
                </table>
                {{ $users->links() }}    
                @endslot
            </x-card-component>           
        </div>
    </div>
    
</div>

