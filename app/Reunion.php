<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    public function compteRendu() {
        return $this->hasOne(CompteRendu::class);
    }

    public function lieu() {
        return $this->belongsTo(Lieu::class);
    }

    public function commentaires() {
        return $this->hasMany(RCommentaire::class);
    }

    public function projet() {
        return $this->belongsTo(Projet::class);
    }

    public function utilisateurs() {
        return $this->belongsToMany(Utilisateur::class);
    }
}
