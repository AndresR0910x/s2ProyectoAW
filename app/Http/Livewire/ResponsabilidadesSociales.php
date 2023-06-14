<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\Curso;
use App\Models\HorarioCurso;
use App\Models\ResponsabilidadSocial;

class ResponsabilidadesSociales extends Component
{
    // Variables públicas
    public $responsabilidades;
    public $id_serv;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->responsabilidades = ResponsabilidadSocial::all();
        $serviciosDisponibles = Servicio::whereNotIn('id_serv', $this->responsabilidades->pluck('id_serv'))->get();
        
        return view('livewire.ResponsabilidadesSociales.responsabilidades-sociales', [
            'serviciosDisponibles' => $serviciosDisponibles
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
        $this->id_serv = null;
    }

    // Método para crear una nueva responsabilidad social
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar una responsabilidad social
    public function guardar()
    {
        ResponsabilidadSocial::create([
            'id_serv' => $this->id_serv,
        ]);

        session()->flash('message', '¡Responsabilidad social creada exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar una responsabilidad social
    public function editar($id_rs)
    {
        $responsabilidad = ResponsabilidadSocial::findOrFail($id_rs);

        $this->id_serv = $responsabilidad->id_serv;

        $this->abrirModal();
    }

    // Método para borrar una responsabilidad social
    public function borrar($id_rs)
    {
        ResponsabilidadSocial::find($id_rs)->delete();

        session()->flash('message', '¡Responsabilidad social eliminada correctamente!');
    }
}
