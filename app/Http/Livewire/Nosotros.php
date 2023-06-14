<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\About;
use App\Models\EquipoLiderazgo;

class Nosotros extends Component
{
    // Variables públicas
    public $nosotros;
    public $id_nosotros;
    public $mision_nosotros;
    public $vision_nosotros;
    public $valores_nosotros;
    public $historia_nosotros;
    public $id_eL;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->nosotros = About::all();
        $equipoLiderazgoDisponible = EquipoLiderazgo::whereNotIn('id_eL', $this->nosotros->pluck('id_eL'))->get();

        return view('livewire.nosotros.nosotros', [
            'equipoLiderazgoDisponible' => $equipoLiderazgoDisponible
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
        $this->id_nosotros = null;
        $this->mision_nosotros = '';
        $this->vision_nosotros = '';
        $this->valores_nosotros = '';
        $this->historia_nosotros = '';
        $this->id_eL = null;
    }

    // Método para crear un nuevo registro de Nosotros
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un registro de Nosotros
    public function guardar()
    {
        About::updateOrCreate(['id_nosotros' => $this->id_nosotros], [
            'mision_nosotros' => $this->mision_nosotros,
            'vision_nosotros' => $this->vision_nosotros,
            'valores_nosotros' => $this->valores_nosotros,
            'historia_nosotros' => $this->historia_nosotros,
            'id_eL' => $this->id_eL,
        ]);

        session()->flash('message', $this->id_nosotros ? '¡Registro de Nosotros actualizado exitosamente!' : '¡Registro de Nosotros creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un registro de Nosotros
    public function editar($id_nosotros)
    {
        $registroNosotros = About::findOrFail($id_nosotros);

        $this->id_nosotros = $registroNosotros->id_nosotros;
        $this->mision_nosotros = $registroNosotros->mision_nosotros;
        $this->vision_nosotros = $registroNosotros->vision_nosotros;
        $this->valores_nosotros = $registroNosotros->valores_nosotros;
        $this->historia_nosotros = $registroNosotros->historia_nosotros;
        $this->id_eL = $registroNosotros->id_eL;

        $this->abrirModal();
    }

    // Método para borrar un registro de Nosotros
    public function borrar($id_nosotros)
    {
        About::find($id_nosotros)->delete();

        session()->flash('message', '¡Registro de Nosotros eliminado correctamente!');
    }
}
