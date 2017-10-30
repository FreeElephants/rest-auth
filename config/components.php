<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$paths = [__DIR__ . '/../src/FreeElephants/RestAuth/Entity/'];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver' => 'pdo_sqlite',
    'url' => 'sqlite:////srv/rest-auth/somedb.sqlite'
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);

return [
    'instances' => [
        \Doctrine\ORM\EntityManagerInterface::class => $entityManager,
        \FreeElephants\RestAuth\Entity\UserRepository::class => $entityManager->getRepository(\FreeElephants\RestAuth\Entity\User::class),
    ]
];