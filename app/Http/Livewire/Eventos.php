<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evento;

class Eventos extends Component
{
    // Variables públicas
    public $eventos;
    public $id_eventos;
    public $nombre_eventos;
    public $descripcion_eventos;
    public $lugar_eventos;
    public $fecha_eventos;
    public $hora_eventos;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->eventos = Evento::all();
        
        return view('livewire.eventos.eventos');
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
        $this->id_eventos = null;
        $this->nombre_eventos = '';
        $this->descripcion_eventos = '';
        $this->lugar_eventos = '';
        $this->fecha_eventos = null;
        $this->hora_eventos = null;
    }

    // Método para crear un nuevo evento
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un evento
    public function guardar()
    {
        Evento::updateOrCreate(['id_eventos' => $this->id_eventos], [
            'nombre_eventos' => $this->nombre_eventos,
            'descripcion_eventos' => $this->descripcion_eventos,
            'lugar_eventos' => $this->lugar_eventos,
            'fecha_eventos' => $this->fecha_eventos,
            'hora_eventos' => $this->hora_eventos,
        ]);

        session()->flash('message', $this->id_eventos ? '¡Evento actualizado exitosamente!' : '¡Evento creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un evento
    public function editar($id_eventos)
    {
        $evento = Evento::findOrFail($id_eventos);

        $this->id_eventos = $evento->id_eventos;
        $this->nombre_eventos = $evento->nombre_eventos;
        $this->descripcion_eventos = $evento->descripcion_eventos;
        $this->lugar_eventos = $evento->lugar_eventos;
        $this->fecha_eventos = $evento->fecha_eventos;
        $this->hora_eventos = $evento->hora_eventos;

        $this->abrirModal();
    }

    // Método para borrar un evento
    public function borrar($id_eventos)
    {
        Evento::find($id_eventos)->delete();

        session()->flash('message', '¡Evento eliminado correctamente!');
    }
}

