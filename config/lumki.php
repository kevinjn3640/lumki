<?php
// config for Lumki/Lumki
return [
    'prefix' => 'lumki',
    'middleware' => [\Laravel\Jetstream\Http\Middleware\ShareInertiaData::class, 'web', 'auth:sanctum']
];
