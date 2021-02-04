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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*Route::get('/', function () {
    User::create([
        'name'=>'Admin',
        'email'=>'admin@admin',
        'password'=>bcrypt(123),
        'tipo_usuario_id'=>1
    ]);
    return view('welcome');
});*/
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('livro', 'LivroController');
    Route::resource('autor', 'AutorController');
    Route::resource('categoria', 'CategoriaController');
    Route::resource('editora', 'EditoraController');
    Route::resource('emprestimo', 'EmprestimoController');
    Route::resource('exemplar', 'ExemplarController');
    Route::get('admin/relatoriolivroexemplares', 'AdminController@RelatorioLivroExemplares');
    Route::resource('admin', 'AdminController');

    Route::get('storage/{tipo}/{filename}', function ($tipo, $filename) {
        $path = "$tipo/$filename";

        if (!Storage::exists($path)) {
            abort(404);
        }
        $type = Storage::mimeType($path);

        $response = response()->file(storage_path("app/$path"), [$type]);

        return $response;
    });

});
    Route::get('/teste', function () {
echo bcrypt(123);
    });

