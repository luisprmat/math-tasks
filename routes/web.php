<?php

use App\Http\Controllers\ProjectController;
use App\Livewire\ProjectTasks;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class)->except('show');
    Route::get('projects/{project}', ProjectTasks::class)->name('projects.show');
});
