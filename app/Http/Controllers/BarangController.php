<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Barang;
use App\Models\Kondisi_Barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BarangController extends Controller
{
    public function index()
    {
        //get posts
        $barang = Barang::get();

        //return collection of posts as a resource
        return response()->json([
            'message' => 'List daftar barang',
            'data'    => $barang,
        ]);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'nama_barang'    => 'required',
            'id_jenis'       => 'required',
            'kondisi'        => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

         // dd($request->all());
         $gambar = $request->file('gambar');
         $gambar->storeAs('public/barang', $gambar->getClientOriginalName());

        //create Meja
        $id = IdGenerator::generate(['table' => 'barang', 'field'=>'id_barang', 'length' => 6, 'prefix' => 'BR-']);
        $barang = Barang::create([
            'id_barang'      => $id,
            'gambar'         => $gambar->getClientOriginalName(),
            'nama_barang'    => $request->nama_barang,
            'id_jenis'       => $request->id_jenis,
            'kondisi'        => $request->kondisi,
        ]);

        $baik=count(Barang::where('kondisi', 'Baik')->get());
        $rusak=count(Barang::where('kondisi', 'Rusak')->get());
        $diperbaiki=count(Barang::where('kondisi', 'Diperbaiki')->get());

        $kondisi=Kondisi_Barang::where('id_jenis', $barang->id_jenis)
                ->update([
                'baik'          => $baik,
                'rusak'         => $rusak,
                'diperbaiki'    => $diperbaiki,
            ]);

        //return response
        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data'    => $barang,
        ]);
    }

    public function show(Barang $barang)
    {
        //return single post as a resource
        return response()->json([
            'message' => 'Barang berhasil ditemukan',
            'data'    => $barang,
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'    => 'required',
            'id_jenis'       => 'required',
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
                'id_jenis'       => $request->id_jenis,
                'kondisi'        => $request->kondisi,
            ]);

        } else {

            //update post without image
            $barang->update([
                'nama_barang'    => $request->nama_barang,
                'id_jenis'       => $request->jenis_barang,
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