<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //import softdelete

class TravelPackage extends Model
{
    use SoftDeletes; //masukin softdelete ke kelas

    //field yg harus di assign
    protected $fillable = [
        "title", "slug", "location", "about", "featured_event",
        "language", "foods", "departure_date", "duration",
        "type", "price"
    ];

    protected $hidden = [];

    // buat relasi database
    // hasmany -> bisa punya banyak pasangan
    // model, foreignkey, localkey
    public function galleries(){
        return $this->hasMany(Gallery::class, "travel_packages_id", "id");
    }
}
