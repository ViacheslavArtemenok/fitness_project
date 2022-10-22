<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skills\CreateRequest;
use App\Http\Requests\Skills\EditRequest;
use App\Models\Skill;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
//        dd($_GET);
        $id = $_GET['skill'];
        $skill = Skill::all()
            ->where('user_id', $id)
            ->first();
        return view('account.skills.index', ['skill' => $skill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $user_id = $_GET['skill'];
        return view('account.skills.create', ['user_id'=>$user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request
    ): RedirectResponse
    {
        $user_id = $_GET['user_id'];
        $validated = $request->validated();
        $skill = new Skill(
            $validated
        );
        $skill['user_id'] = $user_id;

        if ($skill->save()){
            DB::table('users')
                ->where('id', '=', $user_id)
                ->update(['status' => 'ACTIVE']);
            return redirect()->route('account.skills.index', ['skill'=>$user_id])
                ->with('success', __('messages.account.skills.create.success'));
        }
        return back('error', __('messages.account.skills.create.fail'));
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
    public function edit(int $id): View
    {
        $skill = Skill::all()
            ->where('user_id', $id)
            ->first();
        return view('account.skills.edit', ['skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Skill $skill
     * @return View|Factory|RedirectResponse|Application
     */
    public function update(EditRequest $request,
                           Skill $skill
    ): View|Factory|RedirectResponse|Application
    {
        $skill = $skill->fill($request->validated());
//        dd($skill->user_id);

        if ($skill->save()){
            return redirect()->route('account.skills.index', ['skill'=>$skill->user_id])
                ->with('success', __('messages.account.skills.update.success'));
        }
        return back('error', __('messages.account.skills.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        //
    }
}
