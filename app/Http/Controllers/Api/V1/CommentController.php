<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
//        $comments = Comment::whereNotNull('commentable_type')
//            ->whereNotNull('commentable_id')
//            ->get();
//
//        $movies = $comments->map(function ($comment) {
//            return $comment->commentable;
//        });
    }


    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->validated());
        return $this->successResponse(
            CommentResource::make($comment),
            trans('comment.success_store'),
            201
        );
    }


    public function show(Comment $comment)
    {
        return CommentResource::make($comment->load('movie','user'));


    }


    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return $this->successResponse(
            CommentResource::make($comment),
            trans('comment.success_update'),
            201
        );

    }

    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();
        return $this->successResponse(
            CommentResource::make($comment),
            trans('comment.success_delete'),
            201
        );
    }
    public function restore(Comment $comment)
    {
        $comment->restore();
    }
}
