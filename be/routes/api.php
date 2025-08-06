<?php

use App\Events\CommentPosted;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 이 라우트는 /api/ 로 접근 가능합니다.
Route::get('/', function () {
    $comments = Comment::latest()->get();
    return response()->json($comments);
});

Route::post('/post-comment', function (Request $request) {
    $request->validate([
        'text' => 'required|string|max:255',
    ]);

    $comment = Comment::create([
        'text' => $request->input('text'),
    ]);

    broadcast(new CommentPosted($comment))->toOthers();

    return response()->json(['message' => 'Comment posted successfully!', 'comment' => $comment], 201);
});