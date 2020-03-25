<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*
 * Authentication Routes
 */

$router->post('/logout', [
    'as' => 'logout', function() use ($router)
    {
        \Auth::user()->logout();
        return redirect('/');
    }
]);

$router->get('/', 'Home\HomeController@index');
