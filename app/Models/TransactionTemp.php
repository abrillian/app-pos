<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTemp extends Model
{
    use HasFactory;
    protected $fillable = ['item_id','quantity','price','amount','session_id','remark'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
