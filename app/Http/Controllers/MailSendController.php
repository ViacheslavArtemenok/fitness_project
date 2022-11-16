<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class MailSendController extends Controller
{

    public function index(){
        return view('sendMail.sendMail');
    }


    public function send(Request $request) {
        $request->validate([
            'message' => 'required|max:500',
        ]);

        $data = new stdClass();
        $data->addressee = $request->addressee;
        $data->message = $request->message;
        if ($data->addressee === 'Тренерам') {
            $users = User::where('role_id', 2)->get();
            // dd($users);
        }elseif ($data->addressee === 'Админестраторам'){
            $users = User::where('role_id', 1)->get();
            // dd($users);
        }elseif($data->addressee === 'Представителям зала'){
            $users = User::where('role_id', 4)->get();
            // dd($users);
        }elseif ($data->addressee === 'Клиентам сайта') {
            $users = User::where('role_id', 3)->get();
            // dd($users);
        }

        Mail::to($users)->send(new SendMail($data));

        return redirect()->route('send.index')
            ->with('success', 'Ваше сообщение успешно отправлено');
    }
    // public function send(){
    //     $user = User::find(1);
    //     // dd($user);
    //     Mail::mailer('postmark')->to($user)
    //     ->send(new SendMail('sendMail.sendMail', 'sendMail.sendMail', 'sendMail.sendMail'));
    // }
}
