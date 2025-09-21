<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_sales','customer_id','do_number','status'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
