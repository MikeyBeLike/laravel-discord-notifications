<?php

use App\Http\Controllers\DiscordNotificationDemo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('discord-notification', [DiscordNotificationDemo::class, 'index']);
Route::get('slide-into-dm', [DiscordNotificationDemo::class, 'slide_into_dm']);
