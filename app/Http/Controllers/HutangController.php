<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Pesanan;
use App\Models\PesananWA;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Http\Controllers\Controller;
use App\Models\Hutang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class HutangController extends Controller
{
    public function index()
    {
        //get posts
        $hutang = Hutang::join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    // ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    // ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                    // ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                    ->get();

        //return collection of posts as a resource
        return view('admin.transaksi.transaksi', ['data' => $transaksi]);
    }

    public function tampil_hutang_sistem()
    {
        //get posts
        $hutang = Hutang::join('transaksi', 'hutang.id_transaksi', '=', 'transaksi.id_transaksi')
        ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
        ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
        ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
        // ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
        ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
        ->where('hutang', '!=', 0)
        ->get();

        //convert to rupiah
        $hutang = $hutang->map(function ($item, $key) {
            $item->hutang = "Rp " . number_format($item->hutang, 0, ',', '.');
            return $item;
        });
        // dd($hutang);
        //return collection of posts as a resource
        //return view('admin.hutang.tampil_hutang', ['data' => $hutang]);
        return response()->json([
            'status' => 'success',
            'data' => $hutang
        ], 200);
    }
    public function show_hutang_sistem()
    {
        //get posts
        $hutang = Hutang::join('transaksi', 'hutang.id_transaksi', '=', 'transaksi.id_transaksi')
        ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
        ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
        ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
        // ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
        ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
        ->where('hutang', '!=', 0)
        ->get();

        //convert to rupiah
        $hutang = $hutang->map(function ($item, $key) {
            $item->hutang = "Rp " . number_format($item->hutang, 0, ',', '.');
            return $item;
        });
        // dd($hutang);
        //return collection of posts as a resource
        return view('admin.hutang.tampil_hutang', ['data' => $hutang]);
        // return response()->json([
        //     'status' => 'success',
        //     'data' => $hutang
        // ], 200);
    }

    public function tampil_hutang_wa()
    {
        //get posts
        $hutang = Hutang::join('transaksi', 'hutang.id_transaksi', '=', 'transaksi.id_transaksi')
                    ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    // ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                    // ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                    ->get();
        //convert currency to rupiah
        $hutang = $hutang->map(function ($item, $key) {
            $item->hutang = "Rp " . number_format($item->hutang, 0, ',', '.');
            return $item;
        });
        //return collection of posts as a resource
        //return view('admin.hutang.tampil_hutang', ['data' => $hutang]);
        return response()->json([
            'status' => 'success',
            'data' => $hutang
        ], 200);
    }
    public function show_hutang_wa()
    {
        //get posts
        $hutang = Hutang::join('transaksi', 'hutang.id_transaksi', '=', 'transaksi.id_transaksi')
                    ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    // ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                    // ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                    ->get();
        //convert currency to rupiah
        $hutang = $hutang->map(function ($item, $key) {
            $item->hutang = "Rp " . number_format($item->hutang, 0, ',', '.');
            return $item;
        });
        //return collection of posts as a resource
        return view('admin.hutang.tampil_hutang_wa', ['data' => $hutang]);
        // return response()->json([
        //     'status' => 'success',
        //     'data' => $hutang
        // ], 200);
    }
    public function edit_hutang_wa($id_hutang){
        $hutang = Hutang::join('transaksi', 'hutang.id_transaksi', '=', 'transaksi.id_transaksi')
                    ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    // ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                    // ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                    ->where('id_hutang', $id_hutang)
                    ->first();
        return response()->json([
            'status' => 'success',
            'data' => $hutang
        ], 200);
    }
    public function edit_hutang_sistem($id_hutang){
        $hutang = Hutang::join('transaksi', 'hutang.id_transaksi', '=', 'transaksi.id_transaksi')
                    ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    // ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                    ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                    ->where('id_hutang', $id_hutang)
                    ->first();
        return response()->json([
            'status' => 'success',
            'data' => $hutang
        ], 200);
    }
}