<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\BuktiPembayaran;
use App\Models\CatatanPenolakan;
use App\Models\Hutang;
use App\Models\Pesanan;
use App\Models\PesananSistem;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }
        // find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user, $provider);

        // dd($authUser);
        // login user
        Auth()->guard('pelanggan')->login($authUser, true);

        // setelah login redirect ke dashboard
        return redirect()->route('dashboard');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        // Get Social Account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

            // dd($socialAccount);

        // Jika sudah ada
        if ($socialAccount) {
            // return user
            return $socialAccount->user;

            // Jika belum ada
        } else {

            // User berdasarkan email 
            $user = User::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (!$user) {
                // Create user baru
                $user = User::create([
                    'nama'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'avatar'=> $socialUser->getAvatar(),
                ]);
            }

            // Buat Social Account baru
            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => $provider
            ]);

            // return user
            return $user;
        }
    }

    public function profil()
    {
        $pesanan=Pesanan::with('paket')->join('pesanan_sistem', 'pesanan.id_pesanan', '=', 'pesanan_sistem.id_pesanan')->where('id_pelanggan', Auth::guard('pelanggan')->user()->id)->latest('pesanan.created_at')->first();
        $data=array(
            'pesanan' => $pesanan,
            'ditolak' => null,
            'bukti'   => null,
            'hutang'  => null,
        );
        // dd($data);
        if(!is_null($pesanan)) {
            $ditolak=CatatanPenolakan::class::where('id_pesanan', $pesanan->id_pesanan)->first();
            $data['ditolak'] = $ditolak;
            $transaksi=Transaksi::where('id_pesanan', $pesanan->id_pesanan)->first();
            if(!is_null($transaksi)) {
                $bukti=BuktiPembayaran::where('id_transaksi', $transaksi->id_transaksi)->get();
                $hutang=Hutang::where('id_transaksi', $transaksi->id_transaksi)->first();
                $data['bukti']=$bukti;
                $data['hutang']=$hutang;
            }
        }
        return $data;
    }
}