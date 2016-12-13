<?php

namespace App\Http\Controllers;

use Hamcrest\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Utilisateur;

class UtilisateursController extends Controller
{
    // TODO fonction pour récupérer l'utilisateur par id facebook
    // TODO fonction pour mondifier seulement le token de l'utilisateur

    /**
     * Retourne la liste de tous les utilisateurs
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index() {
        return Utilisateur::all();
    }

    /**
     * Retourne l'utilisateur demandé
     *
     * @param Utilisateur $utilisateur
     *
     * @return Utilisateur
     */
    public function show(Utilisateur $utilisateur) {
        return $utilisateur;
    }

    /**
     * Crée l'utilisateur défini dans la requête
     *
     * @param Request $request
     *              facebook: id facebook de l'utilisateur
     *              token: token de connexion facebook de l'utilisateur
     *              nom: nom de famille de l'utilisateur
     *              prenom: prenom de l'utilisateur
     *              email: email de l'utilisateur
     *
     * @return Utilisateur
     */
    public function store(Request $request) {
        // Acces aux variables
        $facebook = $request->input('facebook');
        $token = $request->input('token');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');

        // Creation de l'utilisateur
        $utilisateur = new Utilisateur();
        $utilisateur->facebook = $facebook;
        $utilisateur->token = $token;
        $utilisateur->nom = $nom;
        $utilisateur->prenom = $prenom;
        $utilisateur->email = $email;

        // TODO ajouter une condition, si l'id facebook existe déjà en BD

        // Sauvegarde en BD
        $utilisateur->save();

        return $utilisateur;
    }

    /**
     * Met à jour l'utilisateur
     *
     * @param Utilisateur $utilisateur
     * @param Request $request requête, composée d'une ou plusieurs variables suivantes:
     *              facebook: nouvel identifiant facebook de l'utilisateur
     *              token: nouveau token facebook de l'utilisateur*
     *              nom: nouveau nom de l'utilisateur
     *              prenom: nouveau prenom de l'utilisateur
     *              email: nouvel email de l'utilisateur
     *
     * @return mixed
     */
    public function update(Utilisateur $utilisateur, Request $request) {

        // Acces aux variables
        $facebook = $request->input('facebook');
        $token = $request->input('token');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');

        // Stockage
        $utilisateur->facebook = $facebook;
        $utilisateur->token = $token;
        $utilisateur->nom = $nom;
        $utilisateur->prenom = $prenom;
        $utilisateur->email = $email;

        // Sauvegarde en BD
        $utilisateur->save();
        return $utilisateur;
    }

    /**
     * Supprime l'utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return bool|null
     */
    public function destroy(Utilisateur $utilisateur) {
        return $utilisateur->delete();

        /* VERSION 1
        return DB::table('utilisateurs')->where('id', $id)->delete();*/
    }
}
