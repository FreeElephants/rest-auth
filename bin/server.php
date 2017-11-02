<?php
/**
 * Main entry script
 */
require_once __DIR__ . '/../vendor/autoload.php';

use FreeElephants\DI\InjectorBuilder;
use FreeElephants\RestDaemon\Endpoint\Handler\InjectionHandlerFactory;
use FreeElephants\RestDaemon\RestServer;
use FreeElephants\RestDaemon\RestServerBuilder;

$components = require_once __DIR__ . '/../config/components.php';
$di = (new InjectorBuilder())->buildFromArray($components);
$di->allowInstantiateNotRegisteredTypes(true);

$builder = new RestServerBuilder($di);
$builder->setHandlerFactory(new InjectionHandlerFactory($di));
$server = new RestServer(REST_AUTH_HTTP_HOST, REST_AUTH_PORT, REST_AUTH_ADDRESS, REST_AUTH_ORIGIN,
    RestServer::RATCHET_HTTP_DRIVER);
$builder->setServer($server);

$routes = require_once __DIR__ . '/../config/routes.php';
$server = $builder->buildServer($routes);

$server->run();
