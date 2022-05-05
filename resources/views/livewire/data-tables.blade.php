<div>
    <div class="row">
        <div class="col-12">
            <h1>Posts</h1>
            <div class="d-flex justify-content-between mb-1">
                <div class="custom-control custom-switch">
                    <input wire:model="active" type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Active ?</label>
                </div>
                <form>
                    <input wire:model="search" type="text" name="searchlivewire" class="form-control bg-gray-300 border-0 small"
                           placeholder="Search for..." aria-label="searchlivewire" aria-describedby="basic-addon2">
                </form>
                <form>
                    <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Active</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th class="d-flex align-items-center">
                <i class="fas fa-sort"></i>
                <button wire:click="sortBy('title')" class="btn p-0 shadow-none"><strong>Title</strong></button>
            </th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    @if($post->active == 1)
                        <td class="badge badge-pill badge-info">Active</td>
                    @else
                        <td class="badge badge-pill badge-danger">Not Active</td>
                    @endif
                    <td>
                        <img width="auto" height="62" src="{{$post->photo ? asset($post->photo->file) : 'http://via.placeholder.com/62'}}" alt="{{$post->title}}">
                    </td>
                    <td>{{$post->user ? $post->user->name : 'Username not known'}}</td>
                    <td>
                        @if($post->categories)
                            @foreach($post->categories as $category)
                                <span class="badge badge-pill badge-info">{{$category->name}}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a class="btn btn-info mr-1" href="{{route('posts.show', $post->id)}}">Show</a>
                        <a class="btn btn-warning mr-1" href="{{route('posts.edit', $post->id)}}">Edit</a>
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a class="btn btn-success ml-1" href="{{route('home.post', $post)}}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="alert alert-warning">
                    {{session('user_message')}}
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{$posts->links()}}
    </div>
</div>
