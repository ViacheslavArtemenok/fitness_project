<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GymImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\GymImage\EditRequest;
use Illuminate\Http\JsonResponse;
use App\Services\UploadService;
use Illuminate\Http\RedirectResponse;

class GymImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $gymImages = GymImage::query()
            ->with('gym')
            ->paginate(config('pagination.admin.gymImages'));

        return view('admin.gymImages.index', ['gymImages' => $gymImages]);
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
     * @param  GymImage $gymImage
     * @return View
     */
    public function edit(GymImage $gymImage): View
    {
        return view('admin.gymImages.edit', ['gymImage' => $gymImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  GymImage $gymImage
     * @param  UploadService $uploadService
     * @return RedirectResponse
     */
    public function update(EditRequest $request, GymImage $gymImage, UploadService $uploadService): RedirectResponse
    {
        $gymImage = $gymImage->fill($request->validated());

        if($gymImage->save()) {
            return redirect()->route('admin.gymImages.index')
                ->with('success',  __('messages.admin.gymImages.update.success'));
        }

        return back()->with('error', __('messages.admin.gymImages.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  GymImage $gymImage
     * @return JsonResponse
     */
    public function destroy(GymImage $gymImage): JsonResponse
    {
        try {
            $deleted = $gymImage->delete();
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
