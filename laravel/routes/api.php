<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World!']);
});

Route::get('/events', [EventController::class, 'index']);