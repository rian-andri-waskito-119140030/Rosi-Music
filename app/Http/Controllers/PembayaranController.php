<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Pesanan;
use App\Models\Paket;
use App\Http\Controllers\Controller;
use App\Models\CatatanPenolakan;
use App\Models\Hutang;
use App\Models\Keuangan;
use App\Models\Pembayaran;
use App\Models\PesananSistem;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PembayaranController extends Controller
{
    public function index()
    {
        //get posts
        $pesanan = Pesanan::join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')->join('users', 'pesanan.id_pelanggan', '=', 'users.id')->get();

        //return collection of posts as a resource
        // return view('admin.pesanan', ['data' => $pesanan]);
    }

    public function tampil()
    {
        //get posts
        $pesanan = Pesanan::join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')->where('status', 'Menunggu Validasi')->get();

        //return collection of posts as a resource
        return view('admin.pesanan.pesanan_sistem.pesanan', ['data' => $pesanan]);
    }
    public function edit_wa($id_transaksi){
        $transaksi = Transaksi::find($id_transaksi);
        if ($transaksi){
            return response()->json([
                'status' => 'success',
                'data' => $transaksi
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Transaksi tidak ditemukan'
        ], 404);
    }
    public function edit_sistem($id_transaksi){
        $transaksi = Transaksi::find($id_transaksi);
        if ($transaksi){
            return response()->json([
                'status' => 'success',
                'data' => $transaksi
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Transaksi tidak ditemukan'
        ], 404);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_transaksi'      => 'required',
            'uang_bayar'        => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create Pesanan

        $id = IdGenerator::generate(['table' => 'pembayaran', 'field'=>'id_pembayaran', 'length' => 12, 'prefix' => 'PB-']);
        $pembayaran = Pembayaran::create([
            'id_pembayaran'     => $id,
            'id_transaksi'      => $request->id_transaksi,
            'uang_bayar'        => $request->uang_bayar,
            'waktu_bayar'       => date("Y-m-d H:i:s"),
        ]);

        // $hutang=Hutang::where('id_transaksi', $request->id_transaksi);
        // $hutang_pelanggan=$hutang->get();
        // $hutang->update([
        //     'hutang'        => $hutang_pelanggan[0]->hutang - $request->uang_bayar,
        // ]);
        //update hutang
        $hutang = Hutang::where('id_transaksi', $request->id_transaksi)->first();
        $hutang->hutang = $hutang->hutang - $request->uang_bayar;
        $hutang->save();

        $id_keuangan = IdGenerator::generate(['table' => 'keuangan', 'field'=>'id_keuangan', 'length' => 12, 'prefix' => 'KU-']);
        Keuangan::create([
            'id_keuangan'   => $id_keuangan,
            'waktu'         => date("Y-m-d H:i:s"),
            'keterangan'    =>  "Pembayaran penyewaan ".$request->nama_paket." oleh ".$request->nama_pelanggan,
            'debit'         => $pembayaran->uang_bayar,
        ]);

        //return response
        return redirect()->back();
    }

    public function validasi_pesanan($id_pesanan)
    {
        //get posts
        PesananSistem::where('id_pesanan', $id_pesanan)->update([
            'status'    => "Tervalidasi",
        ]);

        $pesanan=Pesanan::where('id_pesanan', $id_pesanan)->get();

        $tgl1 = new \DateTime($pesanan[0]->tanggal_booking);
        $tgl2 = new \DateTime($pesanan[0]->tanggal_selesai);
        $selisih = ($tgl2->diff($tgl1)->d)+1;
        // dd($selisih);

        $paket=Paket::where('id_paket', $pesanan[0]->id_paket)->get();

        $bayar=($selisih*$paket[0]->harga_sewa)-(($selisih-1)*200000);
        // dd($bayar);

        $id_tr = IdGenerator::generate(['table' => 'transaksi', 'field'=>'id_transaksi', 'length' => 12, 'prefix' => 'TR-']);
        Transaksi::create([
            'id_transaksi'      => $id_tr,
            'id_pesanan'        => $id_pesanan,
            'total_bayar'       => $bayar,
            'waktu_transaksi'   => date("Y-m-d H:i:s"),
            'status_transaksi'  => 'Belum Dibayar',
        ]);

        //return collection of posts as a resource
        return redirect('/admin/pesanan-sistem');
    }
}