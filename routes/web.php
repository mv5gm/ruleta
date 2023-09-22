<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Fecha;
use App\Models\Sorteo;
use App\Models\Banca;
use App\Models\resultado;
use App\Models\Apuesta;
use App\Models\Animalito;
use App\Models\Contabilidad;
use App\Models\Ticket;
use Spatie\Permission\Models\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return redirect()->route('login');

    //return view('welcome');

})->middleware('auth');

Route::get('/pruebas', function () {
   	$perfil = User::where('id',Auth::id())->with('bancas')->get();
   	return $perfil[0]->bancas[0]->id;
   	//$user = User::find('2');
   	//return !password_verify( '1234567','$2y$10$KPlZDE6jG46GLjFlL5JV8e5X01iXE2jA.t9wPzEAzpG3DztRxTd8K' );
});
	
Auth::routes();
	
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/imprimirTicket/{ticket_id}', [App\Http\Controllers\TicketController::class, 'imprimir'])->name('ticket.imprimir')->middleware('auth');
	
Route::resource('animalito',App\Http\Controllers\AnimalitoController::class)->middleware(['auth','can:animalito.index']);
	
Route::resource('loteria',App\Http\Controllers\LoteriaController::class)->middleware(['auth','can:loteria.index']);

Route::resource('sorteo',App\Http\Controllers\SorteoController::class)->middleware(['auth','can:sorteo.index']);

Route::resource('resultado',App\Http\Controllers\ResultadoController::class)->middleware(['auth','can:resultado.index']);

Route::resource('ticket',App\Http\Controllers\TicketController::class)->middleware(['auth','verificar.bancas']);

Route::resource('banca',App\Http\Controllers\BancaController::class)->middleware(['auth','can:banca.index']);

Route::resource('user',App\Http\Controllers\UserController::class)->middleware(['auth','can:user.index']);

Route::resource('contabilidad',App\Http\Controllers\ContabilidadController::class)->middleware('auth');

Route::resource('contabilidadTotal',App\Http\Controllers\ContabilidadTotalController::class)->middleware(['auth','can:contabilidadTotal.index']);

Route::resource('perfil',App\Http\Controllers\PerfilController::class)->middleware('auth');
	
Route::get('banca_user' , [App\Http\Controllers\BancaController::class, 'banca_user'])->name('banca.user')->middleware('auth');    

Route::get('sin_bancas' , [App\Http\Controllers\BancaController::class, 'sin_bancas'])->name('sin.bancas')->middleware('auth');    

Route::get('roles' , function(){
    return Role::all();
})->name('roles')->middleware('auth');  


