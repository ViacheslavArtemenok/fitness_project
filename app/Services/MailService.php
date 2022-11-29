<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class MailService
{
    public function getUsers($type): Collection
    {
        if ($type === 'Тренерам') {
            $users = User::where('role_id', 2)->get();
        } elseif ($type === 'Администраторам') {
            $users = User::where('role_id', 1)->get();
        } elseif ($type === 'Представителям фитнес-клуба') {
            $users = User::where('role_id', 4)->get();
        } elseif ($type === 'Клиентам сайта') {
            $users = User::where('role_id', 3)->get();
        } elseif ($type === 'Подписавшимся') {
            $users = Subscription::where('status', 'subscribed')->get();
        }
        return $users;
    }
}
