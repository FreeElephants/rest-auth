<?php


namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Repository\RepositoryFactory;
use FreeElephants\RestAuth\Entity\User;
use FreeElephants\RestAuth\Entity\UserRepository;
use FreeElephants\RestDaemon\Endpoint\Handler\AbstractEndpointMethodHandler;
use FreeElephants\RestDaemon\Util\ParamsContainer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PutHandler extends AbstractEndpointMethodHandler
{

    /**
     * @var RepositoryFactory
     */
    private $userRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        $guid = $request->getAttribute('guid');
        $user = new User();
        /**@var ParamsContainer $requestParams */
        $requestParams = $request->getParsedBody();
        $user->setGuid($guid);
        $user->setEmail($requestParams->get('email'));
        $user->setLogin($requestParams->get('login'));
        $user->setPassword($requestParams->get('password'));
        try {
            $this->entityManager->persist($user);
            $response = $response->withStatus(201);
            $response->getBody()->write(json_encode([
                'login' => $user->getLogin()
            ]));
        } catch (\Throwable $e) {

        }

        return $next($request, $response);
    }
}