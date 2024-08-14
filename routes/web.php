<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Route1Controller;
use App\Http\Controllers\Route2Controller;
use App\Http\Controllers\Route3Controller;
use App\Http\Controllers\ObjetoInsercionController;

Route::get('/', function () {
    return view('welcome');
});
