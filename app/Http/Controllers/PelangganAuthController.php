<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class PelangganAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProvideCallback(Request $request)
    {
        try {

            $pelanggan = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }
        // find or create user and send params user get from socialite and provider
        $authPelanggan = $this->findOrCreateUser($pelanggan);

        // login user
        Auth::guard('pelanggan')->login($authPelanggan, true);
        $tes=$request->session()->regenerate();
    //    dd( Auth::guard('pelanggan'));
        return redirect()->intended('/');

        
        // setelah login redirect ke dashboard
        // return redirect()->route('dashboard');
    }

    public function findOrCreateUser($socialUser)
    {
        #dd($socialUser->getAvatar());
        // Get Social Account
        $pelanggan = Pelanggan::where('id_pelanggan', $socialUser->getId())
            ->first();

        // Jika sudah ada
        if ($pelanggan) {
            // return user
            return $pelanggan;

            // Jika belum ada
        } else {

            // User berdasarkan email 
            $pelanggan = Pelanggan::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (!$pelanggan) {
                // Create user baru
                $pelanggan = Pelanggan::create([
                    'id_pelanggan'  => $socialUser->getId(),
                    'nama'          => $socialUser->getName(),
                    'email'         => $socialUser->getEmail(),
                    'avatar'        => $socialUser->getAvatar(),
                ]);
            }

            // return user
            return $pelanggan;
        }
    }
}