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
    public function index()
    {
        return view('trainers.index', [
            'trainersList' => $this->trainerBuilder->getAllPaginate(),
            'trainerBuilder' => $this->trainerBuilder
        ]);
    }

    public function show(int $id)
    {
        $trainer = $this->trainerBuilder->getById($id);
        return view('trainers.show', [
            'trainer' => $this->trainerBuilder->getById($id),
            'trainerBuilder' => $this->trainerBuilder
        ]);
    }
}
