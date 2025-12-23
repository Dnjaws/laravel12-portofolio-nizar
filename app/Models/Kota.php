<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    public function destinations()
    {
        return $this->hasMany(Destination::class, 'city_id', 'id');
    }
}
