@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Edit Brand</h1>
        @include('includes.form_error')
        <form action="{{route('brands.update', $brand->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{$brand->name}}" placeholder="Brand...">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" id="description" cols="100%" rows="10" placeholder="Description...">{{$brand->description}}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Edit Brand</button>
            </div>
        </form>
    </div>
@endsection
