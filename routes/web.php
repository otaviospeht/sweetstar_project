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

$router->get('/login', 'Auth\LoginController@index');

$router->post('/logout', [
    'as' => 'logout', function() use ($router)
    {
        \Auth::user()->logout();
        return redirect('/');
    }
]);

$router->get('/', 'Home\HomeController@index');

$router->group(['prefix' => 'admin', 'namespace' => 'Admin'], function () use ($router) {
    $router->group(['prefix' => 'products', 'namespace' => 'Products'], function () use ($router) {
        $router->get('/', 'ProductController@index');

        $router->get('/create', 'ProductController@create');
    });
});