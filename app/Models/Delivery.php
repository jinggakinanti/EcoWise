<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table='deliveries';
    protected $guarded=[];
    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
