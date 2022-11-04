<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            ->with('profile', 'skill', 'tags', 'characteristic')
            ->findOrFail($id);

//        $roles = User::query()
//            ->pluck('role')
//            ->unique();

        switch ($user->role){
            case 'IS_CLIENT':
                $path = 'clients';
                break;
            case 'IS_TRAINER':
                $path = 'trainers';
                break;
            case 'IS_GYM':
                $path = 'gyms';
                break;
            case 'IS_ADMIN':
                return view('admin.index', ['user' => $user]);
        }

        return view('account.'.$path.'.index', ['user' => $user]);
    }
}
