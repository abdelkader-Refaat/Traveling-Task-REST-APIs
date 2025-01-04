<?php

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Admin\TourController as AdminTourController;
use App\Http\Controllers\Api\V1\Admin\TravelController as AdminTravelController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    Route::post('login', LoginController::class);
    Route::get('travels', [TravelController::class, 'index'])->name('travels.index');
    Route::middleware('api')->get('token', function () {
        return response()->json(['csrf_token' => csrf_token()]);
    });

    Route::get('travels/{travel:slug}/tours', [TourController::class, 'index']);
    Route::prefix('admin')
        ->middleware(['auth:sanctum', 'role:super_admin'])
        ->group(function () {
            Route::post('travels', [AdminTravelController::class, 'store']);
            Route::post('travels/{travel}/tours', [AdminTourController::class, 'store']);
            Route::put('travels/{travel}', [AdminTravelController::class, 'update']);
        });
    Route::get('tours', fn() => Tour::all())
        ->name('tours.index');
});
