<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //import softdelete

class TransactionDetail extends Model
{
    use SoftDeletes; //masukin softdelete ke kelas

    //field yg harus di assign
    protected $fillable = [
        "transaction_id","username","nationality","is_visa","doe_passpord"
    ];

    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

}
