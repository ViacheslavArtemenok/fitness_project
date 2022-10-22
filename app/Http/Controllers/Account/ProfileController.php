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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
            //
    }

    /**
     * Show the form for creating a new resource.
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
            DB::table('users')
                ->where('id', '=', $user_id)
                ->update(['status' => 'ACTIVE']);
            return redirect()->route('account', ['profile'=>$profile->user_id])
                ->with('success', __('messages.account.profiles.create.success'));
        }
        return back('error', __('messages.account.profiles.create.fail'));
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
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $profile = Profile::all()
            ->where('user_id', $id)
            ->first();
        return view('account.profiles.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Profile $profile
     * @param UploadService $uploadService
     * @return Application|Factory|View|RedirectResponse
     */
    public function update(EditRequest $request,
                           Profile $profile,
                           UploadService $uploadService
    ): View|Factory|RedirectResponse|Application
    {
        $profile = $profile->fill($request->validated());

        if ($request->hasFile('image')) {
            $profile['image'] = $uploadService->uploadImage($request->file('image'));
        }

        if ($profile->save()){
            return redirect()->route('account', ['profile'=>$profile->user_id])
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
    public function destroy(int $id)
    {
        //
    }
}
