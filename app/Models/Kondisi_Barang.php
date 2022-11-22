<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi_Barang extends Model
{
    use HasFactory;
    protected $table = 'kondisi_barang';
    public $incrementing = false;

    protected $fillable = [
        'id_jenis_barang',
        'baik',
        'rusak',
        'diperbaiki',
    ];
}