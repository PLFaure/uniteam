<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    public function reunions() {
        return $this->hasMany(Reunion::class);
    }
}
