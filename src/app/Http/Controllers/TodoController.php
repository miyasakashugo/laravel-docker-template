<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }   

    public function store(Request $request)
    {

        $inputs = $request->all();

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    public function create()
    {
        return view('todo.create');
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $this->todo->find($id);
        
        return view('todo.show', ['todo' => $todo]);
    }

    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
    
}
