<?php

namespace App\Http\Controllers\Admin;

use App\Models\Characteristic;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characteristics = Characteristic::query()->paginate(config('pagination.admin.characteristics'));

        return view('admin.characteristics.index', [
            'characteristics' => $characteristics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.characteristics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.characteristics.index')
            ->with('success', __('messages.admin.characteristics.create.success'));
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
     * @param  Characteristic $characteristic
     * @return View
     */
    public function edit(Characteristic $characteristic)
    {
        return view('admin.characteristics.edit', [
            'characteristic' => $characteristic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Characteristic $characteristic
     * @return RedirectResponse
     */
    public function update(Request $request, Characteristic $characteristic): RedirectResponse
    {
//        $user = $user->fill(array_merge($request->validated(),
//            ['password' => Hash::make($request['password'])]
//        ));
//
//        if($user->save()) {
            return redirect()->route('admin.characteristics.index')
                ->with('success',  __('messages.admin.characteristics.update.success'));
//        }
//
//        return back()->with('error', __('messages.admin.users.update.fail'));
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
