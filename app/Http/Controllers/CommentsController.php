<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(User $user) {
        $comments = $user->comments()->with('note', 'likes')->paginate(10);

        return view('comments.index', compact('user', 'comments'));
    }

    public function store (User $user, Note $note) {
        $note->addComment($user->id, request('content'));
        flash('Your comment has been successfully posted!', 'success');

        return back();
    }
}