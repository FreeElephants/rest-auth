<?php

return [
    'modules' => [
        '/api/v1' => [
            'endpoints' => [
                '/auth/jwt' => [
                    'handlers' => [
                        'GET' => \FreeElephants\RestAuth\Api\v1\Endpoints\Auth\GetJwtHandler::class,
                    ],
                ],
                '/users/{guid}' => [
                    'handlers' => [
                        'POST' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\PostHandler::class,
                        'GET' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetHandler::class,
                    ],
                ],
            ],
        ],
    ],
];