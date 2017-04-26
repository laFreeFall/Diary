<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(User $user) {
        // $user = auth()->user();
        $notes = $user->notes()->latest()->get();

        return view('notes.index', compact('user', 'notes'));
    }

    public function show(User $user, Note $note) {
        $comments = $note->comments;
        return view('notes.show', compact('user', 'note', 'comments'));
    }

    public function store (User $user) {
        //auth()->user()->notes()->create($request->only('title', 'content'));
//        auth()->user()->addNote(request('title'), request('content'));
        $user->addNote(request('title'), request('content'));

        return back();
    }
}