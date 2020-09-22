<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //import softdelete

class Gallery extends Model
{
    use SoftDeletes; //masukin softdelete ke kelas

    //field yg harus di assign
    protected $fillable = [
        "travel_packages_id", "image"
    ];

    protected $hidden = [];


    // buat ngelink tabel gallery sama travel_package
    // belongs to bersifat inverse realtio0nship
    // parameter 1: model kelas tujuang, 2:foreign key, 3:local key
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, "travel_packages_id", "id");
    }
}
