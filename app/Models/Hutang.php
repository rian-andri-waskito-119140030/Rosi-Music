<?php

namespace App\Models;
use App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;
    protected $table = 'hutang';
    protected $primaryKey = 'id_hutang';
    public $incrementing = false;
    
    protected $fillable = [
        'id_hutang',
        'id_transaksi',
        'hutang',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}