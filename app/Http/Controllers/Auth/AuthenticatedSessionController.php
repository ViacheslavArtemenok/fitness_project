<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $redirectTo = '';

        $request->authenticate();

        $request->session()->regenerate();

        switch (Auth::user()->role) {
            case 'IS_ADMIN':
                $redirectTo = RouteServiceProvider::ADMIN;
                break;
            case 'IS_CLIENT':
                $redirectTo = RouteServiceProvider::CLIENT;
                break;
            case 'IS_GYM':
                $redirectTo = RouteServiceProvider::GYM;
                break;
            case 'IS_TRAINER':
                $redirectTo = RouteServiceProvider::ACCOUNT;
                break;
            default:
                dd(Auth::user());
                break;
        }

        //return redirect()->intended(RouteServiceProvider::ACCOUNT);
        return redirect()->intended($redirectTo);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
