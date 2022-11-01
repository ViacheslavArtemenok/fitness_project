<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Characteristics\CreateRequest;
use App\Http\Requests\Characteristics\EditRequest;
use App\Models\Characteristic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CharacteristicsController extends Controller
{
   public function __construct()
   {
       $this->model = Characteristic::query();
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.characteristics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $createRequest
     * @return RedirectResponse
     */
    public function store(CreateRequest $createRequest): RedirectResponse
    {
        if (Characteristic::create($createRequest->validated())) {
            return redirect()->route('account')
                ->with('success', __('messages.account.skills.create.success'));
        }
        return back('error', __('messages.account.skills.create.fail'));
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
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('account.characteristics.edit', [
            'characteristic' => $this->model
                ->where('user_id', $id)
                ->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Characteristic $characteristic
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Characteristic $characteristic,): RedirectResponse
    {
        if ($characteristic->fill($request->validated())->save()) {
            return redirect()->route('account')
                ->with('success', __('messages.account.skills.update.success'));
        }
        return back('error', __('messages.account.skills.update.fail'));
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
