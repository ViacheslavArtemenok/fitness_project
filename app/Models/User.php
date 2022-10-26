<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    // define role here
    public const IS_ADMIN = 'IS_ADMIN';
    public const IS_CLIENT = 'IS_CLIENT';
    public const IS_TRAINER = 'IS_TRAINER';
    public const IS_GYM = 'IS_GYM';
    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function skill(): HasOne
    {
        return $this->hasOne(Skill::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'relations')->withTimestamps();
    }

    public function gyms(): BelongsToMany
    {
        return $this->belongsToMany(Gym::class, 'gym_reviews', 'client_id', 'gym_id');
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'trainer_reviews', 'trainer_id', 'client_id')->withPivot('id', 'client_id', 'title', 'description', 'score', 'status',)->withTimestamps();
    }
    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'trainer_reviews', 'client_id', 'trainer_id')->withPivot('id', 'trainer_id', 'title', 'description', 'score', 'status',)->withTimestamps();
    }
}
