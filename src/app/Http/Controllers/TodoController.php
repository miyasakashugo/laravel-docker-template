<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;

use App\Todo;

class TodoController extends Controller
{
    private $todo;

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
        $model = new Todo();
        $todo = $this->todo->find($id);
        
        return view('todo.show', ['todo' => $todo]);
    }

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
         // TODO: リクエストされた値を取得
        $inputs = $request->all();

        $todo = $this->todo->find($id);
        // TODO: 更新対象のデータを取得
        $todo->fill($inputs);
        // TODO: 更新したい値の代入とUPDATE文の実行
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
