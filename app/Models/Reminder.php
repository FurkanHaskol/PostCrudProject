<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'remind_at',
        'to_do_id',
        'message',
    ];

    public function toDo()
    {
        return $this->belongsto(Reminder::class, 'to_do_id');
    }

}
