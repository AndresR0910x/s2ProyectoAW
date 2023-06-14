<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HorarioCurso;

class HorariosCursos extends Component
{
    // Definimos las variables
    public $horariosCursos;
    public $id_hC;
    public $dia_hE;
    public $mes_hE;
    public $horaInicio_hE;
    public $horaFinalizacion_hE;
    public $totalHoras_hC;
    public $modal = false;

    public function render()
    {
        $this->horariosCursos = HorarioCurso::all();
        return view('livewire.horariosCursos.horarios-cursos');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->id_hC = null;
        $this->dia_hE = null;
        $this->mes_hE = null;
        $this->horaInicio_hE = null;
        $this->horaFinalizacion_hE = null;
        $this->totalHoras_hC = null;
    }

    public function editar($id)
    {
        $horarioCurso = HorarioCurso::findOrFail($id);
        $this->id_hC = $horarioCurso->id_hC;
        $this->dia_hE = $horarioCurso->dia_hE;
        $this->mes_hE = $horarioCurso->mes_hE;
        $this->horaInicio_hE = $horarioCurso->horaInicio_hE;
        $this->horaFinalizacion_hE = $horarioCurso->horaFinalizacion_hE;
        $this->totalHoras_hC = $horarioCurso->totalHoras_hC;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        HorarioCurso::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        HorarioCurso::updateOrCreate(['id_hC' => $this->id_hC], [
            'dia_hE' => $this->dia_hE,
            'mes_hE' => $this->mes_hE,
            'horaInicio_hE' => $this->horaInicio_hE,
            'horaFinalizacion_hE' => $this->horaFinalizacion_hE,
            'totalHoras_hC' => $this->totalHoras_hC,
        ]);

        session()->flash('message', $this->id_hC ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
