<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function __invoke(Request $request): View
    {
        $id = Auth::user()->id;
        $user = User::query()
            ->with('profile', 'skill', 'tags')
            ->findOrFail($id);
        return view('account.index', ['user' => $user]);
    }
}
