<?php

use App\Http\Controllers\SeminarController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('seminars.index');
});

Route::resource('seminars', SeminarController::class);
Route::resource('participants', ParticipantController::class);