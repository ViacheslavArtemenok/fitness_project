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
    public function __construct()
    {
        $this->model = User::query();
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): void
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
     * @param int $id
     * @return View
     */
    public function edit(int $id)
    {
        $user = $this->model
            ->with('tags')
            ->findOrFail($id);
        $tags = Tag::all();
        //        $tagsChecked = Relation::all()
        //        ->where('user_id', $id);
        return view('account.tags.edit', ['tags' => $tags, 'tagsCheked' => $user->tags]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $tag
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, int $user_id): RedirectResponse
    {
        $tag_id = $request->post('tags');
        $user = $this->model
            ->with('tags')
            ->findOrFail($user_id);

        if ($user->tags()->sync($tag_id)) {
            return redirect()->route('account')
                ->with('success', __('messages.account.profiles.update.success'));
        }
        return back()->with('error', __('messages.account.profiles.update.fail'));
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
