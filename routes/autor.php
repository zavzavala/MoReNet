<?php 

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AutorController;

use \App\Http\Controllers\testcontroller;
use \App\Http\Livewire\Empresa;

Route::prefix('autor')->name('autor.')->group(function(){

Route::middleware(['guest:web'])->group(function(){
    Route::view('/login', 'back.pages.auth.login')->name('login');
    Route::view('/forgot-password', 'back.pages.auth.forgot')->name('forgot-password');    
    Route::get('/Reset/Password/{token}',[AutorController::class, 'ResetForm'])->name('reset-form');
    
});

Route::middleware(['auth:web'])->group(function(){
    Route::get('/home', [AutorController::class, 'index'])->name('home');
    Route::post('/logout', [AutorController::class, 'logout'])->name('logout');
    Route::view('/profile', 'back.pages.autor-profile')->name('profile');
    Route::post('/change-Profile0Picture', [AutorController::class, 'changeProfilePicture'])->name('change-profile-picture');
    Route::view('/Usuarios', 'back.pages.autores')->name('usuarios');
    Route::view('/Adicionar-Usuario', 'back.pages.auth.registerUser')->name('Register.offline');
    Route::view('/Adicionar-Empresa', 'back.pages.empresa')->name('Reg.company');
    Route::view('/Invoice', 'back.pages.invoice')->name('invoice');
    Route::view('/docs', 'back.pages.docs')->name('docs');
    Route::view('/servicos', 'back.pages.services')->name('services');
    Route::view('/Empresas', 'back.pages.empresas')->name('TodasEmpresas');
    Route::view('/Facturacao', 'back.pages.facturacao')->name('facturacao');

    Route::Resource('/empresa', Empresa::class);
    //Route::post('/empresa', [Empresa::class, 'store'])->name('empresa.store');
    
});


});
Route::resource('/test', testcontroller::class);