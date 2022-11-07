<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class PelangganAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProvideCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }
        // find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user);

        // dd($authUser);

        // login user
        Auth::guard('pelanggan')->login($authUser);

        // setelah login redirect ke dashboard
        return redirect()->route('dashboard');
    }

    public function findOrCreateUser($socialUser)
    {
        // Get Social Account
        $socialAccount = Pelanggan::where('email', $socialUser->getEmail())->first();

        // Jika sudah ada
        if ($socialAccount) {
            // return user
            return $socialAccount;

            // Jika belum ada
        } else {

            // User berdasarkan email 
            $user = Pelanggan::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (!$user) {
                // Create user baru
                $user = Pelanggan::create([
                    'id_pelanggan'  => $socialUser->getId(),
                    'nama'          => $socialUser->getName(),
                    'email'         => $socialUser->getEmail(),
                    'avatar'        => $socialUser->getAvatar(),
                ]);
            }

            // return user
            return $user;
        }
    }
    
    // public function redirectToProviders()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleProvideCallbacks()
    // {
    //     try {

    //         $pelanggan = Socialite::driver('google')->stateless()->user();
    //     } catch (Exception $e) {
    //         return redirect()->back();
    //     }
    //     // find or create user and send params user get from socialite and provider
    //     $authPelanggan = $this->findOrCreateUser($pelanggan);

    //     // login user
    //     Auth::guard('pelanggan')->login($authPelanggan, true);
    //     // $tes=$request->session()->regenerate();
    // //    dd( Auth::guard('pelanggan'));
    //     return redirect()->intended('dashboard');

        
    //     // setelah login redirect ke dashboard
    //     // return redirect()->route('dashboard');
    // }

    // public function findOrCreateUser($socialUser)
    // {
    //     #dd($socialUser->getAvatar());
    //     // Get Social Account
    //     $pelanggan = Pelanggan::where('id_pelanggan', $socialUser->getId())
    //         ->first();

    //     // Jika sudah ada
    //     if ($pelanggan) {
    //         // return user
    //         return $pelanggan;

    //         // Jika belum ada
    //     } else {

    //         // User berdasarkan email 
    //         $pelanggan = Pelanggan::where('email', $socialUser->getEmail())->first();

    //         // Jika Tidak ada user
    //         if (!$pelanggan) {
    //             // Create user baru
    //             $pelanggan = Pelanggan::create([
    //                 'id_pelanggan'  => $socialUser->getId(),
    //                 'nama'          => $socialUser->getName(),
    //                 'email'         => $socialUser->getEmail(),
    //                 'avatar'        => $socialUser->getAvatar(),
    //             ]);
    //         }

    //         // return user
    //         return $pelanggan;
    //     }
    // }
}