<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function create($id)
    {
        return view('todo.reminder-create')->with('id',$id);
    }

    public function add(Request $request,$id)
    { 
        $reminder = Reminder::firstOrNew(['to_do_id' => $id]);
        $reminder->remind_at = $request->reminder_date;
        $reminder->to_do_id = $id;
        $reminder->message = $request->reminder_message;
        $reminder->save();

        $todos= auth()->user()->toDos()->get();
        return view('todo.todo-index')
            ->with('todos', $todos);
    }

}
