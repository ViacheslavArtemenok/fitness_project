<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('info.home', [
            'promoList' => config('promo.promoList'),
            'marketList' => config('promo.marketList')
        ]);
    }
    public function about()
    {
        return view('info.about', [
            'main' => config('promo.about.main'),
            'cards' => config('promo.about.cards'),
        ]);
    }
    public function contacts()
    {
        return view('info.contacts', [
            'main' => config('promo.contacts.main'),

        ]);
    }
    public function developers()
    {
        return view('info.developers', [
            'main' => config('promo.developers.main'),

        ]);
    }
}
