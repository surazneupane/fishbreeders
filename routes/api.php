<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload', function (Request $request) {

    $image_name = time() . "-" . $request->file->getClientOriginalName();

    $images = $request->file->storeAs('images', $image_name, 'public');
    return response()->json([
        'location' => "/storage/" . $images,
    ]);

});

