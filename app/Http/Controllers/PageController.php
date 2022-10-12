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
            'trainersList' => $this->trainerBuilder->getAllPaginate()
        ]);
    }

    public function show(int $id)
    {
        return view('trainers.show', [
            'trainer' => $this->trainerBuilder->getById($id)
        ]);
    }
}
