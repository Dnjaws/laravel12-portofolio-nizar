<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'img_url',
        'open_hours',
        'price',
        'website',
        'category_id',
        'provincy_id',
        'city_id',
        'state_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function galleries()
    {
        return $this->hasMany(DestinationGallery::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'destination_facility', 'destination_id', 'facility_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provincy_id', 'id');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'city_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'state_id', 'id');
    }


    public function likes()
    {
        return $this->hasMany(DestinationLike::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($destination) {
            $destination->galleries()->delete();
        });
    }


}
