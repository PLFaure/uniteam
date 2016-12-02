<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompteRendu extends Model
{
    public function reunion() {
        return $this->belongsTo(Reunion::class);
    }

    public function commentaires() {
        return $this->hasMany(CRCommentaire::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function utilisateurs() {
        return $this->belongsToMany(Utilisateur::class);
    }
}
