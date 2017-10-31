<?php

use FreeElephants\DI\InjectorBuilder;
use FreeElephants\RestDaemon\Endpoint\Handler\InjectionHandlerFactory;
use FreeElephants\RestDaemon\RestServer;
use FreeElephants\RestDaemon\RestServerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$httpHost = '127.0.0.1';
$port = 8080;
$address = '0.0.0.0';
$origin = ['*'];
$server = new RestServer($httpHost, $port, $address, $origin, RestServer::RATCHET_HTTP_DRIVER);
$components = require_once __DIR__ . '/../config/components.php';
$di = (new InjectorBuilder())->buildFromArray($components);
$di->allowInstantiateNotRegisteredTypes(true);
$builder = new RestServerBuilder($di);
$builder->setServer($server);
$builder->setHandlerFactory(new InjectionHandlerFactory($di));
$routes = require_once __DIR__ . '/../config/routes.php';
$server = $builder->buildServer($routes);

$server->run();
