<?php

use App\Http\GlobalClases\PusherEmit;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

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

Route::get('/nose', function(){
    $bodyNotification = [
        'title' => 'Bienvenido',
        'message' => 'Felicidades, has decidido dar el paso a tener una mejor organozación.'
    ];
    $options = [
        'cluster' => 'us2',
        'useTLS' => false
      ];
    $pusher = new Pusher('6fd86908133de266a641', '3b49b1bb1067ba5d082f', '1766055', $options);

    $pusher->trigger('chat-room', 'PusherEvent', $bodyNotification);
});