<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    public function projets() {
        return $this->belongsToMany(Projet::class);
    }

    public function compteRendus() {
        return $this->belongsToMany(CompteRendu::class);
    }

    public function reunions() {
        return $this->belongsToMany(Reunion::class);
    }

    public function taches() {
        return $this->belongsToMany(Tache::class);
    }

    public function crCommentaire() {
        return $this->hasMany(CRCommentaire::class);
    }

    public function rCommentaire() {
        return $this->hasMany(RCommentaire::class);
    }

    public function tCommentaire() {
        return $this->hasMany(TCommentaire::class);
    }
}
