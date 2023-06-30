<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\evento;
use App\Models\horarioCurso;
use App\Models\horarioEmpleo;
use App\Models\responsabilidadSocial;
use App\Models\servicio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

    $dataEventos = $this->dataEventos()['dataEventos']; 
    $dataHorariosCursos = $this->dataHorariosCursos()['dataHorariosCursos'];
    $dataHoraiosEmpleos = $this->dataHoraiosEmpleos()['dataHoraiosEmpleos'];
    $dataResponsabilidadSocial = $this->dataResponsabilidadSocial()['dataResponsabilidadSocial'];
    $dataServicio = $this->dataServicio()['dataServicio'];

    return view('admin.index', [
        "dataEventos" => $dataEventos,
        "dataHorariosCursos" => $dataHorariosCursos, 
        "dataHoraiosEmpleos" =>$dataHoraiosEmpleos,
        "dataResponsabilidadSocial" => $dataResponsabilidadSocial, 
        "dataServicio" => $dataServicio

    ]);
    }

    public function dataEventos(){
        $dataEventos = evento::all();
        $cont  = 0;  
        foreach($dataEventos as $ev){
                $cont ++;
        }
        return (["dataEventos" => $cont]);
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
}

