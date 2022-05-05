<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostCommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::user()){
            $user = Auth::user();
            $data = [
              'comment_id' => $request->postcomment_id,
              'user_id'=>  $user->id,
                'photo_id'=>$user->photo_id,
                'body'=>$request->body,
            ];
            Reply::create($data);
            Session::flash('postcomment_message', 'Reply message submitted and awaits moderation!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function storeBestReply(Reply $postcommentreply){
        //dd($postcommentreply->postcomment());
        $comment = Comment::find($postcommentreply->comment_id);
        //dd($comment);
        $this->authorize('update',$comment);
        $comment->best_replies_id=$postcommentreply->id;
        $comment->update();
        return back();
    }
}
