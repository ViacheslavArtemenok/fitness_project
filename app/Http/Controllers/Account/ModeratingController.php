<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Moderating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ModeratingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request)
    {
        $moderating = new Moderating();
        $moderating->user_id = $request->user_id;
        $moderating->status = 'IS_PENDING';
        $moderating->reason = 'нет';
        if ($moderating->save()) {
            return redirect()->route('account')
                ->with('success', __('messages.account.moderating.success'));
        }
        return back('error', __('messages.account.moderating.fail'));

        }
}
