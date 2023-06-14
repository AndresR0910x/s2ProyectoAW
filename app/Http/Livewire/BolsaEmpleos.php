<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BolsaEmpleo;
use App\Models\Empleo;

class BolsaEmpleos extends Component
{
    // Definimos las variables
    public $bolsaEmpleos;
    public $nombre_empleo;

    public $empleos;
    public $id_bE;
    public $id_empleo;
    public $modal = false;

    public function render()
    {
        $this->bolsaEmpleos = BolsaEmpleo::all();
        $this->empleos = Empleo::all();
        
        return view('livewire.bolsaEmpleos.bolsa-empleos');
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
        $this->id_bE = null;
        $this->id_empleo = null;
    }

    public function editar($id)
    {
        $bolsaEmpleo = BolsaEmpleo::findOrFail($id);
        $this->id_bE = $bolsaEmpleo->id_bE;
        $this->id_empleo = $bolsaEmpleo->id_empleo;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        BolsaEmpleo::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        BolsaEmpleo::updateOrCreate(['id_bE' => $this->id_bE], [
            'id_empleo' => $this->id_empleo,
        ]);

        session()->flash('message', $this->id_bE ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}

