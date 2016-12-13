<?php

namespace App\Http\Controllers;

use App\RCommentaire;
use App\Reunion;
use App\Utilisateur;
use Illuminate\Http\Request;

class RCommentairesController extends Controller
{
    /**
     * Retourne la liste des commentaires d'une réunion
     *
     * @param Reunion $reunion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function index(Reunion $reunion)
    {
        return $reunion->commentaires();
    }

    /**
     * Retourne le commentaire demandé
     *
     * @param RCommentaire $commentaire
     *
     * @return RCommentaire
     */
    public function show(RCommentaire $commentaire)
    {
        return $commentaire;
    }

    /**
     * Crée le commentaire défini dans la requête
     *
     * @param Request $request
     *              description: description du commentaire
     *              réunion: identifiant de la réunion
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        // Acces aux variables
        $description = $request->input('description');
        $reunion = Reunion::find($request->input('reunion'));
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation du commentaire
        $commentaire = new RCommentaire();
        $commentaire->description = $description;
        $commentaire->reunion()->associate($reunion);
        $commentaire->utilisateur()->associate($utilisateur);

        // Sauvegarde en BD
        $commentaire->save();

        return $commentaire;
    }

    /**
     * Supprime le commentaire
     *
     * @param RCommentaire $commentaire
     *
     * @return bool|null
     */
    public function destroy(RCommentaire $commentaire)
    {
        return $commentaire->delete();
    }
}
