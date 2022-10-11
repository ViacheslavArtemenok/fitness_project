<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Skills\EditRequest;
use Illuminate\Http\RedirectResponse;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $skills = Skill::query()->paginate(config('pagination.admin.skills'));

        return view('admin.skills.index', [
            'skills' => $skills
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
     * @param  Skill $skill
     * @return View
     */
    public function edit(Skill $skill): View
    {
        return view('admin.skills.edit', [
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  Skill  $skill
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Skill $skill): RedirectResponse
    {
        $skill = $skill->fill($request->validated());

        if($skill->save()) {
            return redirect()->route('admin.skills.index')
                ->with('success',  __('messages.admin.skills.update.success'));
        }

        return back()->with('error', __('messages.admin.skills.update.fail'));
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
