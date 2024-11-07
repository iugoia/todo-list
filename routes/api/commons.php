<?php

use Illuminate\Support\Facades\Route;

Route::prefix('boards')->middleware('jwt.auth')->group(function () {
    Route::get('', [\App\Http\Controllers\Commons\BoardController::class, 'index']);
    Route::post('', [\App\Http\Controllers\Commons\BoardController::class, 'store']);
    Route::get('{board}', [\App\Http\Controllers\Commons\BoardController::class, 'show']);
    Route::put('{board}', [\App\Http\Controllers\Commons\BoardController::class, 'update']);
    Route::delete('{board}', [\App\Http\Controllers\Commons\BoardController::class, 'delete']);
    Route::delete('{id}/force-delete', [\App\Http\Controllers\Commons\BoardController::class, 'forceDelete']);
    Route::post('{id}/restore', [\App\Http\Controllers\Commons\BoardController::class, 'restore']);
});
