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
use App\Models\BuktiPembayaran;
use App\Models\Pembayaran;
use App\Models\PesananSistem;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SocialiteController;


class BuktiPembayaranController extends Controller
{
    public function tampil()
    {
        //get posts
        $pesanan = BuktiPembayaran::join('transaksi', 'bukti_pembayaran.id_transaksi', '=', 'transaksi.id_transaksi')
                    ->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')->where('status_pembayaran', 'Menunggu Validasi')->get();

        //return collection of posts as a resource
        return view('admin.bukti_pembayaran.tampil_bukti', ['data' => $pesanan]);
    }
    
    public function checkout($id_pesanan)
    {
        $pesanan=Transaksi::where('id_pesanan', $id_pesanan)->first();

        if (Auth::guard('pelanggan')->check()) {
            $data=new SocialiteController;
            return view('pelanggan.checkout', ['pesanan' => $pesanan, 'data' => $data->profil() ]);
        } else {
            return view('pelanggan.tentang-kami', ['pesanan' => $pesanan]);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_transaksi'      => 'required',
            'bukti'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gambar = $request->file('bukti');
        $gambar->storeAs('public/bukti_pembayaran', $gambar->getClientOriginalName());

        //create Pesanan

        $id = IdGenerator::generate(['table' => 'bukti_pembayaran', 'field'=>'id_bukti_pembayaran', 'length' => 12, 'prefix' => 'BP-']);
        $pembayaran = BuktiPembayaran::create([
            'id_bukti_pembayaran'   => $id,
            'id_transaksi'          => $request->id_transaksi,
            'bukti'                 => $gambar->getClientOriginalName(),
            'nominal'               => $request->nominal,
            'status_pembayaran'     => 'Menunggu Validasi',
        ]);
        
        //return response
        return redirect('/');
    }

    public function validasi_pembayaran(Request $request)
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

        BuktiPembayaran::where('id_bukti_pembayaran', $request->id_bukti_pembayaran)->update([
            'status_pembayaran' => 'Tervalidasi'
        ]);

        //create Pesanan

        $id = IdGenerator::generate(['table' => 'pembayaran', 'field'=>'id_pembayaran', 'length' => 12, 'prefix' => 'PB-']);
        $pembayaran = Pembayaran::create([
            'id_pembayaran'     => $id,
            'id_transaksi'      => $request->id_transaksi,
            'uang_bayar'        => $request->uang_bayar,
            'waktu_bayar'       => date("Y-m-d H:i:s"),
        ]);

        $hutang=Hutang::where('id_transaksi', $request->id_transaksi);
        $hutang_pelanggan=$hutang->get();
        $hutang->update([
            'hutang'        => $hutang_pelanggan[0]->hutang - $request->uang_bayar,
        ]);

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
}