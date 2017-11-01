<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use FreeElephants\RestAuth\Entity\User;
use FreeElephants\RestAuth\Entity\UserRepository;

$paths = [__DIR__ . '/../src/FreeElephants/RestAuth/Entity/'];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver' => 'pdo_sqlite',
    'url' => 'sqlite:////srv/rest-auth/db.sqlite'
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);

return [
    'instances' => [
        EntityManagerInterface::class => $entityManager,
        UserRepository::class => $entityManager->getRepository(User::class),
    ]
];