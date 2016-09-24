<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'home',
        '/home/action/postprivacychange',
        '/home/action/postdelete',
        '/home/action/poststatus',
        '/home/action/comment/create',
        '/home/action/comment/delete',
        '/home/action/comment/like',
        '/home/action/comment/unlike',
        '/home/action/status/like'
    ];
}
