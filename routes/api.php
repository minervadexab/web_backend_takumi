<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\JenisAkademikController;
use App\Http\Controllers\Api\KknaController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProdiController;
use App\Http\Controllers\Api\projectandresearchController;
use Illuminate\Http\Request;
// use App\Http\Controllers\ArticleController;
// use App\Http\Controllers\ProjectResearchController;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//route untuk auth sebelum masuk ke login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//untuk prodi
Route::resource('prodi', ProdiController::class); 
//untuk jenisakademik
Route::resource('jenisakademik', JenisAkademikController::class);
Route::middleware('auth:sanctum')->get('/news', [NewsController::class, 'index']);


//benerin lagi ini posisinya
Route::get('/newsuser', [NewsController::class, 'getNewsUser']);


//route untuk grup yang sudah login
Route::middleware('auth:sanctum')->group(function () {
    
    route::post('/logout', [AuthController::class, 'logout']);
    route::post('/search', [AuthController::class, 'search']);

    //untuk article
    Route::resource('article', ArticleController::class); 
    Route::resource('news', NewsController::class); 
    //untuk event
    Route::resource('event', EventController::class); 
    //untuk kehidupan kampus non akademik
    Route::resource('kkna', KknaController::class); 
    //untuk news
    // Route::resource('news', NewsController::class); 
    //untuk project and research
    Route::resource('project-research', projectandresearchController::class); 


//     // Rute untuk superadmin (role id 1)
// Route::middleware(['role:1'])->group(function () {
//         Route::apiResource('articles', ArticleController::class);
//         // Route::apiResource('project-research', ProjectResearchController::class);
        
//         // Rute untuk admin artikel (role id 2)
//         Route::middleware(['role:2'])->group(function () {
//             // Route::apiResource('articles', ArticleController::class);
//         });
        
//         // Rute untuk admin project dan penelitian (role id 3)
//         Route::middleware(['role:3'])->group(function () {
//             // Route::apiResource('project-research', ProjectResearchController::class);
//         });
        
//         // Rute untuk admin lainnya (role id 4, 5, dan 6)
//         Route::middleware(['role:4'])->group(function () {
//             // Rute khusus untuk role id 4
//         });
        
//         Route::middleware(['role:5'])->group(function () {
//             // Rute khusus untuk role id 5
//         });
        
//         Route::middleware(['role:6'])->group(function () {
//             // Rute khusus untuk role id 6
//         });
//     });
});
