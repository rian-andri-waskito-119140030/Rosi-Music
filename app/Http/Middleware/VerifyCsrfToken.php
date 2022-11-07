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
        'http://rosi2.test/',
        'http://rosi2.test/jenis_barang/',
        'http://rosi2.test/admin/barang/',
        'http://rosi2.test/admin/paket/',
        'http://rosi2.test/admin/jenis/',
    ];
}