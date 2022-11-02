<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::query()->with('profile')->paginate(config('pagination.admin.users'));

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $user = new User(
            array_merge(
                $request->validated(),
                ['password' => Hash::make($request['password'])]
            )
        );

        //        $profile = new Profile();
        //
        //        $profile->last_name = $request->input('last_name');
        //        $profile->user_id = $user->id;
        //
        //        $user->profile()->save($profile);

        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.users.create.success'));
        }

        return back()->with('error', __('messages.admin.users.create.fail'));
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
     * @param  User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill(array_merge(
            $request->validated(),
            ['password' => $user->password]
        ));

        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('success',  __('messages.admin.users.update.success'));
        }

        return back()->with('error', __('messages.admin.users.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $deleted = $user->delete();
            if ($deleted === false) {
                return \response()->json(['status' => 'error'], 400);
            } else {
                return \response()->json(['status' => 'ok']);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . ' ' . $e->getCode());
            return \response()->json(['status' => 'error'], 400);
        }
    }
}
