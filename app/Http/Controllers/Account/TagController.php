<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateRequest;
use App\Models\Relation;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Contracts\View\Factory;
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
     * @param Request $request
     * @return
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
    public function store(Request $request): RedirectResponse
    {
        $user_id = $request->get('id');
        $tag_id = $request->post('tags');
        $user = User::query()
            ->with('profile', 'skill', 'tags')
            ->find($user_id)
        ;
        $user->tags()->sync($tag_id);

        return redirect()->route('account', ['profile'=>$user_id])
            ->with('success', __('messages.account.profiles.update.success'));
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
     * @param int $id
     * @return View
     */
    public function edit(int $id)
    {
        $user = User::all()->find($id);
        $tagsChecked = $user->tags()->get();
        $tags = Tag::all();
//        $tagsChecked = Relation::all()
//        ->where('user_id', $id);
        return view('account.tags.edit', ['user_id'=>$id, 'tags'=>$tags, 'tagsCheked'=>$tagsChecked]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $tag
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, int $tag): RedirectResponse
    {
        $tag_id = $request->post('tags');
        $user = User::query()
            ->with('profile', 'skill', 'tags')
            ->find($tag)
        ;
        $user->tags()->sync($tag_id);

        return redirect()->route('account', ['profile'=>$tag])
            ->with('success', __('messages.account.profiles.update.success'));
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
