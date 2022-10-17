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
    public function index(int $tag_id)
    {
        if ($tag_id === 0) {
            return view('trainers.index', [
                'trainersList' => $this->trainerBuilder->getAllPaginate(),
                'trainerBuilder' => $this->trainerBuilder,
                'tags' => $this->trainerBuilder->getAllTags()
            ]);
        } else {
            return view('trainers.index', [
                'trainersList' => $this->trainerBuilder->getAllByTagPaginate($tag_id),
                'trainerBuilder' => $this->trainerBuilder,
                'tags' => $this->trainerBuilder->getAllTags()
            ]);
        }
    }

    public function show(int $id)
    {
        $trainer = $this->trainerBuilder->getById($id);
        if ($trainer->role === 'IS_TRAINER') {
            return view('trainers.show', [
                'trainer' => $trainer,
                'trainerBuilder' => $this->trainerBuilder
            ]);
        } else {
            return view('trainers.show', [
                'trainer' => null
            ]);
        }
    }
}
