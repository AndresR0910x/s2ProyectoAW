<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BolsaEmpleo;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Empleo;
use App\Models\EquipoLiderazgo;

class HomeController extends Controller
{
    //
    public function index(){


        

        

    $dataCursos = $this->dataCur()['dataCursos'];
    $dataEmpleos = $this->dataEmpleos()['dataEmpleos'];
    $dataContactos = $this->dataContac()['dataContactos']; 
    $dataBE = $this->bolsaEmpleos()['dataBE'];
    $dataEL = $this->dataLiderazgo()['dataEL'];

    return view('admin.index', [
        "dataCursos" => $dataCursos, 
        "dataEmpleos" =>$dataEmpleos,
        "dataContactos" => $dataContactos,
        "dataBE" => $dataBE, 
        "dataEL" => $dataEL

    ]);
    }

    public function dataCur(){
        $cursos = Curso::all(); 
        $puntos = []; 

        foreach($cursos as $curso){
            $puntos[] = [
                $curso['nombre_curso'], 
                $curso['duracion_curso']
            ];
        }
        
        return (["dataCursos" => json_encode($puntos)]);
    }

    public function dataEmpleos(){
        $empleos = Empleo::all(); 
        $puntos = []; 
        foreach($empleos as $empleo){
            $puntos[] = [ 
                'name' => $empleo['nombre_empleo'], 
                'y' => $empleo['vacantes']
            ]; 
        }
        return (["dataEmpleos" => json_encode($puntos)]);
    }


    public function dataContac(){
        $equipoLiderazgo = EquipoLiderazgo::all();
        $cont  = 0;  
        foreach($equipoLiderazgo as $el){
                $cont ++;
        }
        return (["dataContactos" => $cont]);
    }

    public function bolsaEmpleos(){
        $bolsaEmpleos =BolsaEmpleo::all();
        $cont = 0; 
        foreach($bolsaEmpleos as $bE){
            $cont++; 
        }
        return (["dataBE" => $cont]); 
    }

    public function dataLiderazgo(){
        $eLiderazgo =EquipoLiderazgo::all();
        $cont = 0; 
        foreach($eLiderazgo as $bE){
            $cont++; 
        }
        return (["dataEL" => $cont]); 
    }
}
