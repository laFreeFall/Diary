<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store (User $user, Note $note) {
        $note->addComment($user->id, request('content'));

        return back();
    }
}