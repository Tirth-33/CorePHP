<?php

return [
    'name' => 'StudentGradesAPI',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost:8000',
    'key' => 'base64:your-app-key-here',
    'providers' => [
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Laravel\Sanctum\SanctumServiceProvider::class,
        App\Providers\AppServiceProvider::class,
    ],
];