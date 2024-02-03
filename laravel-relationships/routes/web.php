<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/create-users', function () {
    factory(\App\User::class, 3)->create();
});

Route::get('/create-addresses', function() {
    \App\Address::create([
        'user_id' =>  1,
        'country' => 'Georgia'
    ]);

    \App\Address::create([
        'user_id' =>  2,
        'country' => 'Ukraine'
    ]);

    \App\Address::create([
        'user_id' =>  3,
        'country' => 'Russia'
    ]);
});

Route::get('/show-users', function () {
    $users = \App\User::all();

    return view('users.index', compact('users'));
});


Route::get('/add-new-user', function () {

    $user = factory(\App\User::class)->create();

    $user->address()->create([
       'country' => 'Georgia'
    ]);

    /*
    \App\Address::create([
        'user_id' => $user->id,
        'country' => 'Georgia',
    ]);
    */

    $users = \App\User::all();

    return view('users.index', compact('users'));
});


Route::get('/address', function () {

    $addresses = \App\Address::all();

    return view('users.address', compact('addresses'));
});
