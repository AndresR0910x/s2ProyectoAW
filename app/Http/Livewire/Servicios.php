<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\Curso;
use App\Models\HorarioCurso;

class Servicios extends Component
{
    // Variables públicas
    public $servicios;
    public $nombre_serv;
    public $id_curso;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->servicios = Servicio::all();
        $cursosDisponibles = Curso::whereNotIn('id_curso', $this->servicios->pluck('id_curso'))->get();
        
        return view('livewire.servicios.servicios', [
            'cursosDisponibles' => $cursosDisponibles
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
        $this->nombre_serv = '';
        $this->id_curso = null;
    }

    // Método para crear un nuevo servicio
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un servicio
    public function guardar()
    {
        Servicio::create([
            'nombre_serv' => $this->nombre_serv,
            'id_curso' => $this->id_curso,
        ]);

        session()->flash('message', '¡Servicio creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un servicio
    public function editar($id_serv)
    {
        $servicio = Servicio::findOrFail($id_serv);

        $this->nombre_serv = $servicio->nombre_serv;
        $this->id_curso = $servicio->id_curso;

        $this->abrirModal();
    }

    // Método para borrar un servicio
    public function borrar($id_serv)
    {
        Servicio::find($id_serv)->delete();

        session()->flash('message', '¡Servicio eliminado correctamente!');
    }
}

