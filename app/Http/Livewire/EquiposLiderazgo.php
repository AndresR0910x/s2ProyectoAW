<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EquipoLiderazgo;

class EquiposLiderazgo extends Component
{
    // Variables públicas
    public $equiposLiderazgo;
    public $id_eL;
    public $nombre_eL;
    public $cargo_eL;
    public $experiencia_eL;
    public $descripcion_eL;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->equiposLiderazgo = EquipoLiderazgo::all();
        
        return view('livewire.equipoLiderazgo.equipos-liderazgo');
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
        $this->id_eL = null;
        $this->nombre_eL = '';
        $this->cargo_eL = '';
        $this->experiencia_eL = null;
        $this->descripcion_eL = '';
    }

    // Método para crear un nuevo equipo de liderazgo
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un equipo de liderazgo
    public function guardar()
    {
        EquipoLiderazgo::updateOrCreate(['id_eL' => $this->id_eL], [
            'nombre_eL' => $this->nombre_eL,
            'cargo_eL' => $this->cargo_eL,
            'experiencia_eL' => $this->experiencia_eL,
            'descripcion_eL' => $this->descripcion_eL,
        ]);

        session()->flash('message', $this->id_eL ? '¡Equipo de liderazgo actualizado exitosamente!' : '¡Equipo de liderazgo creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un equipo de liderazgo
    public function editar($id_eL)
    {
        $equipoLiderazgo = EquipoLiderazgo::findOrFail($id_eL);

        $this->id_eL = $equipoLiderazgo->id_eL;
        $this->nombre_eL = $equipoLiderazgo->nombre_eL;
        $this->cargo_eL = $equipoLiderazgo->cargo_eL;
        $this->experiencia_eL = $equipoLiderazgo->experiencia_eL;
        $this->descripcion_eL = $equipoLiderazgo->descripcion_eL;

        $this->abrirModal();
    }

    // Método para borrar un equipo de liderazgo
    public function borrar($id_eL)
    {
        EquipoLiderazgo::find($id_eL)->delete();

        session()->flash('message', '¡Equipo de liderazgo eliminado correctamente!');
    }
}
