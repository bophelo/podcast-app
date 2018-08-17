<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = (new \Dotenv\Dotenv(__DIR__ . '/../'))->load();

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/pagination.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$app->add(new \App\Middleware\Cors());

//container stuff/attaching fractal to the it
$container = $app->getContainer();
$container['fractal'] = function () {
    return new \League\Fractal\Manager();
};

require_once __DIR__ . '/../routes/api.php';