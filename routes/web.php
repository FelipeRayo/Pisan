<?php

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

Route::get('mi-ruta-amigable',function (){
    return 'Esta es mi ruta';
});

Route::get('saludo-amigable-con-laravel/{person?}', function($name ='a todos'){
    return 'Hola ' . $name;
})->name('amigo');

Route::get('pares-hasta-{number}', function($number){
    $out = [];
    for($i = 0; $i <=$number; $i++){
        if ($i % 2 == 0) {
            $out[] = $i;
        }
    }
    return json_encode($out);
})->where(['number' => '[\d]+']);

Route::get('hola', function(){
    //return redirect()->to('saludo-cordial/Felipe');
    return redirect()->route('amigo',['person' => 'Santiago']);
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('modificar-usuario', function(){
        return 'Aquí se modifica el usuario';
    });

    Route::get('ingresar-dinero', function(){
        return 'Aquí se ingresa el dinero';
    });
});
