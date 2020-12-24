<?php

use App\Http\Controllers\Api\BookableReviewController;
use App\Http\Controllers\Api\BookingByReviewController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookableAvailabilityController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('bookables', [BookableController::class,'index']);
//Route::get('bookables/{id}', [BookableController::class, 'show']);

Route::apiResource('bookables', BookableController::class)->only(['show', 'index']);

Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class)->name('bookables.availability.show');
//Route::get('bookables/{id}', function(Request $request, $id) {
//    return Bookable::findOrFail($id);
//});

Route::get('bookables/{bookable}/reviews', BookableReviewController::class)->name('bookables.reviews.index');

Route::get('/booking-by-review/{reviewKey}', BookingByReviewController::class)->name('booking.by-review.show');

Route::apiResource('review', ReviewController::class)->only(['show', 'store']);
