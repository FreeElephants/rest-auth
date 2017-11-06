<?php

namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;

use FreeElephants\RestAuth\Domain\User\UserRepository;
use FreeElephants\RestDaemon\Endpoint\Handler\AbstractEndpointMethodHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Teapot\StatusCode\Http;

class GetHandler extends AbstractEndpointMethodHandler
{

    /**
     * @var \FreeElephants\RestAuth\Domain\User\UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        $guid = $request->getAttribute('guid');
        if ($user = $this->userRepository->find($guid)) {
            $response->getBody()->write(json_encode(['login' => $user->getLogin()]));
        } else {
            $response = $response->withStatus(Http::NOT_FOUND);
        }

        return $next($request, $response);
    }
}