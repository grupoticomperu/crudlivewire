<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>



    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card-component>



                @slot('title')

                <h1>Crear Usuario</h1>
    
               <!--  <input type="text" wire:model="name"> -->
               
            
                                
               
                @endslot

                @slot('html')

                    @if($msj)
                    {{ $msj }}                    
                    @endif


                    <form wire:submit.prevent="submit" class="max-w-screen-md m-auto">
                        <x-jet-label>Nombre</x-jet-label>
                        <x-jet-input type="text" class="w-full mb-2" wire:model="name" placeholder="nombre"/>
                        @error('name')
                            {{ $message }}
                        @enderror

                        <x-jet-label>Email</x-jet-label>
                        <x-jet-input type="email" class="w-full mb-2" wire:model="email" placeholder="email"/>
                        @error('email')
                            {{ $message }}
                        @enderror

                        <x-jet-label>Password</x-jet-label>
                        <x-jet-input type="password" class="w-full mb-2" wire:model="password" placeholder="password"/>
                        @error('name')
                            {{ $password }}
                        @enderror

                        <x-jet-label>Avatar</x-jet-label>
                        <x-jet-input type="file" class="w-full mb-2" wire:model="avatar"/>
                        @error('avatar')
                            {{ $message }}
                        @enderror

                        <x-jet-danger-button type="submit" class="mt-2">
                            
                            gravar
                            
                        </x-jet-danger-button>
                    </form>
   
                @endslot

            </x-card-component>

            
        </div>
    </div>
    
</div>


