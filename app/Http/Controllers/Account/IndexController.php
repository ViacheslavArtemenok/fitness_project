<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Queries\TrainerQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __construct()
    {
        $this->trainerBuilder = new TrainerQueryBuilder;
    }
    public function __invoke(Request $request): View
    {
        $id = Auth::user()->id;
        if (Auth::user()->role === 'IS_TRAINER') {
            $user = User::query()
                ->with('profile', 'skill', 'tags', 'clients')
                ->findOrFail($id);
            return view('account.indexTrainer', [
                'user' => $user,
                'trainerBuilder' => $this->trainerBuilder
            ]);
        }
        if (Auth::user()->role === 'IS_CLIENT') {
            $user = User::query()
                ->with('profile', 'characteristic', 'trainers')
                ->findOrFail($id);
            return view('account.indexClient', [
                'user' => $user,
                'trainerBuilder' => $this->trainerBuilder
            ]);
        }
        return abort(404);
    }
}
