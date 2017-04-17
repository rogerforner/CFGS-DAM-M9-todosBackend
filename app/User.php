<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Quan un nou objecte User sigui creat, s'executaran els mètodes de la classe NewUser, amb tots els processos
     * que comporti aquesta.
     *
     * @var array
     */
    protected $events = [
        'created' => Events\NewUser::class
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Afegim la relació hasMany (de un a molts) amb respecte a Task.
     * Mètode tasks().
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
