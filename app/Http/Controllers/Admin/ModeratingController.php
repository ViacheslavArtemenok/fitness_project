<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moderating;
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
//        $moderatings = Moderating::query()
//            ->with('profile')
//            ->with('user')
//            ->where('status', Moderating::IS_PENDING)
//            //->where('role_id', 2)
//            ->paginate(config('pagination.admin.moderatings'));

        $moderatings = Moderating::query()
            ->with('user', function($query) {
                $query->where('role_id', 2);
            })
            ->with('profile')
            ->where('status', Moderating::IS_PENDING)
            ->paginate(config('pagination.admin.moderatings'));


        //dd($moderatings);

        return view('admin.moderatings.index', [
            'moderatings' => $moderatings
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
