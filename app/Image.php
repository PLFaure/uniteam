<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function compteRendu() {
        return $this->belongsTo(CompteRendu::class);
    }
}
