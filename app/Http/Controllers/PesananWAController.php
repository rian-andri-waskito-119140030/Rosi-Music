<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\PesananWA;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PesananController extends Controller
{
    public function index()
    {
        //get posts
        $pesanan = PesananWA::join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')->join('users', 'pesanan.id_pelanggan', '=', 'users.id')->get();

        //return collection of posts as a resource
        // return view('admin.pesanan', ['data' => $pesanan]);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_paket'          => 'required',
            'nama_pelanggan'    => 'required',
            'tanggal_booking'   => 'required',
            'tanggal_selesai'   => 'required',
            'no_hp'             => 'required',
            'alamat'            => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create Pesanan

        $id = IdGenerator::generate(['table' => 'pesanan_wa', 'field'=>'id_pesanan', 'length' => 6, 'prefix' => 'PW-']);
        $pesanan = PesananWA::create([
            'id_pesanan'        => $id,
            'nama_pelanggan'    => $request->nama_pelanggan,
            'id_paket'          => $request->id_paket,
            'tanggal_booking'   => $request->tanggal_booking,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'no_hp'             => $request->no_hp,
            'alamat'            => $request->alamat,
        ]);

        $tgl1 = new DateTime($pesanan->tanggal_booking);
        $tgl2 = new DateTime($pesanan->tanggal_selesai);
        $selisih = $tgl2->diff($tgl1);

        $paket=Paket::where('id_paket', $pesanan->id_paket);

        $bayar=($selisih*$paket[0]->harga_sewa)-(($selisih-1)*200000);

        $id_tr = IdGenerator::generate(['table' => 'transaksi', 'field'=>'id_transaksi', 'length' => 6, 'prefix' => 'TR-']);
        Transaksi::create([
            'id_transaksi'      => $id_tr,
            'id_pesanan'        => $pesanan->id_pesanan,
            'total_bayar'       => $bayar,
            'waktu_transaksi'   => date("Y-m-d H:i:s"),
            'status'            => 'Belum Dibayar',
        ]);

        //return response
        return redirect('/admin/pesanan-wa');
    }

    public function validasi_pesanan($id_pesanan)
    {
        //get posts
        $pesanan = Pesanan::join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')->join('users', 'pesanan.id_pelanggan', '=', 'users.id')->get();

        //return collection of posts as a resource
        // return view('admin.pesanan', ['data' => $pesanan]);
    }

    public function show(Paket $paket)
    {
        $paket=Paket::with('barang_dipaket')->find($paket->id_paket);
        //return single post as a resource
        return response()->json([
            'message' => 'Barang berhasil ditemukan',
            'data'    => $paket,
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'    => 'required',
            'jenis_barang'   => 'required',
            'kondisi'        => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('gambar')) {

            //upload image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/barang', $gambar->getClientOriginalName());

            //delete old image
            Storage::delete('public/barang/'.$barang->gambar);

            //update post with new image
            $barang->update([
                'gambar'         => $gambar->getClientOriginalName(),
                'nama_barang'    => $request->nama_barang,
                'jenis_barang'   => $request->jenis_barang,
                'kondisi'        => $request->kondisi,
            ]);

        } else {

            //update post without image
            $barang->update([
                'nama_barang'    => $request->nama_barang,
                'jenis_barang'   => $request->jenis_barang,
                'kondisi'        => $request->kondisi,
            ]);
        }

        //return response
        return response()->json([
            'message' => 'Barang berhasil diubah',
            'data'    => $barang,
        ]);
    }

    public function checkout($id_pesanan)
    {
        $pesanan=Pesanan::where('id_pesanan', $id_pesanan)->get();
        
        return view('pelanggan.checkout', ['data' => $pesanan]);
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Barang $barang)
    {
        //delete image
        Storage::delete('public/barang/'.$barang->gambar);

        //delete post
        $barang->delete();

        //return response
        return response()->json([
            'message' => 'Barang berhasil dihapus',
        ]);
    }
}