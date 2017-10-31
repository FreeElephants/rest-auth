<?php


namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;

use FreeElephants\RestAuth\Entity\UserRepository;
use FreeElephants\RestDaemon\Endpoint\Handler\AbstractEndpointMethodHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetHandler extends AbstractEndpointMethodHandler
{

    /**
     * @var UserRepository
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
            $response = $response->withStatus(404);
        }

        return $next($request, $response);
    }
}