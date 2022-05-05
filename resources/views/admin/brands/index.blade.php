@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @if(session('brands_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('brands_message')}}
            </div>
        @endif
        <h1>Brand</h1>
        <table class="table table-striped shadow-lg p-3 mb-5 bg-body rounded table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($brands)
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->description}}</td>
                        <td>{{$brand->created_at->diffForHumans()}}</td>
                        <td>{{$brand->updated_at->diffForHumans()}}</td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-warning" href="{{route('brands.edit', $brand->id)}}">Edit</a>
                            <form action="{{route('brands.destroy', $brand->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="alert alert-warning">
                        {{session('user_message')}}l
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$brands->links()}}
        </div>
    </div>
@stop
