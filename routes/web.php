<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('images/{folder}/{image}', function($folder, $image) {
    $file = \Storage::drive('uploads')->get( $folder . DIRECTORY_SEPARATOR . $image );
    $response = \Response::make( $file );
    $contentType = \Storage::drive('uploads')->mimeType($folder . DIRECTORY_SEPARATOR . $image);
    $response->header('Content-Type', $contentType);
    return $response;
});

//Rotas Gerais
//Route::get('/user', function(){
//    return view('usuario');
//});

Route::get('/anunc', 'Auth\RegisterController@getRegisterAd');
Route::get('/about', function(){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact');
});

Route::get('test', function() {
    if(DB::connection()->getDatabaseName())
    {
        echo "connected successfully to database ".DB::connection()->getDatabaseName();
    }
});

/*
|--------------------------------------------------------------------------
| Novas rotas
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'panel',
    'middleware' => ['auth']
], function() {
    Route::get('', 'Dashboard@index');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('profile', 'Users@profile');
    Route::post('profile', 'Users@update');

    /*
    |--------------------------------------------------------------------------
    | Rotas de eventos
    |--------------------------------------------------------------------------
    */
    Route::group([
        'prefix' => 'events'
    ], function() {
        /*
        |--------------------------------------------------------------------------
        | Lista de todos os eventos
        |--------------------------------------------------------------------------
        */

        Route::get('', 'Events@index');

        /*
        |--------------------------------------------------------------------------
        | Novo evento
        |--------------------------------------------------------------------------
        */
        Route::get('new', 'Events@create'); // Rota que visualiza o form
        Route::post('new', 'Events@store'); // Rota que salva o evento

        /*
        |--------------------------------------------------------------------------
        | Confirmados
        |--------------------------------------------------------------------------
        */
        Route::get('confirmeds', 'Events@confirmeds');
        Route::get('confirmeds/{id}', 'Events@confirmedsEvent');

        /*
        |--------------------------------------------------------------------------
        | Atualizar evento
        |--------------------------------------------------------------------------
        */
        Route::get('update/{id}', 'Events@edit');
        Route::post('update/{id}', 'Events@update');

        /*
        |--------------------------------------------------------------------------
        | Visualizar evento (detalhes)
        |--------------------------------------------------------------------------
        */
        Route::get('details/{id}', 'Events@details');

        /*
        |--------------------------------------------------------------------------
        | Cancelar e ativar evento
        |--------------------------------------------------------------------------
        */
        Route::get('cancel/{id}', 'Events@cancel');
        Route::get('active/{id}', 'Events@active');
    });

    /*
    |--------------------------------------------------------------------------
    | Rotas das categorias
    |--------------------------------------------------------------------------
    */
    Route::group([
        'prefix' => 'categories'
    ], function() {
        /*
        |--------------------------------------------------------------------------
        | Lista de todos as categorias
        |--------------------------------------------------------------------------
        */
        Route::get('', 'Categories@index');

        /*
        |--------------------------------------------------------------------------
        | Nova categoria
        |--------------------------------------------------------------------------
        */
        Route::get('new', 'Categories@create'); // Rota que visualiza o form
        Route::post('new', 'Categories@store'); // Rota que salva a categoria

        /*
        |--------------------------------------------------------------------------
        | Atualizar categoria
        |--------------------------------------------------------------------------
        */
        Route::get('update/{id}', 'Categories@edit');
        Route::post('update/{id}', 'Categories@update');

        /*
        |--------------------------------------------------------------------------
        | Deleta a categoria
        |--------------------------------------------------------------------------
        */
        Route::get('delete/{id}', 'Categories@delete');
    });
});

Auth::routes();

Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});

Route::get('new-pass', function() {
    echo bcrypt('12345678');
});

