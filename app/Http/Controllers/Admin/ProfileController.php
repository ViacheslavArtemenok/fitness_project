<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Profiles\EditRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $profiles = Profile::query()->paginate(config('pagination.admin.profiles'));

        return view('admin.profiles.index', [
            'profiles' => $profiles
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
     * @param  Profile $profile
     * @return View
     */
    public function edit(Profile $profile): View
    {
        return view('admin.profiles.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  Profile  $profile
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Profile $profile): RedirectResponse
    {
        $profile = $profile->fill($request->validated());

        if($profile->save()) {
            return redirect()->route('admin.profiles.index')
                ->with('success',  __('messages.admin.profiles.update.success'));
        }

        return back()->with('error', __('messages.admin.profiles.update.fail'));
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
