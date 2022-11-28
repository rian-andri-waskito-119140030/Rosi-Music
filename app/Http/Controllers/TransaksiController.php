<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Keuangan;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Http\Controllers\Controller;
use App\Models\TransaksiKeluar;
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

    public function tampil_transaksi_wa()
    {
        //get posts
        $transaksi_sistem = Transaksi::join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id_pesanan')
                            ->join('paket', 'pesanan.id_paket', '=', 'paket.id_paket')
                            ->join('pesanan_wa', 'pesanan.id_pesanan', '=', 'pesanan_wa.id_pesanan')
                            ->get();

        //return collection of posts as a resource
        return view('admin.transaksi.masuk.transaksi', ['data' => $transaksi_sistem]);
    }

    public function tampil_transaksi_keluar()
    {
        //get posts
        $transaksi = TransaksiKeluar::get();
        //return collection of posts as a resource
        return view('admin.transaksi.keluar.transaksi-keluar', ['data' => $transaksi]);
    }

    public function tambah_transaksi_keluar(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_transaksi'   => 'required',
            'pengeluaran'      => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create Pesanan

        $id = IdGenerator::generate(['table' => 'transaksi_keluar', 'field'=>'id_transaksi_keluar', 'length' => 12, 'prefix' => 'TK-']);
        $transaksi = TransaksiKeluar::create([
            'id_transaksi_keluar'   => $id,
            'nama_transaksi'        => $request->nama_transaksi,
            'waktu'                 => date("Y-m-d H:i:s"),
            'pengeluaran'           => $request->pengeluaran,

        ]);

        $id_keuangan = IdGenerator::generate(['table' => 'keuangan', 'field'=>'id_keuangan', 'length' => 12, 'prefix' => 'KU-']);
        Keuangan::create([
            'id_keuangan'   => $id_keuangan,
            'waktu'         => date("Y-m-d H:i:s"),
            'keterangan'    =>  $transaksi->nama_transaksi,
            'kredit'         => $transaksi->pengeluaran,
        ]);


        //return response
        return redirect()->back()->with('success', 'Transaksi Keluar Berhasil Ditambahkan');
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