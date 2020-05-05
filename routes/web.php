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

$router->group(['namespace' => 'Home'], function () use ($router) {
    $router->get('/', 'HomeController@index');

    $router->get('/search', 'HomeController@search');
});

$router->group(['prefix' => 'admin', 'namespace' => 'Admin'], function () use ($router) {
    $router->group(['prefix' => 'products', 'namespace' => 'Products'], function () use ($router) {
        $router->get('/', 'ProductController@index');

        $router->get('/create', 'ProductController@create');
    });

    $router->group(['prefix' => 'users', 'namespace' => 'Users'], function () use ($router) {
        $router->get('/', 'UserController@index');
    });
});

$router->group(['prefix' => 'auth', 'namespace' => 'Auth'], function () use ($router) {
    $router->get('/login', 'LoginController@index');

    $router->get('/register', 'RegisterController@index');

    $router->get('/profile', 'ProfileController@index');
});

$router->group(['prefix' => 'products', 'namespace' => 'Products'], function () use ($router) {
    $router->get('/{id}', 'ProductsController@details');
});