<?php

namespace App\Models;
use App\Models\Paket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananWA extends Model
{
    use HasFactory;
    protected $table = 'pesanan_wa';
    
    protected $fillable = [
        'id_pesanan',
        'nama',
    ];
}