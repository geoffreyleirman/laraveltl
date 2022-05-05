@extends('layouts.task-list')
@section('content')

<ul>
    <li>
        <div class="row">
            <div class="col">
                {{$task->body}}
            </div>
            <div class="col">
                {{$task->user->name}}
            </div>
            <div class="col">
                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </li>
</ul>

@endsection
