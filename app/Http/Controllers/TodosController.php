<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Dotenv\Validator;

class TodosController extends Controller
{
    public function index()
    {
        //fetch all todos from database
        $todos = Todo::all();


        //display them into route index
        return view('todos.index')->with('todos', $todos);
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    public function createTodo()
    {

        return view('todos.create');
    }

    public function storeTodo()
    {

        // validate data
        $this->validate(request(), [
            'name' => 'required|min:6',
            'description' => 'required'
        ]);


        $dataTodo = request()->all();

        $todo = new Todo();
        $todo->name = $dataTodo['name'];
        $todo->description = $dataTodo['description'];
        $todo->completed = false;
        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo',$todo);
    }

    public function update(Todo $todo)
    {   //validate the data
        $this->validate(request(), [
            'name' => 'required|min:6',
            'description' => 'required'
        ]);

        $dataTodo= request()->all();


        $todo->name = $dataTodo['name'];
        $todo->description = $dataTodo['description'];
        $todo->save();
        session()->flash('success', 'Todos updated successfuly');
        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {

        $todo->delete();
        session()->flash('success', 'Todos deleted successfuly');
        return redirect('/todos');
    }
    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        return redirect('/todos')->with('todo', $todo);
    }

    public function destroyAll()
    {
        Todo::query()->delete();
        return redirect()->back()->with('sukses','Data berhasil di hapus');
    }
}
