<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Barang;
use App\Models\Kondisi_Barang;
use App\Http\Controllers\Controller;
use App\Models\Jenis_Barang;
use App\Models\Jenis_Paket;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BarangController extends Controller
{
    public function index()
    {
        //get posts
        $barang = Barang::get();

        //return collection of posts as a resource
        return view('admin.barang.barang', ['data' => $barang]);
    }

    public function tambah()
    {
        $jenis_barang= Jenis_Barang::get();
        //return collection of posts as a resource
        return view('admin.barang.tambah_barang', ['data' => $jenis_barang]);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'nama_barang'    => 'required',
            'id_jenis_barang'=> 'required',
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
            'id_jenis_barang'=> $request->id_jenis_barang,
            'kondisi'        => $request->kondisi,
        ]);

        $baik=count(Barang::where('id_jenis_barang', $barang->id_jenis_barang)->where('kondisi', 'Baik')->get());
        $rusak=count(Barang::where('id_jenis_barang', $barang->id_jenis_barang)->where('kondisi', 'Rusak')->get());
        $diperbaiki=count(Barang::where('id_jenis_barang', $barang->id_jenis_barang)->where('kondisi', 'Diperbaiki')->get());

        Jenis_Barang::where('id_jenis_barang', $barang->id_jenis_barang)
                ->update([
                'jumlah' => $baik+$rusak+$diperbaiki
            ]);

        Kondisi_Barang::where('id_jenis_barang', $barang->id_jenis_barang)
                ->update([
                'baik'          => $baik,
                'rusak'         => $rusak,
                'diperbaiki'    => $diperbaiki,
            ]);

        //return response
        return redirect('/admin/barang');
    }

    public function edit($id_barang)
    {
        $barang=Barang::where('id_barang', $id_barang)->get();
        $jenis_barang=Jenis_Barang::get();
        // dd($barang[0]);
        //return single post as a resource
        return view('admin.barang.edit_barang', [
            'barang'      => $barang[0],
            'jenis_barang' => $jenis_barang,
        ]);
    }

    public function update($id_barang, Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'    => 'required',
            'id_jenis_barang'=> 'required',
            'kondisi'        => 'required',
        ]);

        $barang=Barang::where('id_barang', $id_barang);

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
                'id_jenis_barang'=> $request->id_jenis_barang,
                'kondisi'        => $request->kondisi,
            ]);

        } else {

            //update post without image
            $barang->update([
                'nama_barang'    => $request->nama_barang,
                'id_jenis_barang'=> $request->id_jenis_barang,
                'kondisi'        => $request->kondisi,
            ]);
        }

        //return response
        return redirect('/admin/barang');
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