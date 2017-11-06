<?php

namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;

use FreeElephants\Jwt\EncoderInterface;
use FreeElephants\RestAuth\Domain\User\PasswordService;
use FreeElephants\RestAuth\Domain\User\UserRepository;
use FreeElephants\RestDaemon\Endpoint\Handler\AbstractEndpointMethodHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Teapot\StatusCode\Http;

class GetJwtHandler extends AbstractEndpointMethodHandler
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var PasswordService
     */
    private $passwordService;
    /**
     * @var EncoderInterface
     */
    private $encoder;

    public function __construct(
        UserRepository $userRepository,
        PasswordService $passwordService,
        EncoderInterface $encoder
    ) {
        $this->userRepository = $userRepository;
        $this->passwordService = $passwordService;
        $this->encoder = $encoder;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        $guid = $request->getAttribute('guid');
        if ($user = $this->userRepository->find($guid)) {
            if ($authorizationHeader = array_pop($request->getHeader('Authorization'))) {
                $authorizationData = explode(':', $authorizationHeader, 2);
                if (count($authorizationData) === 2) {
                    list($login, $password) = $authorizationData;
                    $authorizedUser = $this->userRepository->findOneBy([
                        'login' => $login,
                    ]);
                    $isPasswordVerified = $this->passwordService->verify($password,
                        $authorizedUser->getPasswordHash());
                    if ($authorizedUser && $isPasswordVerified) {
                        if ($authorizedUser === $user) {
                            $response = $response->withStatus(200);
                            $tokenData = [
                                'guid' => '2c044f97-c0a5-4267-833a-b6fedba93ffa',
                                'login' => 'test',
                                'email' => 'test@mail.com',
                                'roles' => ['user']
                            ];
                            $jwt = $this->encoder->encode($tokenData, 'HS256');
                            $response->getBody()->write(json_encode([
                                'jwt' => $jwt
                            ]));
                        } else {
                            $response = $response->withStatus(403);
                        }
                    } else {
                        $response = $response->withStatus(401);
                    }
                } else {
                    $response = $response->withStatus(Http::BAD_REQUEST);
                }
            } else {
                $response = $response->withStatus(Http::UNAUTHORIZED);
            }
        } else {
            $response = $response->withStatus(Http::NOT_FOUND);
        }
        return $next($request, $response);
    }
}