<?php

namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;

use FreeElephants\RestAuth\Domain\User\Exception\UserDataValidationError;
use FreeElephants\RestAuth\Domain\User\RegistrationService;
use FreeElephants\RestAuth\Domain\User\UserRegistrationDto;
use FreeElephants\RestDaemon\Endpoint\Handler\AbstractEndpointMethodHandler;
use FreeElephants\RestDaemon\Util\ParamsContainer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Teapot\StatusCode\Http;

class PostHandler extends AbstractEndpointMethodHandler
{

    private $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        $guid = $request->getAttribute('guid');
        /**@var ParamsContainer $requestParams */
        $requestParams = $request->getParsedBody();
        $userRegistrationDto = new UserRegistrationDto($guid, $requestParams->getArrayCopy());

        try {
            $user = $this->registrationService->registerUser($userRegistrationDto);
            $response = $response->withStatus(Http::CREATED);
            $response->getBody()->write(json_encode([
                'login' => $user->getLogin()
            ]));
        } catch (UserDataValidationError $e) {
            $response = $response->withStatus(Http::BAD_REQUEST);
            $response->getBody()->write(json_encode(['error' => ['message' => $e->getMessage()]]));
        } catch (\Throwable $e) {
            $response = $response->withStatus(Http::INTERNAL_SERVER_ERROR);
            $response->getBody()->write(json_encode(['error' => ['message' => $e->getMessage()]]));
        }

        return $next($request, $response);
    }
}