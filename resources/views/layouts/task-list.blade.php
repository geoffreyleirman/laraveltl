@auth

        <div class="comment-form">

            <h4 class="font-bold">TASK LIST</h4>

            <form action="{{route('tasks.store')}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{$task->id}}">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="1"
                                              placeholder="Description" required></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn leave-comment-btn">ADD TASK<i
                                class="fa fa-angle-right ml-2"></i></button>
                    </div>
                </div>

            </form>
        </div>

        @yield('content')

@endauth
