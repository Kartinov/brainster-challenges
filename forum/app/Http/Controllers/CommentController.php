<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;

class CommentController extends Controller
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
    public function create(Discussion $discussion)
    {
        return view('comments.create', compact('discussion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request, Discussion $discussion)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
            'discussion_id' => $discussion->id
        ]);

        Comment::create($request->only('user_id', 'discussion_id', 'comment_text'));

        return to_route('discussions.show', $discussion)->with(
            'message',
            'Comment created successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion, Comment $comment)
    {
        return view('comments.edit', compact('discussion', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCommentRequest $request, Discussion $discussion, Comment $comment)
    {
        $comment->update($request->validated());

        return to_route('discussions.show', $discussion)
            ->with('message', 'You have updated your comment.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion, Comment $comment)
    {
        $comment->delete();

        return to_route('discussions.show', $discussion)
            ->with('message', 'You have deleted your comment');
    }
}
