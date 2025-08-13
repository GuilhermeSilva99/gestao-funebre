<?php

use App\Http\Controllers\TumuloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefuntoController;
use App\Http\Controllers\CemiterioController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('defunto')->group(function(){
    Route::get('/cadastrar', [DefuntoController::class, 'cadastrar'])->name('defunto.cadastrar');
    Route::post('/salvar', [DefuntoController::class, 'salvar'])->name('defunto.salvar');
    Route::get('/listar', [DefuntoController::class, 'listar'])->name('defunto.listar');
    Route::get('/editar/{id}', [DefuntoController::class, 'editar'])->name('defunto.editar');
    Route::put('/atualizar/{id}', [DefuntoController::class, 'atualizar'])->name('defunto.atualizar');
    Route::get('/visualizar/{id}', [DefuntoController::class, 'visualizar'])->name('defunto.visualizar');
    Route::get('/qrcode/{id}',[DefuntoController::class, 'qrcode'])->name('defunto.qrcode');
    Route::get('/deletar/{id}', [DefuntoController::class, 'deletar'])->name('defunto.deletar');
});

Route::prefix('cemiterio')->group(function(){
    Route::get('/cadastrar', [CemiterioController::class, 'cadastrar'])->name('cemiterio.cadastrar');
    Route::post('/salvar', [CemiterioController::class, 'salvar'])->name('cemiterio.salvar');
    Route::get('/listar', [CemiterioController::class, 'listar'])->name('cemiterio.listar');
    Route::get('/editar/{id}', [CemiterioController::class, 'editar'])->name('cemiterio.editar');
    Route::put('/atualizar/{id}', [CemiterioController::class, 'atualizar'])->name('cemiterio.atualizar');
    Route::get('/deletar/{id}', [CemiterioController::class, 'deletar'])->name('cemiterio.deletar');
});

Route::prefix('tumulo')->group(function(){
    Route::get('/cadastrar', [TumuloController::class, 'cadastrar'])->name('tumulo.cadastrar');
    Route::post('/salvar', [TumuloController::class, 'salvar'])->name('tumulo.salvar');
    Route::get('/listar', [TumuloController::class, 'listar'])->name('tumulo.listar');
    Route::get('/editar/{id}', [TumuloController::class, 'editar'])->name('tumulo.editar');
    Route::put('/atualizar/{id}', [TumuloController::class, 'atualizar'])->name('tumulo.atualizar');
    Route::get('/deletar/{id}', [TumuloController::class, 'deletar'])->name('tumulo.deletar');
    Route::get('/qrcode/{id}',[TumuloController::class, 'qrcode'])->name('tumulo.qrcode');
    Route::get('/visualizar/{id}', [TumuloController::class, 'visualizar'])->name('tumulo.visualizar');
});
