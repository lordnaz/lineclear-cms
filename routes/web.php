<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AnnouncerController;

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

    if(auth()->user()){
        return redirect('home');
    }else{
        // return view('auth.login');
        return redirect('login');
    }

});

Route::get('/dashboard', function () {
    if(auth()->user()){
        return redirect('home');
    }else{
        // return view('auth.login');
        return redirect('login');
    }
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::post('/submit_faq', [FaqController::class, 'submitFaq']);

Route::post('/update_faq', [FaqController::class, 'updateFaq']);

Route::get('/edit_faq/{id}', [FaqController::class, 'editFaq'])->name('edit_faq');

Route::get('/delete_parent/{id}', [FaqController::class, 'deleteParent'])->name('delete_parent');

Route::get('/delete_child/{id}', [FaqController::class, 'deleteChild'])->name('delete_child');

Route::get('/announcer', [AnnouncerController::class, 'index'])->name('announcer');

Route::post('/update_popup', [AnnouncerController::class, 'update_popup']);
