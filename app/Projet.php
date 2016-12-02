<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    public function reunions() {
        return $this->hasMany(Reunion::class);
    }

    public function taches() {
        return $this->hasMany(Tache::class);
    }

    public function utilisateurs() {
        return $this->belongsToMany(Utilisateur::class);
    }
}
