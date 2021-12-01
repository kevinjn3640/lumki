<?php
// config for Lumki/Lumki
return [
    'prefix' => 'lumki',
    'middleware' => ['web', 'auth:sanctum', \Laravel\Jetstream\Http\Middleware\ShareInertiaData::class]
];
