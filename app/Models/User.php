<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property int $id Идентификатор записи
 * @property string $first_name Имя
 * @property string $last_name Фамилия
 * @property string $password Пароль
 * @property string $email Адрес электронной почты
 * @property Carbon $date_of_birth Дата рождения
 * @property-read Carbon $created_at Дата создания
 * @property-read Carbon $updated_at Дата обновления
 * @property-read Carbon $remember_token Токен
 * @property-read Carbon $email_verified_at Дата подтверждения электронной почты
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'date_of_birth',
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
        'password' => 'hashed',
        'date_of_birth' => 'datetime',
    ];

    /**
     * The events that were created by the user.
     */
    public function createdEvents(): HasMany {
        return $this->hasMany(Event::class, 'creator_user_id');
    }

    /**
     * The events that belong to the user.
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}
