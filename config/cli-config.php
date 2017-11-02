<?php
/**
 * Doctrine cli entry.
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$components = require_once __DIR__ . '/components.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $components['instances'][EntityManagerInterface::class];

//ConsoleRunner::addCommands()
return ConsoleRunner::createHelperSet($entityManager);