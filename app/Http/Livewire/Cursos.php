<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curso;
use App\Models\HorarioCurso;

class Cursos extends Component
{
    // Variables públicas
    public $cursos;
    public $id_curso;
    public $nombre_curso;
    public $duracion_curso;
    public $instructor_curso;
    public $descripcion_curso;
    public $id_hC;
    public $modal = false;

    // Método render
    public function render()
    {
        $this->cursos = Curso::all();
        $horariosDisponibles = HorarioCurso::whereNotIn('id_hC', $this->cursos->pluck('id_hC'))->get();
        
        return view('livewire.Cursos.cursos',[
            'horariosDisponibles' =>  $horariosDisponibles
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
        $this->id_curso = null;
        $this->nombre_curso = '';
        $this->duracion_curso = null;
        $this->instructor_curso = '';
        $this->descripcion_curso = '';
        $this->id_hC = null;
    }

    // Método para crear un nuevo curso
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    // Método para guardar un curso
    public function guardar()
    {
        Curso::updateOrCreate(['id_curso' => $this->id_curso], [
            'nombre_curso' => $this->nombre_curso,
            'duracion_curso' => $this->duracion_curso,
            'instructor_curso' => $this->instructor_curso,
            'descripcion_curso' => $this->descripcion_curso,
            'id_hC' => $this->id_hC,
        ]);

        session()->flash('message', $this->id_curso ? '¡Curso actualizado exitosamente!' : '¡Curso creado exitosamente!');

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    // Método para editar un curso
    public function editar($id_curso)
    {
        $curso = Curso::findOrFail($id_curso);

        $this->id_curso = $curso->id_curso;
        $this->nombre_curso = $curso->nombre_curso;
        $this->duracion_curso = $curso->duracion_curso;
        $this->instructor_curso = $curso->instructor_curso;
        $this->descripcion_curso = $curso->descripcion_curso;
        $this->id_hC = $curso->id_hC;

        $this->abrirModal();
    }

    // Método para borrar un curso
    public function borrar($id_curso)
    {
        Curso::find($id_curso)->delete();

        session()->flash('message', '¡Curso eliminado correctamente!');
    }
}
