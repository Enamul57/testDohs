<?php

use Illuminate\Support\Facades\Route;
use App\Mail\sendMail;

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

// Route::get('/{any?}', function () {
//     return view('welcome');
// });
Route::get('/mail/sendmail',function (){
    Mail::to('haquee208@gmail.com')->send(new sendMail());
});
Route::get('/{vue_capture?}', function () {
    return view('welcome');
  })->where('vue_capture', '[\/\w\.-]*');
