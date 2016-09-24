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
        
        /*Status*/
        '/home/action/status/like',
        '/home/action/status/create',
        '/home/action/status/privacy',
        '/home/action/status/delete',

        /*Comment*/
        '/home/action/comment/create',
        '/home/action/comment/delete',
        '/home/action/comment/like',
        '/home/action/comment/unlike'
    ];
}
