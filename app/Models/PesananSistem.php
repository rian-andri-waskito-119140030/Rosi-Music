<?php

namespace App\Models;
use App\Models\Pesanan;
use App\Models\User;

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

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }

}