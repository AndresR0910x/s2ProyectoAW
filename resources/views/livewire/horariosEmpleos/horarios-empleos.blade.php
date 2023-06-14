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
                @include('livewire.horariosEmpleos.crear-horarios-empleos')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Día</th>
                        <th class="px-4 py-2">Mes</th>
                        <th class="px-4 py-2">Horas</th>
                        <th class="px-4 py-2">Hora de Inicio</th>
                        <th class="px-4 py-2">Hora de Finalización</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($horariosEmpleos as $horarioEmpleo)
                        <tr>
                            <td class="border px-4 py-2">{{ $horarioEmpleo->dia_hE }}</td>
                            <td class="border px-4 py-2">{{ $horarioEmpleo->mes_hE }}</td>
                            <td class="border px-4 py-2">{{ $horarioEmpleo->horas_hE }}</td>
                            <td class="border px-4 py-2">{{ $horarioEmpleo->horaInicio_hE }}</td>
                            <td class="border px-4 py-2">{{ $horarioEmpleo->horaFinalizacion_hE }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $horarioEmpleo->id_hE }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="borrar({{ $horarioEmpleo->id_hE }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
