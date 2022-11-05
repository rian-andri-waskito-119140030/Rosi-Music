<?php

namespace App\Models;
use App\Models\Barang;
use App\Models\Barang_Dipaket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Barang extends Model
{
    use HasFactory;
    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_jenis_barang';
    public $incrementing = false;

    protected $fillable = [
        'id_jenis_barang',
        'jenis_barang',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_jenis_barang');
    }
}