<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatBotController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/services', function () {
    return view('services.index');
});
Route::get('/contactus', function () {
    return view('contactus.index');
});
Route::get('/chatbot', function () {
    return view('chatbot.index');
});
Route::get('/aibot', function () {
    return view('aibot.chatbot');
});
Route::post('send',[ChatbotController::class, 'sendChat']);
// Route::get('/chatbot', 'ChatbotController@index');
