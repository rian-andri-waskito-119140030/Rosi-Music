<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primaryKey = 'id_keuangan';
    public $incrementing = false;

    protected $fillable = [
        'id_keuangan',
        'waktu',
        'keterangan',
        'debit',
        'kredit',
    ];
}