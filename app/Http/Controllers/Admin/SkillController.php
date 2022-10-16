<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Http\Requests\Skills\EditRequest;
use App\Http\Requests\Skills\CreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $skills = Skill::query()->with('profile')->paginate(config('pagination.admin.skills'));

        return view('admin.skills.index', [
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $skill = new Skill(
            array_merge($request->validated(), ['user_id' => 2])
        );

        if($skill->save()) {
            return redirect()->route('admin.skills.index')
                ->with('success', __('messages.admin.skills.create.success'));
        }

        return back()->with('error', __('messages.admin.skills.create.fail'));
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
     * @param Skill $skill
     *
     * @return JsonResponse
     */
    public function destroy(Skill $skill): JsonResponse
    {
        try {
            $deleted = $skill->delete();
            if ( $deleted === false) {
                return \response()->json(['status' => 'error'], 400);
            } else {
                return \response()->json(['status' => 'ok']);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage().' '.$e->getCode());
            return \response()->json(['status' => 'error'], 400);
        }
    }
}
