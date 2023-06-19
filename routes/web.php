<?php

use App\Http\Livewire\HorariosCursos;
use App\Http\Livewire\Cursos;
use App\Http\Livewire\Servicios;
use App\Http\Livewire\ResponsabilidadesSociales;
use App\Http\Livewire\HorariosEmpleos;
use App\Http\Livewire\Empleos;
use App\Http\Livewire\BolsaEmpleos;
use App\Http\Livewire\EquiposLiderazgo;
use App\Http\Livewire\Nosotros;
use App\Http\Livewire\Contactos;
use App\Http\Livewire\Eventos;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/eventos', Eventos::class)->name('eventos');
    Route::get('/contactos', Contactos::class)->name('contactos');
    Route::get('/nosotros', Nosotros::class)->name('nosotros');
    Route::get('/equipoLiderazgo', EquiposLiderazgo::class)->name('equipo-liderazgo');
    Route::get('/bolsaEmpleos', BolsaEmpleos::class)->name('bolsa-empleos');
    Route::get('/empleos', Empleos::class)->name('empleos');
    Route::get('/horarioEmpleos', HorariosEmpleos::class)->name('horarios-empleos');
    Route::get('/responsabilidadesSociales', ResponsabilidadesSociales::class)->name('responsabilidades-sociales');
    Route::get('/servicios', Servicios::class)->name('servicios');
    Route::get('/cursos', Cursos::class)->name('cursos');
    Route::get('/horariosCursos', HorariosCursos::class)->name('horarios-cursos');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
