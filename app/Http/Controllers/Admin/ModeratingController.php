<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moderating;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModeratingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $statuses = [
            Moderating::IS_PENDING,
            Moderating::IS_REJECTED,
            Moderating::IS_APPROVED
        ];

        $roles = Role::All('role')->toArray();

//        $moderatings = User::query()
//            ->where('role_id', 2)
//            ->with('profile')
//            ->with('moderating', function($query) {
//                $query->where('status', 'IS_PENDING');
//            })
//            ->paginate(config('pagination.admin.moderatings'));

//        $moderatings = Moderating::query()
//            ->with('user', function($query) {
//                $query->where('role_id', 2);
//            })
//            ->with('profile')
//            ->where('status', Moderating::IS_PENDING)
//            ->paginate(config('pagination.admin.moderatings'));


        $moderatings = Moderating::query()
            ->with('user')
            ->with('profile')
            ->paginate(config('pagination.admin.moderatings'));

        return view('admin.moderatings.index', [
            'moderatings' => $moderatings,
            'roles' => $roles,
            'statuses' => $statuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Moderating $moderating
     * @return View
     */
    public function edit(Moderating $moderating): View
    {
        $moderatingList = '';

        $reasons = [
            Moderating::REASON00,
            Moderating::REASON01,
            Moderating::REASON02,
            Moderating::REASON03,
            Moderating::REASON04,
            Moderating::REASON05,
        ];

        //dd($moderating->user_id);

        //$role_id = User::whereId($moderating->user_id)->get('role_id')->toArray()[0]['role_id'];

        $role_id = User::whereId($moderating->user_id)->get('role_id')[0]->role_id;
        //dd($role_id);

        $roles = Role::all('role')->toArray();

        //dd($roles[$role_id - 1]['role']);
        //dd($role_id);

        if ($roles[$role_id - 1]['role'] === 'IS_TRAINER') {
            //тренера(users,profiles,skills,tags),
            $moderatingList = User::query()
                ->where('id', $moderating->user_id)
                ->with('profile')
                ->with('skill')
                ->with('tags')
                ->get();
        }

        if ($roles[$role_id - 1]['role'] === 'IS_CLIENT') {
            //клиента(users,profiles,characteristics)
            $moderatingList = User::query()
                ->where('id', $moderating->user_id)
                ->with('profile')
                ->with('characteristic')
                ->get();
        }

        //dd($moderatingList);

        return view('admin.moderatings.edit', [
            'moderatingList' => $moderatingList,
            'reasons' => $reasons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Moderating $moderating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moderating $moderating)
    {
        $message = '';

        $reasons = [
            Moderating::REASON00,
            Moderating::REASON01,
            Moderating::REASON02,
            Moderating::REASON03,
            Moderating::REASON04,
            Moderating::REASON05,
        ];

        //dd($moderating);

        switch($request['submit_key']) {
            case 'IS_APPROVED': // нажата кнопка APPROVED
                Moderating::where('user_id', $moderating->id)
                    ->update([
                        'reason' => Moderating::REASON00,
                        'status' => Moderating::IS_APPROVED
                    ]);
                User::whereId($moderating->id)
                    ->update([
                        'status' => User::ACTIVE
                    ]);
                $message = __('messages.admin.moderatings.change.success');
                break;
            case 'IS_REJECTED': // нажата кнопка REJECTED
                Moderating::where('user_id', '=', $moderating->id)
                    ->update([
                        'reason' => $reasons[$request['reason']],
                        'status' => Moderating::IS_REJECTED
                    ]);
                User::whereId($moderating->id)
                    ->update([
                        'status' => User::BLOCKED
                    ]);
                $message = __('messages.admin.moderatings.change.fail');
                break;
        }

        return back()->with("success", $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
