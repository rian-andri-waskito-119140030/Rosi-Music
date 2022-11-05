<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'http://rosi-music.test/',
        'http://rosi-music.test/jenis_barang/',
        'http://rosi-music.test/admin/barang/',
        'http://rosi-music.test/admin/paket/',
        'http://rosi-music.test/admin/jenis/',
    ];
}