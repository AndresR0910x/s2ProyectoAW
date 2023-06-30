<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\evento;
use App\Models\horarioCurso;
use App\Models\horarioEmpleo;
use App\Models\responsabilidadSocial;
use App\Models\servicio;
use App\Models\BolsaEmpleo;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\empleo;
use App\Models\EquipoLiderazgo;

class HomeController extends Controller
{
    //
    public function index(){

    $dataEvento = $this->dataEvento()['dataEvento']; 
    $dataHorariosCursos = $this->dataHorariosCursos()['dataHorariosCursos'];
    $dataHoraiosEmpleos = $this->dataHoraiosEmpleos()['dataHoraiosEmpleos'];
    $dataResponsabilidadSocial = $this->dataResponsabilidadSocial()['dataResponsabilidadSocial'];
    $dataServicio = $this->dataServicio()['dataServicio'];
    $dataCursos = $this->dataCur()['dataCursos'];
    $dataEmpleos = $this->dataEmpleos()['dataEmpleos'];
    $dataContactos = $this->dataContac()['dataContactos']; 
    $dataBE = $this->bolsaEmpleos()['dataBE'];
    $dataEL = $this->dataLiderazgo()['dataEL'];

    
    return view('admin.index',[
        "dataCursos" => $dataCursos, 
        "dataEmpleos" =>$dataEmpleos,
        "dataContactos" => $dataContactos,
        "dataBE" => $dataBE, 
        "dataEL" => $dataEL,
        "dataEvento" => $dataEvento,
        "dataHorariosCursos" => $dataHorariosCursos, 
        "dataHoraiosEmpleos" =>$dataHoraiosEmpleos,
        "dataResponsabilidadSocial" => $dataResponsabilidadSocial, 
        "dataServicio" => $dataServicio
    ]);
    }
    public function dataEvento(){
        $dataEventos = evento::all();
        $cont  = 0;  
        foreach($dataEventos as $ev){
                $cont ++;
        }
        return (["dataEvento" => $cont]);
    }

    public function dataHorariosCursos(){
        $dataHorariosCursos = horarioCurso::all();
        $cont  = 0;  
        foreach($dataHorariosCursos as $HC){
                $cont ++;
        }
        return (["dataHorariosCursos" => $cont]);
    }

    public function dataHoraiosEmpleos(){
        $dataHoraiosEmpleos = horarioEmpleo::all();
        $cont  = 0;  
        foreach($dataHoraiosEmpleos as $HE){
                $cont ++;
        }
        return (["dataHoraiosEmpleos" => $cont]);
    }

    public function dataResponsabilidadSocial(){
        $dataResponsabilidadSocial =responsabilidadSocial::all();
        $cont = 0; 
        foreach($dataResponsabilidadSocial as $rS){
            $cont++; 
        }
        return (["dataResponsabilidadSocial" => $cont]); 
    }

    public function dataServicio(){
        $dataServicio = servicio::all();
        $cont = 0; 
        foreach($dataServicio as $se){
            $cont++; 
        }
        return (["dataServicio" => $cont]);
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

