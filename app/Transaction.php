<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //import softdelete

class Transaction extends Model
{
    use SoftDeletes; //masukin softdelete ke kelas

    //field yg harus di assign
    protected $fillable = [
        "travel_packages_id", "users_id", "additional_visa", "transactional_total", "transactional_status"
    ];

    protected $hidden = [];


    // buat ngelink tabel gallery sama travel_package
    // belongs to bersifat inverse realtio0nship
    // parameter 1: model kelas tujuan, 2:foreign key, 3:local key
    
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, "travel_packages_id", "id");
    }

    public function details(){
        return $this->hasMany(TransactionDetail::class, "transaction_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class, "users_id","id");
    }

}
