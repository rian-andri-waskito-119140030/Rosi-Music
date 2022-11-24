<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Paket;
use App\Models\PesananSistem;
use App\Models\Barang;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $errors = new MessageBag;
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        $errors = new MessageBag(['password' => ['username atau password salah.']]);
        return back()->withErrors($errors)->withSuccess('Login details are not valid');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function register()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|max:255',
            'username'  => ['required', 'min:3', 'max:255', 'unique:admin'],
            'password'  => 'required|min:5|max:255',
        ]);

        //create Meja
        Admin::create([
            'nama'      => $request->name,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'avatar'    => 'default.png',
        ]);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/admin/login')->with('success', 'Registration successfull! Please login');
    }

    public function dashboard()
    {
        $jumlah_paket=count(Paket::get());
        $jumlah_pesanan=count(PesananSistem::where('status', 'Menunggu Validasi')->get());
        $jumlah_barang=count(Barang::get());
        $saldo=Keuangan::sum('debit') - Keuangan::sum('kredit');

        // dd('Jumlah barang => '.$jumlah_barang . 'Jumlah paket =>' . $jumlah_paket. 'Jumlah pesanan =>' .$jumlah_pesanan);
        return view('admin.dashboard', [
            'paket'             => $jumlah_paket,
            'pesanan_sistem'    => $jumlah_pesanan,
            'barang'            => $jumlah_barang,
            'saldo'             => $saldo,
        ]);
    }
}