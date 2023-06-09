<?php

use App\Http\Livewire\Cadastro;
use App\Http\Livewire\Editar;
use App\Http\Livewire\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', Produto::class)->name('index');

Route::get('/cadastro', Cadastro::class)->name('cadastro');

Route::any('{url}', function(){
    return redirect('/');
})->where('url', '.*');