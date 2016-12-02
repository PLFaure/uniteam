<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RCommentaire extends Model
{
    public function reunion() {
        return $this->belongsTo(Reunion::class);
    }

    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }
}
