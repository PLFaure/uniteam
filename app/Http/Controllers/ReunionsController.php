<?php

namespace App\Http\Controllers;

use App\Projet;
use App\Reunion;
use App\Utilisateur;
use App\Lieu;
use Illuminate\Http\Request;

class ReunionsController extends Controller
{
    /**
     * Retourne la liste des réunions d'un projet pour un utilisateur
     *
     * @param Projet $projet
     * @param Utilisateur $utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function index(Projet $projet, Utilisateur $utilisateur)
    {
        $reunions = $projet->reunions();
        // TODO: récupérer seulement les réunions de $utilisateur
        return $reunions;
    }

    /**
     * Retourne la réunion demandée
     *
     * @param Reunion $reunion
     *
     * @return Reunion
     */
    public function show(Reunion $reunion) {
        return $reunion;
    }

    /**
     * Retourne les participants de la réunion demandée
     *
     * @param Reunion $reunion
     *
     * @return array
     */
    public function showParticipants(Reunion $reunion) {
        return $reunion->utilisateurs()->get()->all();
    }

    /**
     * Crée la réunion définie dans la requête
     *
     * @param Request $request
     *              sujet: sujet de la réunion
     *              description: description de la réunion
     *              date: date de la réunion
     *              lieu: identifiant du lieu
     *              projet: identifiant du projet
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return mixed
     */
    public function store(Request $request) {
        // Acces aux variables
        $sujet = $request->input('sujet');
        $description = $request->input('description');
        $date = $request->input('date');
        $lieu = Lieu::find($request->input('lieu'));
        $projet = Projet::find($request->input('projet'));
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation de la tache
        $reunion = new Reunion();
        $reunion->sujet = $sujet;
        $reunion->description = $description;
        $reunion->date = $date;
        $reunion->lieu()->associate($lieu);
        $reunion->projet()->associate($projet);

        // Sauvegarde en BD
        $reunion->save();

        // Ajout du tuple reunion-utilisateur à la table des correspondances
        $reunion->utilisateurs()->attach($utilisateur);

        return $reunion;
    }

    /**
     * Met à jour la réunion
     *
     * @param Reunion $reunion
     * @param Request $request requête, composée d'une ou plusieurs variables suivantes:
     *              sujet: nouveau sujet de la réunion
     *              description: nouvelle description de la réunion
     *              date: nouvelle date de la réunion
     *              lieu: nouvel identifiant du lieu
     *              projet: nouvel identifiant du projet
     *              utilisateur: identifiant d'un nouvel utilisateur
     *
     * @return mixed
     */
    public function update(Reunion $reunion, Request $request) {
        // Acces aux variables
        $sujet = $request->input('sujet');
        $description = $request->input('description');
        $date = $request->input('date');
        $lieu = Lieu::find($request->input('lieu'));
        $projet = Projet::find($request->input('projet'));
        $utilisateur_id = $request->input('utilisateur');
        $utilisateur = Utilisateur::find($utilisateur_id);

        // Edition de la réunion
        $reunion = new Reunion();
        $reunion->sujet = $sujet;
        $reunion->description = $description;
        $reunion->date = $date;
        $reunion->lieu()->associate($lieu);
        $reunion->projet()->associate($projet);

        // Sauvegarde en BD
        $reunion->save();

        // Ajout du tuple reunion-utilisateur à la table des correspondances s'il n'y est pas déjà
        if (is_null($reunion->utilisateurs()->find($utilisateur_id))) {
            $reunion->utilisateurs()->attach($utilisateur);
        }

        //TODO ajouter une fonction pour la suppression d'utilisateurs

        return $reunion;
    }

    /**
     * Supprime la reunion
     *
     * @param Reunion $reunion
     *
     * @return bool|null
     */
    public function destroy(Reunion $reunion) {
        return $reunion->delete();
    }
}
