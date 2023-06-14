<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

        @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
        @endif


        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3" >Nuevo</button>
        @if($modal)
            @include('livewire.horariosCursos.crear-horarios-cursos')   
        @endif    

        <table class="table-fixed w-full">
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="px-4 py-2">Día</th>
                <th class="px-4 py-2">Mes</th>
                <th class="px-4 py-2">Hora de Inicio</th>
                <th class="px-4 py-2">Hora de Finalización</th>
                <th class="px-4 py-2">Total de Horas</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($horariosCursos as $horarioCurso)
            <tr>
                <td class="border px-4 py-2">{{ $horarioCurso->dia_hE }}</td>
                <td class="border px-4 py-2">{{ $horarioCurso->mes_hE }}</td>
                <td class="border px-4 py-2">{{ $horarioCurso->horaInicio_hE }}</td>
                <td class="border px-4 py-2">{{ $horarioCurso->horaFinalizacion_hE }}</td>
                <td class="border px-4 py-2">{{ $horarioCurso->totalHoras_hC }}</td>
                <td class="border px-4 py-2 text-center">
                    <button wire:click="editar({{ $horarioCurso->id_hC }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                    <button wire:click="borrar({{ $horarioCurso->id_hC }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
