<?php

namespace App\Http\Controllers;

use App\CompteRendu;
use App\Projet;
use App\Reunion;
use App\Utilisateur;
use Illuminate\Http\Request;

class CompteRendusController extends Controller
{
    /**
     * Retourne la liste des comptes rendus d'un projet
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
     * Retourne le compte-rendu demandé
     *
     * @param CompteRendu $compte_rendu
     *
     * @return CompteRendu
     */
    public function show(CompteRendu $compte_rendu) {
        return $compte_rendu;
    }

    /**
     * Retourne les participants du compte-rendu demandé
     *
     * @param CompteRendu $compte_rendu
     *
     * @return array
     */
    public function showParticipants(CompteRendu $compte_rendu) {
        return $compte_rendu->utilisateurs()->get()->all();
    }

    /**
     * Crée le compte-rendu défini dans la requête
     *
     * @param Request $request
     *              sujet: sujet du compte-rendu
     *              description: description du compte-rendu
     *              reunion: identifiant de la réunion
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return mixed
     */
    public function store(Request $request) {
        // Acces aux variables
        $sujet = $request->input('sujet');
        $description = $request->input('description');
        $reunion = Reunion::find($request->input('reunion'));
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation du compte rendu
        $compte_rendu = new CompteRendu();
        $compte_rendu->sujet = $sujet;
        $compte_rendu->description = $description;
        $compte_rendu->reunion()->associate($reunion);

        // Sauvegarde en BD
        $compte_rendu->save();

        // Ajout du tuple compterendu-utilisateur à la table des correspondances
        $compte_rendu->utilisateurs()->attach($utilisateur);

        return $compte_rendu;
    }

    /**
     * Met à jour le compte-rendu
     *
     * @param CompteRendu $compte_rendu
     * @param Request $request requête, composée d'une ou plusieurs variables suivantes:
     *              sujet: nouveau sujet du compte-rendu
     *              description: nouvelle description du compte-rendu
     *              reunion: nouvel identifiant de la réunion
     *              utilisateur: identifiant d'un nouvel utilisateur
     *
     * @return mixed
     */
    public function update(CompteRendu $compte_rendu, Request $request) {
        // Acces aux variables
        $sujet = $request->input('sujet');
        $description = $request->input('description');
        $reunion = Reunion::find($request->input('reunion'));
        $utilisateur_id = $request->input('utilisateur');
        $utilisateur = Utilisateur::find($utilisateur_id);

        // Edition du compte-rendu
        $compte_rendu->sujet = $sujet;
        $compte_rendu->description = $description;
        $compte_rendu->reunion()->associate($reunion);

        // Sauvegarde en BD
        $compte_rendu->save();

        // Ajout du tuple compterendu-utilisateur à la table des correspondances s'il n'y est pas déjà
        if (is_null($compte_rendu->utilisateurs()->find($utilisateur_id))) {
            $compte_rendu->utilisateurs()->attach($utilisateur);
        }

        //TODO ajouter une fonction pour la suppression d'utilisateurs

        return $compte_rendu;
    }

    /**
     * Supprime le compte-rendu
     *
     * @param CompteRendu $compte_rendu
     *
     * @return bool|null
     */
    public function destroy(CompteRendu $compte_rendu) {
        return $compte_rendu->delete();
    }
}
