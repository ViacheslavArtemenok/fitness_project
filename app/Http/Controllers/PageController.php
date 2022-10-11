<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('trainers.index');
    }

    public function show(int $id)
    {
        return view('trainers.show');
    }
}
