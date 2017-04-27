<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Note;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function storeNote(Request $request) {
//        dd($request->all());
        Like::firstOrNew([
            'user_id' => auth()->user()->id,
            'likable_id' => $request->likable_id,
            'likable_type' => $request->likable_type
        ])->toggle();
        $note = Note::find($request->likable_id);
        return response()->json([auth()->user()->likedNote($note), $note->id, $note->likes()->count()]);
    }

    public function storeComment(Request $request) {
//        dd($request->all());
        Like::firstOrNew([
            'user_id' => auth()->user()->id,
            'likable_id' => $request->likable_id,
            'likable_type' => $request->likable_type
        ])->toggle();
        $comment = Comment::find($request->likable_id);
        return response()->json([auth()->user()->likedComment($comment), $comment->id, $comment->likes()->count()]);
    }
}
