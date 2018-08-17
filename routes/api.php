<?php

use App\Controllers\PodcastsController;

$app->get('/podcasts', PodcastsController::class . ':index');
$app->get('/podcasts/{id}', PodcastsController::class . ':show');