<?php

namespace App\Http\Controllers;

use App\CompteRendu;
use App\CRCommentaire;
use App\Utilisateur;
use Illuminate\Http\Request;

class CRCommentairesController extends Controller
{
    /**
     * Retourne la liste des commentaires d'un compte-rendu
     *
     * @param CompteRendu $compte_rendu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function index(CompteRendu $compte_rendu)
    {
        return $compte_rendu->commentaires();
    }

    /**
     * Retourne le commentaire demandé
     *
     * @param CRCommentaire $commentaire
     *
     * @return CRCommentaire
     */
    public function show(CRCommentaire $commentaire)
    {
        return $commentaire;
    }

    /**
     * Crée le commentaire défini dans la requête
     *
     * @param Request $request
     *              description: description du commentaire
     *              compte_rendu: identifiant du compte rendu
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        // Acces aux variables
        $description = $request->input('description');
        $compte_rendu = CompteRendu::find($request->input('compte_rendu'));
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation du commentaire
        $commentaire = new CRCommentaire();
        $commentaire->description = $description;
        $commentaire->compteRendu()->associate($compte_rendu);
        $commentaire->utilisateur()->associate($utilisateur);

        // Sauvegarde en BD
        $commentaire->save();

        return $commentaire;
    }

    /**
     * Supprime le commentaire
     *
     * @param CRCommentaire $commentaire
     *
     * @return bool|null
     */
    public function destroy(CRCommentaire $commentaire)
    {
        return $commentaire->delete();
    }
}
