<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CRCommentaire extends Model
{
    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }

    public function compteRendu() {
        return $this->belongsTo(CompteRendu::class);
    }
}
