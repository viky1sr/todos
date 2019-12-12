@extends('layouts.app')

@section('title')
    Todos App
@endsection

@section('content')
    <h1 class="text-center my-5">Todos Page</h1>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                            Todos
                            <a href="{{route('delete.all')}}" class="btn btn-danger float-right btn-sm">Delete all</a>

                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $todo)
                        <li class="list-group-item">
                            {{$todo->name }}
                            @if ($todo->completed == 1)
                                <a href="/todos/{{$todo->id}}/complete" class="btn btn-warning float-right btn-sm ml-2">Compeleted</a>
                            @else
                                <a href="/todos/{{$todo->id}}/complete" class="btn btn-warning float-right btn-sm ml-2">Complete</a>
                            @endif
                            <a href="/todos/{{$todo->id}}" class="btn btn-primary float-right btn-sm">View</a>
                        </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
