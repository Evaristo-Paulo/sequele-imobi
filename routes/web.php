<?php

use App\Municipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* PAINEL */
Route::get('/painel-de-controle', 'Painel\MainController@home')->name('home');
Route::get('/painel-de-controle/login', 'Painel\MainController@loginForm')->name('login');
Route::post('/painel-de-controle/login', 'Painel\MainController@login')->name('login.send');
Route::get('/painel-de-controle/logout', 'Painel\MainController@logout')->name('logout');

/* USER */
Route::get('/painel-de-controle/usuarios', 'Painel\UserController@list')->name('users');
Route::get('/painel-de-controle/usuarios/registo', 'Painel\UserController@registerForm')->name('users.register.form');
Route::post('/painel-de-controle/usuarios/registo', 'Painel\UserController@register')->name('users.register.send');
Route::get('/painel-de-controle/usuarios/{id}/actualizacao', 'Painel\UserController@updateForm')->name('users.update.form');
Route::put('/painel-de-controle/usuarios/{id}/actualizacao', 'Painel\UserController@update')->name('users.update');
Route::post('/painel-de-controle/usuarios/remove', 'Painel\UserController@remove')->name('users.remove');
Route::post('/painel-de-controle/usuarios/actualizacao-de-senha', 'Painel\UserController@changePassword')->name('users.change.password');

/* SITE */
Route::get('/', 'Site\MainController@home')->name('site.home');
Route::get('/catalogo-de-apartamentos', 'Site\MainController@catalog')->name('site.catalog'); 
Route::post('/catalogo-de-apartamentos-filtragem', 'Site\MainController@catalogFiltragem')->name('site.catalog.filter'); 
Route::get('/catalogo-de-apartamentos/{id}/detalhes', 'Site\MainController@detailApartament')->name('site.apartament.detail');

/* COLLABORATOR */
Route::Post('/colaboradores/registo', 'Site\CollaboratorController@register')->name('collaborators.register.send');
Route::get('/painel-de-controle/colaboradores', 'Site\CollaboratorController@list')->name('collaborators');
Route::post('/painel-de-controle/colaboradores/remocao', 'Site\CollaboratorController@remove')->name('collaborators.remove');
Route::get('/painel-de-controle/colaboradores/{id}/actualizacao', 'Site\CollaboratorController@updateForm')->name('collaborators.update.form');
Route::put('/painel-de-controle/colaboradores/{id}/actualizacao', 'Site\CollaboratorController@update')->name('collaborators.update');
Route::get('/colaboradores/logout', 'Site\MainController@logout')->name('collaborator.logout');
Route::get('/painel-de-controle/colaboradores/{id}/visualizacao', 'Site\CollaboratorController@view')->name('collaborators.view');
Route::get('/painel-de-controle/colaboradores/{id}/meu-perfil', 'Site\CollaboratorController@myProfile')->name('collaborators.profile');

/* APARTAMENTO */
Route::get('/painel-de-controle/apartamentos/registo', 'Painel\ApartmentController@registerForm')->name('apartments.register.form');
Route::get('/painel-de-controle/apartamentos', 'Painel\ApartmentController@list')->name('apartments');
Route::post('/painel-de-controle/apartamentos/registo', 'Painel\ApartmentController@register')->name('apartments.register.send');
Route::get('/painel-de-controle/apartamentos/{id}/actualizacao', 'Painel\ApartmentController@updateForm')->name('apartments.update.form');
Route::post('/painel-de-controle/apartamentos/remocao', 'Painel\ApartmentController@remove')->name('apartments.remove');
Route::get('/painel-de-controle/apartamentos/{id}/visualizacao', 'Painel\ApartmentController@view')->name('apartments.view');
Route::put('/painel-de-controle/apartamentos/{id}/actualizacao', 'Painel\ApartmentController@update')->name('apartments.update');


/* INTERESSES */
Route::post('/estou-interessado/registo', 'Painel\ApartmentController@registerInteress')->name('interests.register.send');
Route::get('/painel-de-controle/propostas', 'Painel\ApartmentController@interests')->name('interests');
Route::post('/painel-de-controle/propostas/remocao', 'Painel\ApartmentController@removeInterest')->name('interests.remove');


/* Filtragem */


/* POPULAR PROVÍNCIA/MUNICÍPIO */
Route::get('/ajax-subcat', function ( Request $request ) {
    $province_id = $request->input('province_id');
    $subcategoria = Municipe::where('province_id', '=', $province_id)->get();
    return Response::json($subcategoria);
});