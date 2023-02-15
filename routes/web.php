<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('adimn.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->prefix("admin/projects")
    ->name("admin.projects.")
    ->group(function(){
        Route::get('/' ,[ProjectController::class, 'index'])->name('index');
        Route::get('create',[ProjectController::class, 'create'])->name('create');
        Route::post('/store', [ProjectController::class, 'store'])->name("store");
        Route::get('show/{project}', [ProjectController::class, 'show'])->name('show');
        Route::get('edit/{project}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');    
    });
Route::middleware(['auth','verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        Route::resource('types', TypeController::class);
    });

require __DIR__.'/auth.php';
