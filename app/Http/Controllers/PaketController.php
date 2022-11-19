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
    private function hapus_string($string) { 
        // ----- remove HTML TAGs ----- 
        $string = strip_tags($string, ['li']); 
        // ----- remove control characters ----- 
        $string = str_replace("\r", '', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        // ----- remove multiple spaces ----- 
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        
        return $string;
    }

    public function index($id_jenis_paket)
    {
        //get posts
        $paket=Jenis_Paket::with('paket')->where('id_jenis_paket', $id_jenis_paket)->get();

        //return collection of posts as a resource
        return view('pelanggan.daftar-paket', ['data' => $paket]);
    }

    public function tambah()
    {
        $jenis_paket=Jenis_Paket::get();
        return view('admin.paket.tambah_paket', ['data' => $jenis_paket]);
    }

    public function store(Request $request)
    {
        // dd($this->hapus_string($request->deskripsi_panjang));
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
            'deskripsi_panjang' => $this->hapus_string($request->deskripsi_panjang),
        ]);

        //return response
        return redirect('/admin/paket');
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

    public function edit($id_paket)
    {
        $jenis_paket=Jenis_Paket::get();

        $paket=Paket::join('jenis_paket', 'paket.id_jenis_paket', '=', 'jenis_paket.id_jenis_paket')->where('id_paket', $id_paket)->get();
        //return single post as a resource
        
        return view('admin.paket.edit_paket', [
            'paket' => $paket[0],
            'jenis_paket'=> $jenis_paket,
        ]);
    }

    public function update($id_paket, Request $request)
    {

        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_jenis_paket'     => 'required',
            'nama_paket'         => 'required',
            'gambar'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'harga_sewa'         => 'required',
            'deskripsi_singkat'  => 'required',
            'deskripsi_panjang'  => 'required',
        ]);

        $paket=Paket::where('id_paket', $id_paket);
        // dd($paket);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('gambar')) {

            //upload image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/paket', $gambar->getClientOriginalName());

            //delete old image
            Storage::delete('public/paket/'.$paket->gambar);

            //update post with new image
            $paket->update([
                'id_jenis_paket'    => $request->id_jenis_paket,
                'nama_paket'        => $request->nama_paket,
                'gambar'            => $gambar->getClientOriginalName(),
                'harga_sewa'        => $request->harga_sewa,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi_panjang' => $this->hapus_string($request->deskripsi_panjang),
            ]);

        } else {

            //update post without image
            $paket->update([
                'id_jenis_paket'    => $request->id_jenis_paket,
                'nama_paket'        => $request->nama_paket,
                'harga_sewa'        => $request->harga_sewa,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi_panjang' => $this->hapus_string($request->deskripsi_panjang),
            ]);
        }

        //return response
        return redirect('/admin/paket');
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Paket $paket)
    {
        //delete image
        Storage::delete('public/paket/'.$paket->gambar);

        //delete post
        $paket->delete();

        //return response
        return response()->json([
            'message' => 'Paket berhasil dihapus',
        ]);
    }

    public function paket()
    {
        //get posts
        $paket=Jenis_Paket::join('paket', 'jenis_paket.id_jenis_paket', '=', 'paket.id_jenis_paket')->get();

        //return collection of posts as a resource
        return view('admin.paket.paket', ['data' => $paket]);
    }
}