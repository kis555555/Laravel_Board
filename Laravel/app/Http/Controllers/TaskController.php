<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        //$tasks = Task::latest()->where('user_id',auth()->id())->get(); // Task를 최신 순으로 가져옴
        return view('tasks',[
            'tasks' => $tasks
        ]);
    }
    public function create()
    {
        return view('create');
    }
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $values = request(['title','body']);
        $values['user_id'] = auth()->id();

        $task = Task::create($values);

        return redirect('/tasks/'.$task->id);
    }
    public function show(Task $task) // 아이디
    {
        /*if(auth()->id() != $task->user_id)
        {
            abort(403);
        }*/

        //abort_unless(auth()->user()->owns($task),403);
       
        return view('show',[
            'task' => $task
        ]);
    }

    public function edit(Task $task) #$task 라고 하면 id만 가져오지만 Task $task 하면 전체를 가져옴
    {
        abort_unless(auth()->user()->owns($task),403);
        return view('edit',[
            'task' => $task
        ]);
    }
    public function update(Task $task)
    {
        abort_unless(auth()->user()->owns($task),403);

        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $task->update(request(['title','body']));

        return redirect('/tasks/'.$task->id);
    }

    public function destroy(Task $task)
    {
        abort_unless(auth()->user()->owns($task),403);

        $task->delete();

        return redirect('/tasks');
    }

}
