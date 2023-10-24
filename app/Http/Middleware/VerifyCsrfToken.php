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
        "/api/books/*",
        "/api/books",
        "/api/copies",
        "/api/copies/*",
        "/api/users",
        "/api/users/*/*/*",
        "/api/password_modify/*",
        "/api/userLendings"
    ];
}
