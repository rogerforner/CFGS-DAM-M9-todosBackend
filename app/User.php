<?php

namespace RogerForner\TodosBackend;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package App
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    public static function findOrFail($id)
    {
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * A user can have many messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * A user can have many GCM tokens.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gcmTokens()
    {
        return $this->hasMany(GcmToken::class);
    }

    /**
     * @return mixed
     */
    public function routeNotificationForGcm()
    {
        return $this->gcmTokens->pluck('registration_id')->toArray();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
