<?php

namespace App\Http\Controllers;

use App\Queries\TrainerQueryBuilder;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->trainerBuilder = new TrainerQueryBuilder;
    }
    public function index(int $tag_id, int $city_id)
    {
        return view('trainers.index', [
            'trainersList' => $this->trainerBuilder->getWithParamsPaginate(request()->firstName, request()->lastName, $city_id, $tag_id),
            'trainerBuilder' => $this->trainerBuilder,
            'tags' => $this->trainerBuilder->getAllTags(),
            'city_id' => $city_id,
            'tag_id' => $tag_id,
        ]);
    }

    public function show(int $id, int $city_id)
    {
        $trainer = $this->trainerBuilder->getById($id);
        return view('trainers.show', [
            'trainer' => $trainer,
            'trainerBuilder' => $this->trainerBuilder,
            'city_id' => $city_id,
        ]);
    }
}
