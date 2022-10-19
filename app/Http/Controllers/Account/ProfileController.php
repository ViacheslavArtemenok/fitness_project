<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profiles\CreateRequest;
use App\Http\Requests\Profiles\EditRequest;
use App\Models\Profile;
use App\Services\UploadService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param
     * @return View
     */
    public function index(): View
    {
            $id = $_GET['profile'];
            $user = Profile::all()
                ->find($id);
            return view('account.profiles.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *@param Profile $profile
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $user_id = $_GET['profile'];
        return view('account.profiles.create', ['user_id'=>$user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param UploadService $uploadService
     * @return RedirectResponse
     */
    public function store(CreateRequest $request,
                          UploadService $uploadService,
    ): RedirectResponse
    {
        $user_id = $_GET['user_id'];
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
            $validated['user_id'] = $user_id;
        }
        $profile = new Profile(
            $validated
        );

        if ($profile->save()){
            return redirect()->route('account.profiles.index', ['profile'=>$profile])
                ->with('success', __('messages.account.profiles.update.success'));
        }
        return back('error', __('messages.account.profiles.update.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profile $profile
     * @return View
     */
    public function edit(Profile $profile): View
    {
//        dd($profile->id);
        return view('account.profiles.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Profile $profile
     * @param UploadService $uploadService
     * @return RedirectResponse
     */
    public function update(EditRequest $request,
                           Profile $profile,
                           UploadService $uploadService
    ): RedirectResponse
    {
//        dd($request);
        $profile = $profile->fill($request->validated());

        if ($request->hasFile('image')) {
            $profile['image'] = $uploadService->uploadImage($request->file('image'));
        }

        if ($profile->save()){
            return redirect()->route('account.profiles.index', ['profile'=>$profile])
                ->with('success', __('messages.account.profiles.update.success'));
        }
        return back('error', __('messages.account.profiles.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Profile $profile):JsonResponse
    {
        try {
            $profile->delete();
            return \response()->json('ok');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return \response()->json( 'error', 400);
        }
    }
}
