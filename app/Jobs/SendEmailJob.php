<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMail;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->details->addressee === 'Тренерам') {
            $users = User::where('role_id', 2)->get();
        } elseif ($this->details->addressee === 'Администраторам') {
            $users = User::where('role_id', 1)->get();
        } elseif ($this->details->addressee === 'Представителям фитнес-клуба') {
            $users = User::where('role_id', 4)->get();
        } elseif ($this->details->addressee === 'Клиентам сайта') {
            $users = User::where('role_id', 3)->get();
        }

        foreach ($users as $user) {
            Mail::to($user)->send(new SendMail($this->details));
        }
    }
}
