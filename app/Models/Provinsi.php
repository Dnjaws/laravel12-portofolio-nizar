<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public function destinations()
    {
        return $this->hasMany(Destination::class, 'provincy_id', 'id');
    }
}
