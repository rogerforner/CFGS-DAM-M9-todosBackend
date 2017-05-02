<?php

namespace RogerForner\TodosBackend;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id', 'name', 'done', 'priority','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
