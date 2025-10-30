<?php
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\InvitadosController;
use App\Http\Controllers\Admin\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS POR ROL
|--------------------------------------------------------------------------
*/

// 🔹 ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () { return view('panel.admin'); })->name('admin.dashboard');
    Route::delete('/personal/{id}', [PersonalController::class, 'destroy'])->name('personal.destroy');
    Route::put('/personal/{id}', [PersonalController::class, 'edit'] )->name('personal.edit');
    Route::post('/personal', [PersonalController::class, 'create'])->name('personal.create');




    Route::put('/user/{id}', [PanelController::class, 'edit_user'])->name('edit_user');
    Route::delete('/user/{id}', [PanelController::class, 'delete_user'])->name('delete_user');
    // 🔹 PERSONAL / DOCENTE
    Route::get('/personal', function () {
        return view('panel.personal');
    })->name('personal.panel');
    // 🔹 INVITADO
    Route::get('/invitado', function () {
        return view('panel.invitado');
    })->name('invitado.panel');
});


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [PanelController::class, 'showAdmin'])->name('panel');
    Route::resource('personal', PersonalController::class);
    Route::resource('invitados', InvitadosController::class);
    Route::resource('asistencias', AsistenciaController::class);
});
