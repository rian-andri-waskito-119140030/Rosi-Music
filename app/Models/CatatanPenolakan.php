<?php

namespace App\Models;
use App\Models\Pesanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPenolakan extends Model
{
    use HasFactory;
    protected $table = 'catatan_penolakan';
    
    protected $fillable = [
        'id_pesanan',
        'catatan_penolakan',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}