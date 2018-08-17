<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = (new \Dotenv\Dotenv(__DIR__ . '/../'))->load();

require_once __DIR__ . '/database.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

//container stuff/attaching fractal to the it
$container = $app->getContainer();
$container['fractal'] = function () {
    return new \League\Fractal\Manager();
};

require_once __DIR__ . '/../routes/api.php';