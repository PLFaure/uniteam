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
     * Crée la tâche définie dans la requête
     *
     * @param Projet $projet
     *
     * @param Request $request
     *              nom: nom de la tâche
     *              deadline: date limite de la tâche
     *              duree: durée prévue pour la tâche
     *              etat: état de la tâche ("A faire", "En cours" ou "Terminé")
     *              avancement: taux d'avancement de la tâche (valeur pour 100)
     *
     * @return mixed
     */
    public function store(Projet $projet,Request $request) {
        // TODO EDITERRRRRR!!!!!!!!!!!!!!!!
        // Acces aux variables
        $nom = $request->input('nom');
        // TODO ajouter une description
        $deadline = $request->input('deadline');
        $duree = $request->input('duree');
        $etat = $request->input('etat');
        $avancement = $request->input('avancement');

        // Creation de l'utilisateur
        $tache = new Tache();
        $tache->nom = $nom;
        $tache->deadline = $deadline;
        $tache->duree = $duree;
        $tache->etat = $etat;
        $tache->avancement = $avancement;

        // Sauvegarde en BD
        $tache->save();

        return $tache;
    }

    public function destroy(Tache $tache) {
        return $tache->delete();
    }
}
