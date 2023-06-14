<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contacto;

class Contactos extends Component
{
    // Variables públicas
    public $contactos;
    public $id_contac;
    public $tel_contac;
    public $email_contact;
    public $direccion_contact;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->contactos = Contacto::all();
        
        return view('livewire.contactos.contactos');
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
        $this->id_contac = null;
        $this->tel_contac = '';
        $this->email_contact = '';
        $this->direccion_contact = '';
    }

    // Método para crear un nuevo contacto
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un contacto
    public function guardar()
    {
        Contacto::updateOrCreate(['id_contac' => $this->id_contac], [
            'tel_contac' => $this->tel_contac,
            'email_contact' => $this->email_contact,
            'direccion_contact' => $this->direccion_contact,
        ]);

        session()->flash('message', $this->id_contac ? '¡Contacto actualizado exitosamente!' : '¡Contacto creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un contacto
    public function editar($id_contac)
    {
        $contacto = Contacto::findOrFail($id_contac);

        $this->id_contac = $contacto->id_contac;
        $this->tel_contac = $contacto->tel_contac;
        $this->email_contact = $contacto->email_contact;
        $this->direccion_contact = $contacto->direccion_contact;

        $this->abrirModal();
    }

    // Método para borrar un contacto
    public function borrar($id_contac)
    {
        Contacto::find($id_contac)->delete();

        session()->flash('message', '¡Contacto eliminado correctamente!');
    }
}
