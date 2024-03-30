<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class todoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this -> task = new Todo();
    }
    public function index()
    {
        $response['tasks'] = $this->task->all();
        return inertia::render('Todo/index',$response);
    }

    public function store(request $request)
    {
        
        $this->task->create($request -> all());
        return redirect()->back();
    }

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task -> delete();
        return redirect()->back();
    }
}
