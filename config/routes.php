<?php

return [
    '/api/v1' => [
        'endpoints' => [
            '/users/{uid}' => [
                'handlers' => [
                    'POST' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\PostHandler::class,
                    'GET' =>  \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetHandler::class,
                ],
            ],
            '/users/{uid}/jwt' => [
                'handlers' => [
                    'GET' =>  \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetJwtHandler::class,
                ],
            ],
        ],
    ],
];