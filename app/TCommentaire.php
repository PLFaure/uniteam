<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TCommentaire extends Model
{
    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }

    public function tache() {
        return $this->belongsTo(Tache::class);
    }
}
