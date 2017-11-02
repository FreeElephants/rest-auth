<?php
/**
 * DI-components registration and services initialization.
 */
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/const.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use FreeElephants\RestAuth\Domain\User\User;
use FreeElephants\RestAuth\Domain\User\UserRepository;

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../src/FreeElephants/RestAuth/Domain/'],
    REST_AUTH_DEV_MODE, null, null, false);
$entityManager = EntityManager::create([
    'url' => REST_AUTH_DB_CONNECTION_URL
], $config);

return [
    'instances' => [
        EntityManagerInterface::class => $entityManager,
        UserRepository::class => $entityManager->getRepository(User::class),
    ]
];