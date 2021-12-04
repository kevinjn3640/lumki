<?php
// config for Lumki/Lumki
return [
    'prefix' => 'lumki',
    'middleware' => ['web', 'auth:sanctum', 'role:Superadmin|Admin', \Laravel\Jetstream\Http\Middleware\ShareInertiaData::class]
];
