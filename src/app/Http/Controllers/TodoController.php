<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        // dd($todos);

        return view('todo.index', ['todos' => $todos]);
    }   

    public function store(Request $request)
    {
        // dd('新規作成のルート実行！');

        $inputs = $request->all();

        // dd($request); 

        $todo = new Todo(); 

        $todo->fill($inputs);

        $todo->save();

        return redirect()->route('todo.index');
    }

    public function create()
    {
        return view('todo.create');
    }
    
}
