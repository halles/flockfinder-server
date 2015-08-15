<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Models\Report;

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/hola', function() use ($app) {
    $report = new Report;
    $report->type = 1;
    $report->location = array(
        'lat' => '0.0',
        'lon' => '0.0'
    );
    $report->size = 0;
    $report->colour = array('yellow');
    $report->attributes = array(
        'collar',
        'spots'
    );
    $report->pictures = array();
    $report->save();
    $response = array(
        'report' => $report
    );
    return response()->json($response);
});

/** User Auth & Controller Routes **/

$app->post('/login', [
  'as' => 'userLogin',
  'uses' => 'App\Http\Controllers\AuthController@login'
]);

$app->get('/logout', [
  'as' => 'userLogout',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\AuthController@logout'
]);

$app->get('/me', [
  'as' => 'me',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@profile'
]);

$app->get('/me/emails', [
  'as' => 'meMails',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@emails'
]);

$app->get('/me/accounts', [
  'as' => 'meAccounts',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@accounts'
]);

$app->get('/me/password', [
  'as' => 'mePassword',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@password'
]);

$app->get('/me/password/recover', [
  'as' => 'mePasswordRecover',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@passwordRecover'
]);

$app->get('/me/password/new',  [
  'as' => 'userLogin',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@passwordNew'
]);

$app->get('/me/password/{token}', [
  'as' => 'mePasswordTokenCheck',
  'middleware' => 'auth',
  'uses' => 'App\Http\Controllers\UserController@passwordTokenCheck'
]);
