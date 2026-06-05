<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/logout', [App\Http\Controllers\UserAuth::class, 'logout'])->name('logout');
Route::post('/auth', [App\Http\Controllers\UserAuth::class, 'login'])->name('auth');

    
Route::middleware(['check.user.session'])->group(function () {




    Route::get('/', [App\Http\Controllers\dash::class, 'index'])->name('dash');

    Route::get('/interv', [App\Http\Controllers\interv::class, 'getAll'])->name('intervention');
    Route::post('/addinterv', [App\Http\Controllers\interv::class, 'ajouter']);
    Route::post('/interv/add', [App\Http\Controllers\interv::class, 'ajouter'])->name('intervention.add');
    Route::post('/interv/update', [App\Http\Controllers\interv::class, 'update'])->name('intervention.update');
    Route::get('/interv/del/{id}', [App\Http\Controllers\interv::class, 'supprimer'])->name('intervention.delete');
    Route::get('/dash', [App\Http\Controllers\dash::class, 'index']);
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::post('/compte/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('compte.updatePassword');


    Route::middleware(['is.admin'])->group(function () {
    Route::get('/compte', [App\Http\Controllers\ProfileController::class, 'index'])->name('compte');
    Route::get('/compte/delete/{id}', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('compte.delete');
    Route::post('/compte/add', [App\Http\Controllers\ProfileController::class, 'create'])->name('compte.add');
    Route::post('/compte/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('compte.update');
    Route::get('/tarif', [App\Http\Controllers\TarifController::class, 'index'])->name('tarif');
    Route::post('/tarif/update', [App\Http\Controllers\TarifController::class, 'update'])->name('tarif.update');
    Route::post('/tarif/add', [App\Http\Controllers\TarifController::class, 'create'])->name('tarif.add');
    Route::get('/tarif/delete/{id}', [App\Http\Controllers\TarifController::class, 'destroy'])->name('tarif.delete');
    Route::get('/racc', [App\Http\Controllers\Raccordement::class, 'index'])->name('racc.index');
    Route::post('/racc/add', [App\Http\Controllers\Raccordement::class, 'create'])->name('racc.add');
    Route::post('/racc/update', [App\Http\Controllers\Raccordement::class, 'update'])->name('racc.update');
    Route::get('/racc/delete/{id}', [App\Http\Controllers\Raccordement::class, 'destroy'])->name('racc.delete');
    Route::get('/technicien/employe', [App\Http\Controllers\Technicien::class, 'index_employe'])->name('technicien.employe');
    Route::get('/technicien/auto', [App\Http\Controllers\Technicien::class, 'index_auto'])->name('technicien.auto');
    });
});