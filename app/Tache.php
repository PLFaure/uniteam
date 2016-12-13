<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    public function projet() {
        return $this->belongsTo(Projet::class);
    }

    public function commentaires() {
        return $this->hasMany(TCommentaire::class);
    }

    public function utilisateurs() {
        return $this->belongsToMany(Utilisateur::class);
    }
}
