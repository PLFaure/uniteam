<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;
use App\Projet;
use App\Tache;

class TachesController extends Controller
{

    /**
     * Retourne la liste des tâches d'un projet
     *
     * @param Projet $projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function index(Projet $projet)
    {
        return $projet->taches();
    }

    /**
     * Retourne la tâche demandée
     *
     * @param Tache $tache
     *
     * @return Tache
     */
    public function show(Tache $tache) {
        return $tache;
    }

    /**
     * Retourne les participants de la tâche demandée
     *
     * @param Tache $tache
     *
     * @return array
     */
    public function showParticipants(Tache $tache) {
        return $tache->utilisateurs()->get()->all();
    }

    /**
     * Crée la tâche définie dans la requête
     *
     * @param Request $request
     *              nom: nom de la tâche
     *              deadline: date limite de la tâche
     *              duree: durée prévue pour la tâche
     *              etat: état de la tâche ("A faire", "En cours" ou "Terminé")
     *              avancement: taux d'avancement de la tâche (valeur pour 100)
     *              projet: identifiant du projet
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return mixed
     */
    public function store(Request $request) {
        // TODO EDITERRRRRR!!!!!!!!!!!!!!!!
        // Acces aux variables
        $nom = $request->input('nom');
        // TODO ajouter une description
        $deadline = $request->input('deadline');
        $duree = $request->input('duree');
        $etat = $request->input('etat');
        $avancement = $request->input('avancement');
        $projet = Projet::find($request->input('projet'));
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation de la tache
        $tache = new Tache();
        $tache->nom = $nom;
        $tache->deadline = $deadline;
        $tache->duree = $duree;
        $tache->etat = $etat;
        $tache->avancement = $avancement;
        $tache->projet()->associate($projet);

        // Sauvegarde en BD
        $tache->save();

        // Ajout du tuple tache-utilisateur à la table des correspondances
        $tache->utilisateurs()->attach($utilisateur);

        return $tache;
    }

    /**
     * Met à jour la tâche
     *
     * @param Tache $tache
     * @param Request $request requête, composée d'une ou plusieurs variables suivantes:
     *              nom: nouveau nom de la tâche
     *              deadline: nouvelle date limite de la tâche
     *              duree: nouvelle durée prévue pour la tâche
     *              etat: nouvel état de la tâche ("A faire", "En cours" ou "Terminé")
     *              avancement: nouveau taux d'avancement de la tâche (valeur pour 100)
     *              projet: nouvel identifiant du projet
     *              utilisateur: identifiant d'un nouvel utilisateur
     *
     * @return mixed
     */
    public function update(Tache $tache, Request $request) {
        // Acces aux variables
        $nom = $request->input('nom');
        $deadline = $request->input('deadline');
        $duree = $request->input('duree');
        $etat = $request->input('etat');
        $avancement = $request->input('avancement');
        $projet = Projet::find($request->input('projet'));
        $utilisateur_id = $request->input('utilisateur');
        $utilisateur = Utilisateur::find($utilisateur_id);

        // Edition de la tache
        $tache->nom = $nom;
        $tache->deadline = $deadline;
        $tache->duree = $duree;
        $tache->etat = $etat;
        $tache->avancement = $avancement;
        $tache->projet()->associate($projet);

        // Sauvegarde en BD
        $tache->save();

        // Ajout du tuple tache-utilisateur à la table des correspondances s'il n'y est pas déjà
        if (is_null($tache->utilisateurs()->find($utilisateur_id))) {
            $tache->utilisateurs()->attach($utilisateur);
        }

        //TODO ajouter une fonction pour la suppression d'utilisateurs

        return $tache;
    }

    /**
     * Supprime la tâche
     *
     * @param Tache $tache
     *
     * @return bool|null
     */
    public function destroy(Tache $tache) {
        return $tache->delete();
    }
}
