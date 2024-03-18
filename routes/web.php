<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProjectController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	Route::get('/' , [HomeController::class , 'index'])->name('index');
    Route::post('/subscribe' , [HomeController::class , 'subscribe'])->name('subscribe');

    Route::get('/about-us' , [AboutController::class , 'index'])->name('about');

    Route::get('/project/{slug}' , [ProjectController::class , 'index'])->name('project');

    Route::get('/blog' , [BlogController::class , 'index'])->name('blog');
    Route::get('/blog/{slug}' , [BlogController::class , 'article'])->name('article');
    Route::post('/blog/comment/{id}' , [BlogController::class , 'comment'])->name('comment');

    Route::get('/contact-us' , [ContactController::class , 'index'])->name('contact');
    Route::post('/contact-us' , [ContactController::class , 'store']);
    
    Route::get('/partners' ,[HomeController::class , 'partners'])->name('partners');
    
    Route::get('/careers' ,[HomeController::class , 'careers'])->name('careers');
    Route::post('/apply' , [HomeController::class , 'apply_career'])->name('careers.apply');
    
    Route::get('/privacy-policy' ,[HomeController::class , 'privacy'])->name('privacy');
});