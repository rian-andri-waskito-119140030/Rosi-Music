<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Pesanan;
use App\Models\PesananWA;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class TransaksiController extends Controller
{
    public function index()
    {
        //get posts
        $transaksi = Transaksi::join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                    ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                    // ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                    // ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                    // ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                    ->get();

        //return collection of posts as a resource
        return view('admin.transaksi.transaksi', ['data' => $transaksi]);
    }

    public function tampil_transaksi_sistem()
    {
        //get posts
        $transaksi_sistem = Transaksi::join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                            ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                            ->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')
                            ->join('users', 'pesanan_sistem.id_pelanggan', '=', 'users.id')
                            ->get();

        //return collection of posts as a resource
        return view('admin.transaksi.masuk.transaksi', ['data' => $transaksi_sistem]);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_pelanggan'      => 'required',
            'id_paket'          => 'required',
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

        $id = IdGenerator::generate(['table' => 'pesanan', 'field'=>'id_pesanan', 'length' => 6, 'prefix' => 'PS-']);
        $pesanan = Pesanan::create([
            'id_pesanan'        => $id,
            'id_pelanggan'      => $request->id_pelanggan,
            'id_paket'          => $request->id_paket,
            'tanggal_booking'   => $request->tanggal_booking,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'no_hp'             => $request->no_hp,
            'alamat'            => $request->alamat,
            'catatan'           => $request->catatan,
            'status'            => 'Menunggu Validasi',
        ]);

        //return response
        return redirect('/');
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