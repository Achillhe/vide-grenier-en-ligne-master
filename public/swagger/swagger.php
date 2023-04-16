<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use OpenApi\Generator;
use OpenApi\Annotations as OA;

$openapi = Generator::scan([
    __DIR__ . '/../../../App/Controllers',
    __DIR__ . '/../../../App/Models'
]);

// On définit le titre et la description de l'API
$openapi->info = new OA\Info([
    'title' => 'Mon API',
    'description' => 'Cette API permet de récupérer des données à propos de...',
]);

// Ajout de la définition du modèle User
$user = new OA\Schema([
    'type' => 'object',
    'properties' => [
        'id' => [
            'type' => 'integer',
            'format' => 'int64',
        ],
        'username' => [
            'type' => 'string',
        ],
        'email' => [
            'type' => 'string',
        ],
        'password' => [
            'type' => 'string',
        ],
        'salt' => [
            'type' => 'string',
        ],
    ],
]);

$openapi->components = new OA\Components([
    'schemas' => [
        'User' => $user,
    ],
]);

header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
