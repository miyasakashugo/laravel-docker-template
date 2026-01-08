<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;

use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }   

    public function store(TodoRequest $request)
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
        $todo = $this->todo->find($id);
        
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);

        // dd($todo);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);

        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.show', $id);
    }

    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();

        return redirect()->route('todo.index', $id);
    }

}
