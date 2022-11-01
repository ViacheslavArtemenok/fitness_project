<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainerReviews\CreateRequest;
use App\Models\TrainerReview;
use App\Queries\TrainerQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrainerReviewController extends Controller
{
    public function __construct()
    {
        $this->trainerBuilder = new TrainerQueryBuilder;
        $this->model = new TrainerReview();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        if ($this->trainerBuilder->create($this->model, $request->validated())) {
            return redirect()->route('trainers.show', ['id' => $request->validated(['trainer_id']), 'city_id' => 0])
                ->with('success', __('messages.reviews.create.success'));
        }
        return back('error', __('messages.reviews.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $trainer_id): View
    {
        return view('trainerReviews.show', [
            'trainer' => $this->trainerBuilder->getById($trainer_id),
            'trainerBuilder' => $this->trainerBuilder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
