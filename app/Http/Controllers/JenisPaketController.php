<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Jenis_Paket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class JenisPaketController extends Controller
{
    public function index()
    {
        //get posts
        $jenis_paket = Jenis_Paket::get();

        //return collection of posts as a resource
        return view('pelanggan.dashboard', ['data' => $jenis_paket]);
    }

    public function tampil()
    {
        //get posts
        $jenis_paket = Jenis_Paket::get();

        //return collection of posts as a resource
        return view('admin.jenis_paket.jenis_paket', ['data' => $jenis_paket]);
    }

    public function tambah()
    {

        //return collection of posts as a resource
        return view('admin.jenis_paket.tambah_jenis_paket');
    }


    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'jenis_paket'   => 'required',
            'gambar'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'deskripsi'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/jenis_paket', $gambar->getClientOriginalName());

        //create Jenis_Barang
        $id = IdGenerator::generate(['table' => 'jenis_paket', 'field'=>'id_jenis_paket', 'length' => 6, 'prefix' => 'JP-']);
        $barang = Jenis_Paket::create([
            'id_jenis_paket' => $id,
            'jenis_paket'    => $request->jenis_paket,
            'gambar'         => $gambar->getClientOriginalName(),
            'deskripsi'     => $request->deskripsi,
        ]);

        //return response
        return response()->json([
            'message' => 'Jenis Paket berhasil ditambahkan',
            'data'    => $barang,
        ]);
    }

    public function show(Jenis_Paket $jenis_paket)
    {
        //return single post as a resource
        return response()->json([
            'message' => 'Jenis barang berhasil ditemukan',
            'data'    => $jenis_paket,
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