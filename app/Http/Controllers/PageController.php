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
        if ($tag_id === 0) {
            return view('trainers.index', [
                'trainersList' => $this->trainerBuilder->getAllPaginate($city_id),
                'trainerBuilder' => $this->trainerBuilder,
                'tags' => $this->trainerBuilder->getAllTags(),
                'city_id' => $city_id,
                'tag_id' => $tag_id,
            ]);
        } else {
            return view('trainers.index', [
                'trainersList' => $this->trainerBuilder->getAllByTagPaginate($tag_id, $city_id),
                'trainerBuilder' => $this->trainerBuilder,
                'tags' => $this->trainerBuilder->getAllTags(),
                'city_id' => $city_id,
                'tag_id' => $tag_id,
            ]);
        }
    }

    public function show(int $id, int $city_id)
    {
        $trainer = $this->trainerBuilder->getById($id);
        if ($trainer->role === 'IS_TRAINER') {
            return view('trainers.show', [
                'trainer' => $trainer,
                'trainerBuilder' => $this->trainerBuilder,
                'city_id' => $city_id,
            ]);
        } else {
            return view('trainers.show', [
                'trainer' => null,
                'city_id' => $city_id,
            ]);
        }
    }
}
