<?php

namespace App\Http\Controllers;

use App\Tache;
use App\TCommentaire;
use App\Utilisateur;
use Illuminate\Http\Request;

class TCommentairesController extends Controller
{
    /**
     * Retourne la liste des commentaires d'une tâche
     *
     * @param Tache $tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function index(Tache $tache)
    {
        return $tache->commentaires();
    }

    /**
     * Retourne le commentaire demandé
     *
     * @param TCommentaire $commentaire
     *
     * @return TCommentaire
     */
    public function show(TCommentaire $commentaire)
    {
        return $commentaire;
    }

    /**
     * Crée le commentaire défini dans la requête
     *
     * @param Request $request
     *              description: description du commentaire
     *              tache: identifiant de la tâche
     *              utilisateur: identifiant de l'utilisateur appelant
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        // Acces aux variables
        $description = $request->input('description');
        $tache = Tache::find($request->input('tache'));
        $utilisateur = Utilisateur::find($request->input('utilisateur'));

        // Creation du commentaire
        $commentaire = new TCommentaire();
        $commentaire->description = $description;
        $commentaire->tache()->associate($tache);
        $commentaire->utilisateur()->associate($utilisateur);

        // Sauvegarde en BD
        $commentaire->save();

        return $commentaire;
    }

    /**
     * Supprime le commentaire
     *
     * @param TCommentaire $commentaire
     *
     * @return bool|null
     */
    public function destroy(TCommentaire $commentaire)
    {
        return $commentaire->delete();
    }
}
