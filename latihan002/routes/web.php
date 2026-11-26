<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () 
{
    return 'Halo Laravel';
});

Route::get('profil/{nama}', function ($nama) {
    return 'Halo Nama saya ' . $nama ;
});