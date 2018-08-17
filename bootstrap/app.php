<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = (new \Dotenv\Dotenv(__DIR__ . '/../'))->load();

require_once __DIR__ . '/database.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

require_once __DIR__ . '/../routes/api.php';