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
Route::get('/v1/utilisateurs', 'UtilisateursController@index');//->middleware('auth.basic');
Route::get('/v1/utilisateurs/{utilisateur}', 'UtilisateursController@show');
Route::post('/v1/utilisateurs', 'UtilisateursController@store');
Route::put('/v1/utilisateurs/{utilisateur}', 'UtilisateursController@update');
Route::delete('/v1/utilisateurs/{utilisateur}', 'UtilisateursController@destroy');

// Projets
Route::get('/v1/projets/by/{utilisateur}', 'ProjetsController@index');
Route::get('/v1/projets/{projet}', 'ProjetsController@show');
Route::get('/v1/projets/{projet}/participants', 'ProjetsController@showParticipants'); // Participants d'un projet
Route::post('/v1/projets', 'ProjetsController@store');
Route::put('/v1/projets/{projet}', 'ProjetsController@update');
Route::delete('/v1/projets/{projet}', 'ProjetsController@destroy');

// Taches
Route::get('/v1/taches/by/{projet}', 'TachesController@index');
Route::get('/v1/taches/{tache}', 'TachesController@show');
Route::get('/v1/taches/{tache}/participants', 'TachesController@showParticipants');
Route::post('/v1/taches', 'TachesController@store');
Route::put('/v1/taches/{tache}', 'ProjetsController@update');
Route::delete('/v1/taches/{tache}', 'TachesController@destroy');

// Reunions
Route::get('/v1/reunions/by/{projet}/{utilisateur}', 'ReunionsController@index');
Route::get('/v1/reunions/{reunion}', 'ReunionsController@show');
Route::get('/v1/reunions/{reunion}/participants', 'ReunionsController@showParticipants');
Route::post('/v1/reunions', 'ReunionsController@store');
Route::put('/v1/reunions/{reunion}', 'ReunionsController@update');
Route::delete('/v1/reunions/{reunion}', 'ReunionsController@destroy');

// Comptes rendus
Route::get('/v1/comptes-rendus/by/{projet}', 'CompteRendusController@index');
Route::get('/v1/comptes-rendus/{compte_rendu}', 'CompteRendusController@show');
Route::get('/v1/comptes-rendus/{compte_rendu}/participants', 'CompteRendusController@showParticipants');
Route::post('/v1/comptes-rendus', 'CompteRendusController@store');
Route::put('/v1/comptes-rendus/{compte_rendu}', 'CompteRendusController@update');
Route::delete('/v1/comptes-rendus/{compte_rendu}', 'CompteRendusController@destroy');

// Commentaires de taches
Route::get('/v1/commentaires/taches/by/{tache}', 'TCommentairesController@index');
Route::get('/v1/commentaires/taches/{commentaire}', 'TCommentairesController@show');
Route::post('/v1/commentaires/taches', 'TCommentairesController@store');
Route::delete('/v1/commentaires/taches/{commentaire}', 'TCommentairesController@destroy');

// Commentaires de reunions
Route::get('/v1/commentaires/reunions/by/{reunion}', 'RCommentairesController@index');
Route::get('/v1/commentaires/reunions/{commentaire}', 'RCommentairesController@show');
Route::post('/v1/commentaires/reunions', 'RCommentairesController@store');
Route::delete('/v1/commentaires/reunions/{reunion}', 'RCommentairesController@destroy');

// Commentaires de comptes rendus
Route::get('/v1/commentaires/comptes-rendus/by/{compte_rendu}', 'CRCommentairesController@index');
Route::get('/v1/commentaires/comptes-rendus/{commentaire}', 'CRCommentairesController@show');
Route::post('/v1/commentaires/comptes-rendus', 'CRCommentairesController@store');
Route::delete('/v1/commentaires/comptes-rendus/{compte_rendu}', 'CRCommentairesController@destroy');
