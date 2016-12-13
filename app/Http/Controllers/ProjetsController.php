<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Projet;

class ProjetsController extends Controller
{
    /**
     * Retourne la liste des projets d'un utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function index(Utilisateur $utilisateur)
    {
        return $utilisateur->projets();
    }

    /**
     * Retourne le projet demandé
     *
     * @param Projet $projet
     *
     * @return Projet
     */
    public function show(Projet $projet) {
        return $projet;
    }

    /**
     * Retourne les participants du projet
     *
     * @param Projet $projet
     *
     * @return array
     */
    public function showParticipants(Projet $projet) {
        return $projet->utilisateurs()->get()->all();
    }

    /**
     * Crée le projet défini dans la requête
     *
     * @param Request $request
     *              nom: nom du projet
     *              description: description du projet
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return Projet
     */
    public function store(Request $request) {
        // Acces aux variables
        $nom = $request->input('nom');
        $description = $request->input('description');
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation du projet
        $projet = new Projet();
        $projet->nom = $nom;
        $projet->description = $description;

        // Sauvegarde en BD
        $projet->save();

        // Ajout du tuple projet-utilisateur à la table des correspondances
        $projet->utilisateurs()->attach($utilisateur);

        return $projet;
    }

    /**
     * Met à jour le projet
     *
     * @param Projet $projet
     * @param Request $request requête, composée d'une ou plusieurs variables suivantes:
     *              nom: nouveau nom du projet
     *              description: nouvelle description du projet
     *              utilisateur: identifiant d'un nouvel utilisateur
     *
     * @return mixed
     */
    public function update(Projet $projet, Request $request) {
        // Acces aux variables
        $nom = $request->input('nom');
        $description = $request->input('description');
        $utilisateur_id = $request->input('utilisateur');
        $utilisateur = Utilisateur::find($utilisateur_id);

        // Edition du projet
        $projet->nom = $nom;
        $projet->description = $description;

        // Sauvegarde en BD
        $projet->save();

        // Ajout du tuple projet-utilisateur à la table des correspondances s'il n'y est pas déjà
        if (is_null($projet->utilisateurs()->find($utilisateur_id))) {
            $projet->utilisateurs()->attach($utilisateur);
        }

        //TODO ajouter une fonction pour la suppression d'utilisateurs

        return $projet;
    }

    /**
     * Supprime le projet
     *
     * @param Projet $projet
     *
     * @return bool|null
     */
    public function destroy(Projet $projet) {
        return $projet->delete();
    }

}

