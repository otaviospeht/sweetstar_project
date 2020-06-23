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

$router->group(['namespace' => 'Auth'], function () use ($router) {
    $router->post('/auth/login', [
        'as' => 'login',
        'uses' => 'LoginController@authenticate'
    ]);

    $router->get('/auth/logout', [
        'as' => 'logout',
        'uses' => 'LoginController@logout'
    ]);
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/carrinho/checkout', [
        'as' => 'checkout',
        'uses' => 'Carrinho\CheckoutController@index',
    ]);

    $router->post('/carrinho/checkout', [
        'as' => 'checkout.store',
        'uses' => 'Carrinho\CheckoutController@store'
    ]);

    $router->get('/carrinho/checkout/boleto', [
        'as' => 'checkout.boleto',
        'uses' => 'Carrinho\CheckoutController@download'
    ]);

    $router->group(['namespace' => 'Auth'], function () use ($router) {
        $router->get('/perfil', [
            'as' => 'profile',
            'uses' => 'ProfileController@index'
        ]);

        $router->post('/perfil/card', [
            'as' => 'profile.card.store',
            'uses' => 'ProfileController@storeCard'
        ]);

        $router->put('/profile/address', [
            'as' => 'profile.address.update',
            'uses' => 'ProfileController@update'
        ]);
    });
});

$router->group(['namespace' => 'Home'], function () use ($router) {
    $router->get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

    $router->get('/search', 'HomeController@search');
});

$router->group(['prefix' => 'contato', 'namespace' => 'Contato'], function () use ($router) {
    $router->get('/', [
        'as' => 'contato.index',
        'uses' => 'ContatoController@index'
    ]);

    $router->post('/', [
        'as' => 'contato.store',
        'uses' => 'ContatoController@index'
    ]);
});

$router->group(['prefix' => 'sobrenos', 'namespace' => 'Sobre'], function () use ($router) {
    $router->get('/', [
        'as' => 'sobre.index',
        'uses' => 'SobreController@index'
    ]);
});

$router->group(['prefix' => 'carrinho', 'namespace' => 'Carrinho'], function () use ($router) {
    $router->get('/', [
        'as' => 'carrinho.index',
        'uses' => 'CarrinhoController@index'
    ]);

    $router->post('/add', [
        'as' => 'carrinho.add',
        'uses' => 'CarrinhoController@add'
    ]);

    $router->patch('/{id}', [
        'as' => 'carrinho.update',
        'uses' => 'CarrinhoController@update'
    ]);

    $router->delete('/{id}', [
        'as' => 'carrinho.destroy',
        'uses' => 'CarrinhoController@destroy'
    ]);
});

$router->group(['prefix' => 'admin', 'namespace' => 'Admin'], function () use ($router) {
    $router->group(['prefix' => 'products', 'namespace' => 'Products'], function () use ($router) {
        $router->get('/', [
            'as' => 'admin.products.index',
            'uses' => 'ProductController@index'
        ]);

        $router->get('/all', [
            'as' => 'admin.products.all',
            'uses' => 'ProductController@all'
        ]);

        $router->get('/create', [
            'as' => 'admin.products.create',
            'uses' => 'ProductController@create'
        ]);

        $router->post('/create', [
            'as' => 'admin.products.store',
            'uses' => 'ProductController@store'
        ]);
    });

    $router->group(['prefix' => 'users', 'namespace' => 'Users'], function () use ($router) {
        $router->get('/', 'UserController@index');
    });
});

$router->group(['prefix' => 'auth', 'namespace' => 'Auth'], function () use ($router) {
    $router->get('/login', [
        'as' => 'login',
        'uses' => 'LoginController@index'
    ]);

    $router->get('/register', 'RegisterController@index');

    $router->post('/register', [
        'as' => 'auth.store',
        'uses' => 'RegisterController@store'
    ]);

    $router->get('/profile', 'ProfileController@index');
});

$router->group(['prefix' => 'products', 'namespace' => 'Products'], function () use ($router) {
    $router->get('/', [
        'as' => 'products.index',
        'uses' => 'ProductsController@index'
    ]);

    $router->post('/data', [
        'as' => 'products.data',
        'uses' => 'ProductsController@data'
    ]);

    $router->get('/{id}', 'ProductsController@details');
});