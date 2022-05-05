@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Brand</h1>
        @include('includes.form_error')
        <form action="{{route('brands.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Brand...">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" id="description" cols="100%" rows="10" placeholder="Description..."></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Add Brand</button>
            </div>
        </form>
    </div>
@endsection
