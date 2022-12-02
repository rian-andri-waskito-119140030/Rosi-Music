<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Jenis_Paket;
use App\Http\Controllers\Controller;
use App\Models\BuktiPembayaran;
use App\Models\CatatanPenolakan;
use App\Models\Hutang;
use App\Models\Pesanan;
use App\Models\PesananSistem;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SocialiteController;


class PelangganController extends Controller
{
    public function index()
    {
        //get posts
        
        $jenis_paket = Jenis_Paket::get();

        if (Auth::guard('pelanggan')->check()) {
            $data=new SocialiteController;
            return view('pelanggan.dashboard', ['jenis' => $jenis_paket, 'data' => $data->profil() ]);
        } else {
            return view('pelanggan.dashboard', ['jenis' => $jenis_paket]);
        }
    }

    public function galeri()
    {
        if (Auth::guard('pelanggan')->check()) {
            $data=new SocialiteController;
            return view('pelanggan.galeri', ['data' => $data->profil() ]);
        } else {
            return view('pelanggan.galeri');
        }
    }

    public function tentang_kami()
    {
        if (Auth::guard('pelanggan')->check()) {
            $data=new SocialiteController;
            return view('pelanggan.tentang-kami', ['data' => $data->profil() ]);
        } else {
            return view('pelanggan.tentang-kami');
        }
    }
}