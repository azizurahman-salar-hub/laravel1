<?php

use App\Http\Controllers\backend\Post;
use App\Http\Controllers\backend\postController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/post/{slug}',[HomeController::class,'show'])->name('home.show');

Route::get('about',function(){
    return view('frontend.about.about');

})->name('about');


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

Route::resource('post',postController::class);
       

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
