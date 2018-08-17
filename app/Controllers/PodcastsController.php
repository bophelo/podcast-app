<?php

namespace App\Controllers;
use App\Models\Podcast;
use App\Transformers\PodcastTransformer;
use League\Fractal\{
    Resource\Item,
    Resource\Collection,
    Pagination\IlluminatePaginatorAdapter
};

class PodcastsController extends BaseController
{
    public function index($request, $response)
    {
        $podcasts = Podcast::latest()->paginate(2);
        $transformer = (new Collection($podcasts->getCollection(), new PodcastTransformer))->setPaginator(new IlluminatePaginatorAdapter($podcasts));
        return $response->withJson($this->container->fractal->createData($transformer)->toArray());
    }

    public function show($request, $response, $args)
    {
        //die($this->container->test);
        $podcast = Podcast::find($args['id']);
        if($podcast === null)
        {
            return $response->withStatus(404);
        }
        $transformer = new Item($podcast, new PodcastTransformer);
        return $response->withJson($this->container->fractal->createData($transformer)->toArray());
    }
}