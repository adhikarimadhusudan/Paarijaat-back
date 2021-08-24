<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EpisodeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// PUBLIC ROUTES
Route::group([
    'middleware' => 'api',

], function ($router) {
    Route::get('/albums', [ApiController::class, 'getAlbums']);    
    Route::get('/episodes', [ApiController::class, 'getEpisodes']);    
    Route::get('/randomepisodes', [ApiController::class, 'getRandomEpisodes']);    
    Route::get('/episode/{id}', [ApiController::class, 'showEpisode']);    
    Route::get('/albums/{id}', [ApiController::class, 'showAlbum']);    

});





// AUTH ROUTES
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
    Route::post('/savedevice', [AuthController::class, 'saveDeviceKey']);    

});


// Album Controller
Route::group([
    'middleware' => 'api',
    'prefix' => 'album'

], function ($router) {
    Route::get('/get', [AlbumController::class, 'index']);
    Route::post('/create', [AlbumController::class, 'create']);
    Route::get('/edit/{id}', [AlbumController::class, 'edit']);
    Route::post('/update/{id}', [AlbumController::class, 'update']);
    Route::post('/delete', [AlbumController::class, 'delete']);
    Route::get('/read/{id}', [AlbumController::class, 'read']);    

});


// Episode Controller
Route::group([
    'middleware' => 'api',
    'prefix' => 'episode'

], function ($router) {
    Route::get('/get', [EpisodeController::class, 'index']);
    Route::post('/create', [EpisodeController::class, 'create']);
    Route::post('/edit/{id}', [EpisodeController::class, 'edit']);
    Route::post('/update/{id}', [EpisodeController::class, 'update']);
    Route::post('/delete', [EpisodeController::class, 'delete']);
    Route::get('/read/{id}', [EpisodeController::class, 'read']);    

});
