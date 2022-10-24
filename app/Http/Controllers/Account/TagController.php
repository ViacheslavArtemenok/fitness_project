<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateRequest;
use App\Models\Relation;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->get('user_id');
        $tags = Tag::all();
        return view('account.tags.create', ['user_id'=>$user_id, 'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, User $user)
    {
        $user_id = $request->get('id');
        $tag_id = $request->post('tags');
        $user->tags()->sync($tag_id, ['user_id' => $user_id]);
//        $trainer->tags()->sync($tag_id, ['user_id' => $trainer_id]);
        return redirect()->route('account', ['profile'=>$user_id])
            ->with('success', __('messages.account.profiles.update.success'));

//        dd(User::query()
//            ->with('profile', 'skill', 'tags')
//            ->find($id)->tags()->save());
//        User::find($id)->tags()->save($tag_id, ['user_id' => $id]);

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
    public function edit(int $id):View
    {
        $user_id = $request->get('user_id');
        $tags = Tag::all();
        return view('account.tags.create', ['user_id'=>$user_id, 'tags'=>$tags]);
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
