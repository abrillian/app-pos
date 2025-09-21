<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;
    protected $table = 'identitas';
    protected $fillable = [
        'nama_identitas','badan_hukum','npwp','email','url','alamat',
        'telp','fax','rekening','foto'
    ];
}
