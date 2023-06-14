<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HorarioEmpleo;

class HorariosEmpleos extends Component
{
    // Definimos las variables
    public $horariosEmpleos;
    public $id_hE;
    public $dia_hE;
    public $mes_hE;
    public $horas_hE;
    public $horaInicio_hE;
    public $horaFinalizacion_hE;
    public $modal = false;

    public function render()
    {
        $this->horariosEmpleos = HorarioEmpleo::all();
        return view('livewire.horariosEmpleos.horarios-empleos');
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
        $this->id_hE = null;
        $this->dia_hE = null;
        $this->mes_hE = null;
        $this->horas_hE = null;
        $this->horaInicio_hE = null;
        $this->horaFinalizacion_hE = null;
    }

    public function editar($id)
    {
        $horarioEmpleo = HorarioEmpleo::findOrFail($id);
        $this->id_hE = $horarioEmpleo->id_hE;
        $this->dia_hE = $horarioEmpleo->dia_hE;
        $this->mes_hE = $horarioEmpleo->mes_hE;
        $this->horas_hE = $horarioEmpleo->horas_hE;
        $this->horaInicio_hE = $horarioEmpleo->horaInicio_hE;
        $this->horaFinalizacion_hE = $horarioEmpleo->horaFinalizacion_hE;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        HorarioEmpleo::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        HorarioEmpleo::updateOrCreate(['id_hE' => $this->id_hE], [
            'dia_hE' => $this->dia_hE,
            'mes_hE' => $this->mes_hE,
            'horas_hE' => $this->horas_hE,
            'horaInicio_hE' => $this->horaInicio_hE,
            'horaFinalizacion_hE' => $this->horaFinalizacion_hE,
        ]);

        session()->flash('message', $this->id_hE ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
