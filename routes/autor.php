<?php 

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AutorController;
use App\Http\Controllers\EmpresaController;
use \App\Http\Controllers\testcontroller;
use \App\Http\Livewire\Empresa;
use \App\Http\Livewire\empresas;
use App\Http\Livewire\FacturacaoController;

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
//Route::view('/Adicionar-Empresa', 'back.pages.empresa')->name('empresa.create');//Este Usa LiveWire & teve bugs
    Route::view('/Invoice', 'back.pages.invoice')->name('invoice');
    Route::view('/docs', 'back.pages.docs')->name('docs');
    Route::view('/servicos', 'back.pages.services')->name('services');
    Route::view('/Lista-Empresas', 'back.pages.empresas')->name('empresa.TodasEmpresas');///Este puxa o DataGrid
    /* Route::view('/Empresas', 'back.pages.empresas')->name('TodasEmpresas'); */
    Route::view('/facturar', 'back.pages.facturacao')->name('facturar');
    
    //Route::resource('/empresa', Empresa::class);///CADASTRO DE EMPRESAS
    Route::get('/empresa', [EmpresaController::class, 'create'])->name('empresa.create');

    Route::post('/empresa', [EmpresaController::class, 'store'])->name('empresa.store');

    Route::get('/empresas_lista', [EmpresaController::class, 'show'])->name('empresa.show');
    
        Route::get('/empresa-edit', [EmpresaController::class, 'edit'])->name('empresa.edit');
        Route::post('/empresa-alterar', [EmpresaController::class, 'update'])->name('empresa.update');


        Route::post('/eliminar-empresa', [EmpresaController::class, 'destroy'])->name('empresa.destroy');

    Route::get('/relatorio-empresa', [EmpresaController::class, 'relatorio'])->name('empresa.relatorio_cliente');
    Route::get('/relatorioIndividual-empresa', [EmpresaController::class, 'relatorioIndividual'])->name('empresa.relatorioIndividual');
    //Route::resource('/facturacao', FacturacaoController::class);///CADASTRO DE EMPRESAS

    ///////////////////Facturacao
    Route::get('/facturacao', [FacturacaoController::class, 'show'])->name('facturacao.show');///Ver empresas facturadas
   
    Route::get('/editar-facturacao', [FacturacaoController::class, 'edit'])->name('facturacao.edit');///Ver empresas facturadas

    Route::post('/alterar-facturacao', [FacturacaoController::class, 'update'])->name('facturacao.update');///Ver empresas facturadas
   
    Route::post('/eliminar-facturacao', [FacturacaoController::class, 'destroy'])->name('facturacao.destroy');///Ver empresas facturadas
    Route::get('/relatorio-facturacao', [FacturacaoController::class, 'relatorio'])->name('facturacao.relatorio');///Ver empresas facturadas
    Route::get('/relatorioIndividual-facturacao', [FacturacaoController::class, 'relIndividual'])->name('facturacao.relIndividual');///Ver empresas facturadas
    Route::get('/relatorio-valores', [FacturacaoController::class, 'somas'])->name('facturacao.somas');///Ver empresas facturadas

    //Route::post('/empresa', [Empresa::class, 'store'])->name('empresa.store');
    Route::resource('/empresas', empresas::class);//Inutil
   
});


});
//Route::resource('/test', testcontroller::class);