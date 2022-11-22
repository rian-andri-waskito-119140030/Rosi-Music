<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananSistem extends Model
{
    use HasFactory;
    protected $table = 'pesanan_sistem';
    
    protected $fillable = [
        'id_pesanan',
        'id_pelanggan',
        'catatan',
        'status',
    ];
}