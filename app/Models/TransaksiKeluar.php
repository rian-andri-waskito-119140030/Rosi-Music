<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluar extends Model
{
    use HasFactory;
    protected $table = 'transaksi_keluar';
    protected $primaryKey = 'id_transaksi_keluar';
    public $incrementing = false;
    
    protected $fillable = [
        'id_transaksi_keluar',
        'nama_transaksi',
        'waktu',
        'pengeluaran',
    ];

}