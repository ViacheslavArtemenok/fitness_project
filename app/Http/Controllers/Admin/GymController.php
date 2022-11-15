<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Http\Requests\Gyms\EditRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\UploadService;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $gyms = Gym::query()
            ->with('user')
            ->paginate(config('pagination.admin.gyms'));

        return view('admin.gyms.index', ['gyms' => $gyms]);
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
     * @param  Gym $gym
     * @return View
     */
    public function edit(Gym $gym): View
    {
        return view('admin.gyms.edit', ['gym' => $gym]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  Gym $gym
     * @param  UploadService $uploadService
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Gym $gym, UploadService $uploadService): RedirectResponse
    {
        $gym = $gym->fill($request->validated());

//        if ($gym->hasFile('image')) {
//            $gym['image'] = $uploadService->uploadImage($request->file('image'));
//        }

        if($gym->save()) {
            return redirect()->route('admin.gyms.index')
                ->with('success',  __('messages.admin.gyms.update.success'));
        }

        return back()->with('error', __('messages.admin.gyms.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Gym $gym
     * @return JsonResponse
     */
    public function destroy(Gym $gym): JsonResponse
    {
        try {
            $deleted = $gym->delete();
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
