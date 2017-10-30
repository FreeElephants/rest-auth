<?php

return [
    'modules' => [
        '/api/v1' => [
            'endpoints' => [
                '/users/{uid}' => [
                    'handlers' => [
                        'PUT' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\PutHandler::class,
                        'GET' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetHandler::class,
                    ],
                ],
                '/users/{uid}/jwt' => [
                    'handlers' => [
                        'GET' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetJwtHandler::class,
                    ],
                ],
            ],
        ],
    ],
];