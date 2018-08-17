<?php

use App\Models\Podcast;

$app->get('/podcasts', function ($request, $response) {
    $podcasts = Podcast::get();
    return $response->withJson($podcasts);
});