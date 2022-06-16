<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioFinanzaController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\BeneficiarioSaludController;
use App\Http\Controllers\BeneficiarioSaludPeriodicoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtencionPeriodicaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;


///Ruta  home admin lte

Route::get('/home', function () {
      return view('adminlte.home');
})->middleware('auth');

//// Ruta de sitio web
Route::get('/', function () {
    return view('sitioweb.index');
});

////Ruta login
Route::get('/login', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
    return view('auth.login');
});

//Obtener total de beneficiarios
Route::get('/totalBeneficiarios', [DashboardController::class, 'TotalBeneficiarios'])->middleware('auth');
Route::get('/totalActividades', [DashboardController::class, 'totalActividades'])->middleware('auth');
Route::get('/totalColaboradores', [DashboardController::class, 'totalColaboradores'])->middleware('auth');
Route::get('/totalInventarios', [DashboardController::class, 'totalInventarios'])->middleware('auth');

/////Ruta de beneficiarios finanza
Route::group(['middleware' => ['permission:Gestionar Beneficiarios Finanza']], function () {
    Route::resource('BeneficiarioFinanza', BeneficiarioFinanzaController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar historial de pago
Route::post('eliminarBeneficiarioFinanza/{id}', [BeneficiarioFinanzaController::class, 'delete'])->middleware('auth');

///Ruta de beneficiarios
Route::group(['middleware' => ['permission:Gestionar Beneficiarios']], function () {
    Route::resource('beneficiario', BeneficiarioController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarBeneficiario/{id}', [BeneficiarioController::class, 'delete'])->middleware('auth');

//Ruta de encargado
Route::group(['middleware' => ['permission:Gestionar Encargado']], function () {
    Route::resource('encargado', EncargadoController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarEncargado/{id}', [EncargadoController::class, 'delete'])->middleware('auth');

///Beneficiarios salud
Route::group(['middleware' => ['permission:Gestionar Atencion Anual']], function () {
    Route::resource('beneficiario_Salud', BeneficiarioSaludController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarAtencionAnual/{id}', [BeneficiarioSaludController::class, 'delete'])->middleware('auth');

//Ruta Articulos
Route::group(['middleware' => ['permission:Gestionar Articulos']], function () {
    Route::resource('Articulo', ArticuloController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarArticulo/{id}', [ArticuloController::class, 'delete'])->middleware('auth');

//Rutas de inventario
Route::group(['middleware' => ['permission:Gestionar Inventario']], function () {
    Route::resource('inventario', InventarioController::class)->middleware('auth');
});

//Ruta de Categoria
Route::group(['middleware' => ['permission:Gestionar Categoria']], function () {
    Route::resource('categoria', CategoriaController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarCategoria/{id}', [CategoriaController::class, 'delete'])->middleware('auth');

//Rutas de actividades
Route::group(['middleware' => ['permission:Gestionar Actividad']], function () {
    Route::resource('actividades', ActividadesController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarActividad/{id}', [ActividadesController::class, 'delete'])->middleware('auth');

//Rutas colaborador
Route::group(['middleware' => ['permission:Gestionar Colaborador']], function () {
    Route::resource('colaborador', ColaboradorController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarColaborador/{id}', [ColaboradorController::class, 'delete'])->middleware('auth');

//Ruta Finanza Egreso
Route::group(['middleware' => ['permission:Gestionar Finanza Egreso']], function () {
    Route::resource('egreso', EgresoController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarEgreso/{id}', [EgresoController::class, 'delete'])->middleware('auth');

//Ruta Finanza ingreso
Route::group(['middleware' => ['permission:Gestionar Finanza Ingreso']], function () {
    Route::resource('ingreso', IngresoController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarIngreso/{id}', [IngresoController::class, 'delete'])->middleware('auth');

//Ruta de atencion periodica
Route::group(['middleware' => ['permission:Gestionar Atencion Periodica']], function () {
    Route::resource('atencion_periodicas', AtencionPeriodicaController::class)->middleware('auth');
});

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarAtencionPeriodica/{id}', [AtencionPeriodicaController::class, 'delete'])->middleware('auth');

Route::get('inventario/{id}/mostrarArticulo', [InventarioController::class, 'mostrarArticulo'])->name('inventario.mostrarArticulo')->middleware('auth');


Route::get('inventario/{id}/mostrarArticulo/agregarArticulo', [InventarioController::class, 'agregarArticulo'])->name('inventario.agregarArticulo')->middleware('auth');
Route::get('beneficiario/{id}/mostrarEncargado/agregarEncargado', [BeneficiarioController::class, 'agregarEncargado'])->name('beneficiario.agregarEncargado')->middleware('auth');

//Ruta para ir al metodo eliminar beneficiaro
Route::post('eliminarInventario/{id}', [InventarioController::class, 'delete'])->middleware('auth');

Route::get('beneficiario/{id}/mostrarEncargado', [BeneficiarioController::class, 'mostrarEncargado'])->name('beneficiario.mostrarEncargado')->middleware('auth');
Route::get('beneficiario/{id}/mostrarHistorial', [BeneficiarioController::class, 'mostrarHistorial'])->name('beneficiario.mostrarHistorial')->middleware('auth');

Route::get('/beneficiarios-pdf/{id}', [BeneficiarioController::class,'downloadPDF'])->middleware('auth');
Route::get('/anual-pdf/{id}', [BeneficiarioSaludController::class,'downloadPDF'])->middleware('auth');
Route::get('/periodico-pdf/{id}', [AtencionPeriodicaController::class,'downloadPDF'])->middleware('auth');



Auth::routes([ 'verify' => true ]);


//Rutas Usuarios
Route::group(['middleware' => ['permission:Gestionar Usuarios']], function () {
    Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

    Route::get('/users/status/{user_id}/{status_code}', [UserController::class, 'updateStatus'])->name
    ('users.status.update')->middleware('auth');
});



Route::group(['middleware' => ['permission:Gestionar Roles']], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('auth');
});
