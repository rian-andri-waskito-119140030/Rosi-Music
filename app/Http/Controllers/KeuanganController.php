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
use App\Models\Keuangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class KeuanganController extends Controller
{
    public function index()
    {
        //get posts dan hitung saldo tiap tambah transaksi
        //hitung saldo tiap tambah transaksi
       
        
        $keuangan = Keuangan::all();

        //dd($keuangan);

        //return collection of posts as a resource
        return view('admin.keuangan', ['data' => $keuangan]);
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
        ->get();

        // dd($hutang);
        //return collection of posts as a resource
        return view('admin.hutang.tampil_hutang', ['data' => $hutang]);
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

        //return collection of posts as a resource
        return view('admin.hutang.tampil_hutang', ['data' => $hutang]);
    }

    public function search_by_daterange(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        if($start == $end){
            $keuangan = Keuangan::whereDate('waktu', $start)->get();
        }else{
            $keuangan = Keuangan::whereBetween('waktu', [$start, $end])->get();
        }
        //dd($keuangan);

        return view('admin.keuangan', ['data' => $keuangan]);

        //search date range by ajax and jquery
        // if ($request->ajax()){
        //     if($request->start == $request->end){
        //         $keuangan = Keuangan::whereDate('created_at', $request->start)->get();
        //         //convert currency to rupiah
        //         foreach($keuangan as $data){
        //             $data->saldo = "Rp. ".number_format($data->saldo, 0, ',', '.');
        //             $data->debit = "Rp. ".number_format($data->debit, 0, ',', '.');
        //             $data->kredit = "Rp. ".number_format($data->kredit, 0, ',', '.');
        //         }
        //     }else{
        //         $keuangan = Keuangan::whereBetween('created_at', [$request->start, $request->end])->get();
        //         foreach($keuangan as $data){
        //             $data->saldo = "Rp. ".number_format($data->saldo, 0, ',', '.');
        //             $data->debit = "Rp. ".number_format($data->debit, 0, ',', '.');
        //             $data->kredit = "Rp. ".number_format($data->kredit, 0, ',', '.');
        //         }
        //     }
        //     dd($keuangan);
        //     $html = view('admin.keuangan', ['data' => $keuangan])->render();
        //     return $html;
        // }


    }
}