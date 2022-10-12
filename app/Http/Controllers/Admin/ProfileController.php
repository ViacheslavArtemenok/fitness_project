<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Profiles\EditRequest;
use App\Http\Requests\Profiles\CreateRequest;

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
     * @return View
     */
    public function create(): View
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $profile = new Profile(
            array_merge($request->validated(), ['user_id' => 2])
        );

        if($profile->save()) {
            return redirect()->route('admin.profiles.index')
                ->with('success', __('messages.admin.profiles.create.success'));
        }

        return back()->with('error', __('messages.admin.profiles.create.fail'));
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
     * @param Profile $profile
     *
     * @return JsonResponse
     */
    public function destroy(Profile $profile): JsonResponse
    {
        try {
            $deleted = $profile->delete();
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
