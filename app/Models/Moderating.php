<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Moderating extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    // define status here
    public const IS_PENDING = 'IS_PENDING';
    public const IS_APPROVED = 'IS_APPROVED';
    public const IS_REJECTED = 'IS_REJECTED';

    public const REASON00 = '';
    public const REASON01 = 'анкета содержит некорректные данные';
    public const REASON02 = 'анкета создана автоматически';
    public const REASON03 = 'анкета содержит недопустимые материалы';
    public const REASON04 = 'анкета содержит рекламные материалы';
    public const REASON05 = 'аккаунт заблокирован по жалобам других пользователей';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'reason'
    ];

    /**
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     *
     * @return BelongsTo
     */
    public function profile(): HasOne
    {
        return $this->HasOne(Profile::class, 'user_id', 'user_id');
    }
}
