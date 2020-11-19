<?php

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . '/../../../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/../../components/container/index.php');

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Create App instance
$app = $container->get(App::class);

// Register routes
(require __DIR__ . '/../../components/router/index.php')($app);

// Register middleware
(require __DIR__ . '/../../components/middleware/index.php')($app);

return $app;
