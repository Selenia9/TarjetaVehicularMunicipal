<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('vendor/adminlte/auth/login');
});

Auth::routes();


Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

/******************************************************  grupo de login  ********************************************/
Route::group(['middleware' => 'auth'], function () {

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* rutas de propietario */
Route::resource('propietario', App\Http\Controllers\PropietariosController::class);
Route::get('/propietario{id}/confirm',[App\Http\Controllers\PropietariosController::class, 'confirm'])->name('propietario.confirm');
Route::get('/cancelar_propietario', function(){
    return redirect()->route('propietario.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_propietario');


/******************************************************* rutas de organizacion ***************************************/
Route::resource('organizacion', App\Http\Controllers\OrganizacioneController::class);
Route::get('/organizacion{id}/confirm',[App\Http\Controllers\OrganizacioneController::class, 'confirm'])->name('organizacion.confirm');
Route::get('/cancelar_organizacion', function(){
    return redirect()->route('organizacion.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_organizacion');

/******************************************************** rutas de vehiculo *******************************************/
Route::resource('MUNICIPALIDAD-SACABA', App\Http\Controllers\vehiculosController::class)->parameters(['MUNICIPALIDAD-SACABA' => 'vehiculo'])->names('vehiculo');

Route::get('/vehiculo{id}/confirm',[App\Http\Controllers\vehiculosController::class, 'confirm'])->name('vehiculo.confirm');
Route::get('/cancelar_vehiculo', function(){
    return redirect()->route('vehiculo.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_vehiculo');

Route::get('cancelar/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar','Acción Cancelada!');
})->name('cancelar');

Route::get('download-pdf/{id}',[App\Http\Controllers\vehiculosController::class, 'downloadPdf'])->name('vehiculo.pdf');
Route::get('reportePDF',[App\Http\Controllers\vehiculosController::class, 'reportePDF'])->name('vehiculo.reportePDF');
Route::get('indexVencido',[App\Http\Controllers\vehiculosController::class, 'indexVencido'])->name('vehiculo.indexVencido');
Route::get('reportevencidaPDF',[App\Http\Controllers\vehiculosController::class, 'reportevencidaPDF'])->name('vehiculo.reportevencidaPDF');
Route::get('indexVigente',[App\Http\Controllers\vehiculosController::class, 'indexVigente'])->name('vehiculo.indexVigente');
Route::get('reportevigentePDF',[App\Http\Controllers\vehiculosController::class, 'reportevigentePDF'])->name('vehiculo.reportevigentePDF');




/******************************************************** rutas de permisos *******************************************/

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::get('/cancelar_permissions', function(){
    return redirect()->route('permissions.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_permissions');

/******************************************************** rutas de roles *******************************************/

Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::get('/cancelar_roles', function(){
    return redirect()->route('roles.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_roles');
/******************************************************** rutas de usuarios *******************************************/

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('/cancelar_users', function(){
        return redirect()->route('users.index')->with('cancelar','Acción Cancelada');
    })->name('cancelar_users');


});
