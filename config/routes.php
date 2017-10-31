<?php

return [
    'modules' => [
        '/api/v1' => [
            'endpoints' => [
                '/users/{guid}' => [
                    'handlers' => [
                        'PUT' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\PutHandler::class,
                        'GET' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetHandler::class,
                    ],
                ],
                '/users/{guid}/jwt' => [
                    'handlers' => [
                        'GET' => \FreeElephants\RestAuth\Api\v1\Endpoints\Users\GetJwtHandler::class,
                    ],
                ],
            ],
        ],
    ],
];