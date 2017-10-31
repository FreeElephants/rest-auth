<?php


namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;

use FreeElephants\RestDaemon\Endpoint\Handler\AbstractEndpointMethodHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetJwtHandler extends AbstractEndpointMethodHandler
{

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        // TODO: Implement __invoke() method.
    }
}