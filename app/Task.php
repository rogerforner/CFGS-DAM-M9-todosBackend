<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    /**
     * Definim una relació amb el model User.
     * Obtenim l'usuari que posseeix la tasca.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Eloquent Attribute Casting.
     * Convertir els atributs a altres tipus de dades.
     *
     * - Captat, a més a més, per les polítiques de seguretat.
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];
}
