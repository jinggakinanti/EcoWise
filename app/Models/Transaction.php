<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table='transactions';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaction_details(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }
}
