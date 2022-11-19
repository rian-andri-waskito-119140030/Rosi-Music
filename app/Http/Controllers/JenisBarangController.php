<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Jenis_Barang;
use App\Models\Kondisi_Barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class JenisBarangController extends Controller
{
    public function index()
    {
        //get posts
        $jenis_barang = Jenis_Barang::join('kondisi_barang', 'jenis_barang.id_jenis_barang', '=', 'kondisi_barang.id_jenis_barang')->get();

        //return collection of posts as a resource
        return view('admin.jenis_barang.jenis_barang', ['data' => $jenis_barang]);
    }

    public function tambah()
    {
        return view('admin.jenis_barang.tambah_jenis_barang');
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'jenis_barang'  => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create Jenis_Barang
        $id = IdGenerator::generate(['table' => 'jenis_barang', 'field'=>'id_jenis_barang', 'length' => 6, 'prefix' => 'JB-']);
        $barang = Jenis_Barang::create([
            'id_jenis_barang' => $id,
            'jenis_barang'    => $request->jenis_barang,
            'jumlah'          => 0,
        ]);

        Kondisi_Barang::create([
            'id_jenis_barang'   => $barang->id_jenis_barang,
            'baik'              => 0,
            'rusak'             => 0,
            'diperbaiki'        => 0,
        ]);

        //return response
        return redirect('/admin/jenis-barang');
    }

    public function show(Jenis_Barang $jenis_barang)
    {
        //return single post as a resource
        return response()->json([
            'message' => 'Jenis barang berhasil ditemukan',
            'data'    => $jenis_barang,
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