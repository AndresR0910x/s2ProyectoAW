<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleo;
use App\Models\HorarioEmpleo;

class Empleos extends Component
{
    // Variables públicas
    public $empleos;
    public $id_empleo;
    public $nombre_empleo;
    public $titulos_empleo;
    public $experiencia_empleo;
    public $vacantes;
    public $id_hE;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->empleos = Empleo::all();
        $horariosDisponibles = HorarioEmpleo::whereNotIn('id_hE', $this->empleos->pluck('id_hE'))->get();
        
        return view('livewire.empleos.empleos', [
            'horariosDisponibles' => $horariosDisponibles
        ]);
    }

    // Método para abrir el modal
    public function abrirModal()
    {
        $this->modal = true;
    }

    // Método para cerrar el modal
    public function cerrarModal()
    {
        $this->modal = false;
    }

    // Método para limpiar los campos
    public function limpiarCampos()
    {
        $this->id_empleo = null;
        $this->nombre_empleo = '';
        $this->titulos_empleo = '';
        $this->experiencia_empleo = null;
        $this->vacantes = null;
        $this->id_hE = null;
    }

    // Método para crear un nuevo empleo
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un empleo
    public function guardar()
    {
        Empleo::updateOrCreate(['id_empleo' => $this->id_empleo], [
            'nombre_empleo' => $this->nombre_empleo,
            'titulos_empleo' => $this->titulos_empleo,
            'experiencia_empleo' => $this->experiencia_empleo,
            'vacantes' => $this->vacantes,
            'id_hE' => $this->id_hE,
        ]);

        session()->flash('message', $this->id_empleo ? '¡Empleo actualizado exitosamente!' : '¡Empleo creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un empleo
    public function editar($id_empleo)
    {
        $empleo = Empleo::findOrFail($id_empleo);

        $this->id_empleo = $empleo->id_empleo;
        $this->nombre_empleo = $empleo->nombre_empleo;
        $this->titulos_empleo = $empleo->titulos_empleo;
        $this->experiencia_empleo = $empleo->experiencia_empleo;
        $this->vacantes = $empleo->vacantes;
        $this->id_hE = $empleo->id_hE;

        $this->abrirModal();
    }

    // Método para borrar un empleo
    public function borrar($id_empleo)
    {
        Empleo::find($id_empleo)->delete();

        session()->flash('message', '¡Empleo eliminado correctamente!');
    }
}
