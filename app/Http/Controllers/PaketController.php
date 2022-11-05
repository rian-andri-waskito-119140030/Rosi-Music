<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Paket;
use App\Models\Jenis_Paket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PaketController extends Controller
{
    public function index($id_jenis_paket)
    {
        //get posts
        $paket=Jenis_Paket::with('paket')->where('id_jenis_paket', $id_jenis_paket)->get();

        //return collection of posts as a resource
        return view('pelanggan.daftar-paket', ['data' => $paket]);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_jenis_paket'     => 'required',
            'nama_paket'         => 'required',
            'gambar'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'harga_sewa'         => 'required',
            'deskripsi_singkat'  => 'required',
            'deskripsi_panjang'  => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

         // dd($request->all());
         $gambar = $request->file('gambar');
         $gambar->storeAs('public/paket', $gambar->getClientOriginalName());

        //create Meja
        $id = IdGenerator::generate(['table' => 'paket', 'field'=>'id_paket', 'length' => 6, 'prefix' => 'PK-']);
        $paket = Paket::create([
            'id_paket'          => $id,
            'id_jenis_paket'    => $request->id_jenis_paket,
            'nama_paket'        => $request->nama_paket,
            'gambar'            => $gambar->getClientOriginalName(),
            'harga_sewa'        => $request->harga_sewa,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi_panjang' => $request->deskripsi_panjang,
        ]);

        //return response
        return response()->json([
            'message' => 'Paket berhasil ditambahkan',
            'data'    => $paket,
        ]);
    }

    public function show($id_paket)
    {
        $paket=Paket::where('id_paket', $id_paket)->get();
        //return single post as a resource
        // return response()->json([
        //     'message' => 'Paket berhasil ditambahkan',
        //     'data'    => $paket,
        // ]);
        return view('pelanggan.deskripsi-paket', ['data' => $paket[0]]);
    }

    public function pesanan($id_paket)
    {
        $paket=Paket::where('id_paket', $id_paket)->get();
        //return single post as a resource
        
        return view('pelanggan.pesanan', ['data' => $paket[0]]);
    }

    public function update(Request $request, Barang $barang)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'    => 'required',
            'id_jenis_barang'=> 'required',
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
                'id_jenis_barang'=> $request->jenis_barang,
                'kondisi'        => $request->kondisi,
            ]);

        } else {

            //update post without image
            $barang->update([
                'nama_barang'    => $request->nama_barang,
                'id_jenis_barang'=> $request->jenis_barang,
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