<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validations\ValidationException;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SondageController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// api/sondages NUMERO 1

Route::get('/sondages', [SondageController::class, "index"]);

// api/sondages/votes NUMERO 3
Route::get('/sondages/votes', [SondageController::class, "results"])->whereNumber('id');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/user/logout', function(Request $request) {
        auth()->user()->tokens()->delete();
    });
    //NUMERO 2
    Route::get('/sondage/{id}', [SondageController::class, "show"])->whereNumber('id');
    //NUMERO 4
    Route::post('/sondage', [SondageController::class, "store"]);
    //NUMERO 5
    Route::post('/question', [QuestionController::class, "store"]);
    //NUMERO 6
    Route::post('/selection', [SelectionController::class, "store"]);
    //NUMERO 7
    Route::post('/vote', [VoteController::class, "store"]);
});

/*
----------------------
 Create an account.
----------------------
*/
Route::post('/register', [UserController::class, 'store']);

/*
---------
 Log in
---------
*/

Route::post('/login', function(Request $request) {
    $request->validate([
        'email' => 'required|email|max:50',
        'password' => 'required|string|min:8',
    ]);

    $user = User::where('email', $request->email)->first();
    if(!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => 'The provided credentials are incorrect.'
        ]);
    }

    return $user->createToken('auth_token')->plainTextToken;
});

