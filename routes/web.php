<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Livewire\ShowThread;
use App\Livewire\ShowThreads;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/test', Test::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/threads', ShowThreads::class)->name('threads');
    Route::get('/thread/{thread}', ShowThread::class)->name('thread');
    Route::resource('threads', ThreadController::class)->except([
        'show', 'index', 'destroy'
    ]);
});
