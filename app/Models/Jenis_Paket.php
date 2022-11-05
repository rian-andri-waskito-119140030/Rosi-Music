<?php

namespace App\Models;

use App\Models\Paket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Paket extends Model
{
    use HasFactory;
    protected $table = 'jenis_paket';
    protected $primaryKey = 'id_jenis_paket';
    public $incrementing = false;

    protected $fillable = [
        'id_jenis_paket',
        'jenis_paket',
        'gambar',
        'deskripsi',
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'id_jenis_paket');
    }
}