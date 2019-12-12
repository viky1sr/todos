@extends('layouts.app')

@section('title')
    Todo Item
@endsection

@section('content')
<h1 class="text-center my-5">
        {{$todo->name}}
    </h1>
<div class="row justify-content-center ">
    <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3>Detail</h3>
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>

            </div>

        <a href="/todos/{{$todo->id}}/delete-todo" class="btn btn-danger my-4 float-right">Delete</a>
        <a href="/todos/{{$todo->id}}/edit" class="btn btn-info my-4 float-right  mr-2">Edit</a>
    </div>
</div>

@endsection
