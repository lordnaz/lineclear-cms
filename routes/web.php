<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;

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
