<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Utilisateurs
Route::get('/v1/utilisateurs', 'UtilisateursController@index')->middleware('auth.basic');
Route::get('/v1/utilisateurs/{utilisateur}', 'UtilisateursController@show')->middleware('auth.basic');
Route::post('/v1/utilisateurs', 'UtilisateursController@store')->middleware('auth.basic');
Route::put('/v1/utilisateurs/{utilisateur}', 'UtilisateursController@update')->middleware('auth.basic');
Route::delete('/v1/utilisateurs/{utilisateur}', 'UtilisateursController@destroy')->middleware('auth.basic');

// Projets
Route::get('/v1/projets/{utilisateur}', 'ProjetsController@index')->middleware('auth.basic');
Route::get('/v1/projets/{projet}', 'ProjetsController@show')->middleware('auth.basic');
Route::get('/v1/projets/{projet}/participants', 'ProjetsController@showParticipants')->middleware('auth.basic'); // Participants d'un projet
Route::post('/v1/projets', 'ProjetsController@store')->middleware('auth.basic');
Route::put('/v1/projets/{projet}', 'ProjetsController@update')->middleware('auth.basic');
Route::delete('/v1/projets/{projet}', 'ProjetsController@destroy')->middleware('auth.basic');

// Taches
Route::get('/v1/taches/{projet}', 'TachesController@index')->middleware('auth.basic');
Route::get('/v1/taches/{tache}', 'TachesController@show')->middleware('auth.basic');
Route::get('/v1/taches/{tache}/participants', 'TachesController@showParticipants')->middleware('auth.basic');
Route::post('/v1/taches/{projet}', 'TachesController@store')->middleware('auth.basic');
Route::put('/v1/taches/{tache}', 'ProjetsController@update')->middleware('auth.basic');
Route::delete('/v1/taches/{tache}', 'TachesController@destroy')->middleware('auth.basic');

// Reunions
Route::get('/v1/reunions/{projet}/{utilisateur}', 'ReunionsController@index')->middleware('auth.basic');
Route::get('/v1/reunions/{reunion}', 'ReunionsController@show')->middleware('auth.basic');
Route::get('/v1/reunions/{reunion}/participants', 'ReunionsController@showParticipants')->middleware('auth.basic');
Route::post('/v1/reunions/{projet}', 'ReunionsController@store')->middleware('auth.basic');
Route::put('/v1/reunions/{reunion}', 'ReunionsController@update')->middleware('auth.basic');
Route::delete('/v1/reunions/{reunion}', 'ReunionsController@destroy')->middleware('auth.basic');

// Comptes rendus
Route::get('/v1/comptes-rendus/{projet}', 'CompteRendusController@index')->middleware('auth.basic');
Route::get('/v1/comptes-rendus/{compte-rendu}', 'CompteRendusController@show')->middleware('auth.basic');
Route::get('/v1/comptes-rendus/{compte-rendu}/participants', 'CompteRendusController@showParticipants')->middleware('auth.basic');
Route::post('/v1/comptes-rendus/{reunion}', 'CompteRendusController@store')->middleware('auth.basic');
Route::put('/v1/comptes-rendus/{compte-rendu}', 'CompteRendusController@update')->middleware('auth.basic');
Route::delete('/v1/comptes-rendus/{compte-rendu}', 'CompteRendusController@destroy')->middleware('auth.basic');

// Commentaires de taches
Route::get('/v1/commentaires/taches/{tache}', 'TCommentairesController@index')->middleware('auth.basic');
Route::get('/v1/commentaires/taches/{commentaire}', 'TCommentairesController@show')->middleware('auth.basic');
Route::post('/v1/commentaires/taches{tache}', 'TCommentairesController@store')->middleware('auth.basic');
Route::delete('/v1/commentaires/taches/{commentaire}', 'TCommentairesController@destroy')->middleware('auth.basic');

// Commentaires de reunions
Route::get('/v1/commentaires/reunions/{reunion}', 'RCommentairesController@index')->middleware('auth.basic');
Route::get('/v1/commentaires/reunions/{commentaire}', 'RCommentairesController@show')->middleware('auth.basic');
Route::post('/v1/commentaires/reunions{reunion}', 'RCommentairesController@store')->middleware('auth.basic');
Route::delete('/v1/commentaires/reunions/{reunion}', 'RCommentairesController@destroy')->middleware('auth.basic');

// Commentaires de comptes rendus
Route::get('/v1/commentaires/comptes-rendus/{compte-rendu}', 'CRCommentairesController@index')->middleware('auth.basic');
Route::get('/v1/commentaires/comptes-rendus/{commentaire}', 'CRCommentairesController@show')->middleware('auth.basic');
Route::post('/v1/commentaires/comptes-rendus{compte-rendu}', 'CRCommentairesController@store')->middleware('auth.basic');
Route::delete('/v1/commentaires/comptes-rendus/{compte-rendu}', 'CRCommentairesController@destroy')->middleware('auth.basic');
