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
}
