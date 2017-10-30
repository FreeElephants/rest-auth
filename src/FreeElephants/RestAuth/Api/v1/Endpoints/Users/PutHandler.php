<?php


namespace FreeElephants\RestAuth\Api\v1\Endpoints\Users;


use Doctrine\ORM\Repository\RepositoryFactory;
use FreeElephants\RestDaemon\Endpoint\AbstractEndpointMethodHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PutHandler extends AbstractEndpointMethodHandler
{

    /**
     * @var RepositoryFactory
     */
    private $repositoryFactory;

    public function __construct(RepositoryFactory $repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface {
        $response = $response->withStatus(201);
        $response->getBody()->write('{}');
        return $next($request, $response);
    }
}