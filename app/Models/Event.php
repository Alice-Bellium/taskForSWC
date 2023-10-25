<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id Идентификатор записи
 * @property string $title Заголовок
 * @property string $text Текст
 * @property int $creator_user_id Идентификатор пользователя
 * @property-read Carbon $created_at Дата создания
 * @property-read Carbon $updated_at Дата обновления
 * @property-read User $creatorUser Создатель
 */
class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'text',
        'creator_user_id',
    ];

    /**
     * The event creator user.
     */
    public function creatorUser(): BelongsTo {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    /**
     * The users that belong to the event.
     */
        public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
