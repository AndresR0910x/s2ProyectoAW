<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if(session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
            @if($modal)
                @include('livewire.nosotros.crear-nosotros')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Misión</th>
                        <th class="px-4 py-2">Visión</th>
                        <th class="px-4 py-2">Valores</th>
                        <th class="px-4 py-2">Historia</th>
                        <th class="px-4 py-2">Líder</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nosotros as $registroNosotros)
                        <tr>
                            <td class="border px-4 py-2">{{ $registroNosotros->mision_nosotros }}</td>
                            <td class="border px-4 py-2">{{ $registroNosotros->vision_nosotros }}</td>
                            <td class="border px-4 py-2">{{ $registroNosotros->valores_nosotros }}</td>
                            <td class="border px-4 py-2">{{ $registroNosotros->historia_nosotros }}</td>
                            <td class="border px-4 py-2">{{ $registroNosotros->equipoLiderazgo->nombre_eL }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $registroNosotros->id_nosotros }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="borrar({{ $registroNosotros->id_nosotros }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
