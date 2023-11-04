<?php

namespace app;

class Kernel
{
    protected $routeMiddleware = [
        // ...
        'auth.check' => \App\Http\Middleware\CheckAuth::class,
    ];
}
