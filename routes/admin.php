<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeritageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectSliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/' , [DashboardController::class , 'index'])->name('dashboard');

    /**
     * messages routes
     */
    Route::resource('messages' , MessageController::class)->only('index' , 'show' , 'destroy');

    /**
     * subscribers routes
     */
    Route::resource('subscribers' , SubscriberController::class)->only('index' , 'destroy');

    /**
     * candidates routes
     */
    Route::resource('candidates' , CandidateController::class)->only('index' , 'destroy');

    /**
     * profile routes
     */
    Route::prefix('profile')->name('profile.')->group(function ()
    {
        Route::get('/' , [ProfileController::class , 'index'])->name('index');
        Route::put('/update' , [ProfileController::class , 'update'])->name('update');
    });

    /**
     * settings routes
     */
    Route::prefix('site-settings')->name('settings.')->group(function ()
    {
        Route::get('/' , [SettingController::class , 'index'])->name('index');
        Route::put('/update' , [SettingController::class , 'update'])->name('update');
    });

    /**
     * content routes
     */
    Route::prefix('pages-content')->name('content.')->group(function ()
    {
        Route::get('/' , [ContentController::class , 'index'])->name('index');
        Route::put('/update' , [ContentController::class , 'update'])->name('update');
    });

    /**
     * about-us routes
     */
    Route::prefix('about-us')->name('about.')->group(function ()
    {
        Route::get('/' , [AboutController::class , 'index'])->name('index');
        Route::put('/update' , [AboutController::class , 'update'])->name('update');

        /**
         * core-values routes
         */
        Route::prefix('core-values')->name('values.')->group(function(){
            Route::get('/' , [CoreValueController::class , 'index'])->name('index');
            Route::post('/store' , [CoreValueController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[CoreValueController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [CoreValueController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [CoreValueController::class , 'destroy'])->name('delete');
        });

        /**
         * heritages routes
         */
        Route::resource('heritages' , HeritageController::class)->only('index' , 'store' , 'edit' ,'update' , 'destroy');
    });

    /**
     * partners routes
     */
    Route::resource('partners' , PartnerController::class)->only('index' , 'store' , 'edit' ,'update' , 'destroy');

    /**
     * articles routes
     */
    Route::prefix('blog')->group(function(){
        Route::resource('articles' , ArticleController::class)->only('index' , 'create' , 'store' , 'edit' ,'update' , 'destroy');
        Route::get('/commecnts/{article}' , [ArticleController::class , 'comments'])->name('article.comment');
        Route::delete('/commecnts/delete/{id}' , [ArticleController::class , 'delete_comment'])->name('article.comment.delete');
    });

    /**
     * projects routes
     */
    Route::resource('projects' , ProjectController::class)->only('index' , 'create' , 'store' , 'edit' ,'update' , 'destroy');
    Route::prefix('projects')->group(function(){
        Route::resource('categories' , CategoryController::class)->only('index' , 'store' , 'edit' ,'update' , 'destroy');

        Route::prefix('slider')->name('projects.slider.')->group(function(){
            Route::get('/{id}' , [ProjectSliderController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [ProjectSliderController::class , 'store'])->name('store');
            Route::get('/edit/{image}' , [ProjectSliderController::class , 'edit'])->name('edit');
            Route::put('/update/{image}' , [ProjectSliderController::class , 'update'])->name('update');
            Route::delete('/delete/{image}' , [ProjectSliderController::class , 'destroy'])->name('delete');
        });
    });
    

    /**
     * social-links routes
     */
    Route::prefix('social-links')->name('links.')->group(function(){
        Route::get('/' , [SocialLinkController::class , 'index'])->name('index');
        Route::post('/store' , [SocialLinkController::class , 'store'])->name('store');
        Route::get('/edit/{id}' ,[SocialLinkController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [SocialLinkController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [SocialLinkController::class , 'destroy'])->name('delete');
    });
});
