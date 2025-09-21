<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   protected $fillable = ['sale_id','item_id','quantity','price','amount'];

    public function sale() {
        return $this->belongsTo(Sale::class);
    }

    public function item() {
        return $this->belongsTo(Item::class, 'item_id'); // pastikan nama kolom sesuai
    }
}
