<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
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
        if ($request->email) {
            $data = new stdClass();
            $data->addressee = $request->addressee;
            $data->message = $request->message;
            if ($data->addressee === 'Тренерам') {
                $users = User::where('role_id', 2)->get();
            }elseif ($data->addressee === 'Админестраторам'){
                $users = User::where('role_id', 1)->get();
            }elseif($data->addressee === 'Представителям зала'){
                $users = User::where('role_id', 4)->get();
            }elseif ($data->addressee === 'Клиентам сайта') {
                $users = User::where('role_id', 3)->get();
            }
            Mail::to($users)->send(new SendMail($data));
        } elseif ($request->telegramm) {
            $client = new Client();
            try {
                $client->post('https://api.telegram.org/bot1617689359:AAEMBaqhumYqs1qCBjdsP1aI19jXqbKNhGE/sendMessage', [
                    RequestOptions::JSON => [
                        'chat_id' => -833719373,
                        'text' => $request->message,
                    ]
                ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
        return redirect()->route('admin.send.index')
            ->with('success', 'Ваше сообщение успешно отправлено');
    }
}
