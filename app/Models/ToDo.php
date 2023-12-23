<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reminder()
    {
        return $this->hasOne(Reminder::class, 'to_do_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
