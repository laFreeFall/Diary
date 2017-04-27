<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreNoteRequest;
use App\Like;
use App\Note;
use App\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(User $user) {
        // $user = auth()->user();
//        dd(request('category'));
        $category = request('category');
        $notes = $user->notes()->
            with('category')->
            withCount('comments')->
//            withCount('likes')->
            with('likes')->
            latest()->
            filterCategory($category)->
            paginate(10);
        $categories = Category::all()->pluck('title', 'id');
//        dd($categories);
        return view('notes.index', compact('user', 'notes', 'categories', 'category'));
    }

    public function show(User $user, Note $note) {
        $comments = $note->comments()->with('author')->get();
        return view('notes.show', compact('user', 'note', 'comments'));
    }

    public function store (User $user, StoreNoteRequest $request) {
        //auth()->user()->notes()->create($request->only('title', 'content'));
//        auth()->user()->addNote(request('title'), request('content'));
        $user->addNote(request('title'), request('content'), request('category_id'));
        flash('Your note has been successfully posted!', 'success');
        return back();
    }

    public function edit (User $user, Note $note) {
        if(auth()->user()->id !== $note->author_id)
            return back();
        $categories = Category::all()->pluck('title', 'id');

        return view('notes.edit', compact('user', 'note', 'categories'));
    }

    public function update (User $user, Note $note, StoreNoteRequest $request) {
//        $note->update([request('title'), request('content'), request('category_id')]);
        $note->update($request->all());
        flash('Your note has been successfully updated!', 'success');
        return redirect()->route('note', ['user' => $user, 'note' => $note]);
    }

    public function destroy (User $user, Note $note) {
        $note->delete();
        flash('Your note has been successfully deleted!', 'warning');

        return redirect()->route('notes.list', $user);
    }

    public function like(Request $request) {
//        Like::create([
//            'user_id' => $request->user_id,
//            'likable_id' => $request->note_id,
//            'likable_type' => 'note'
//        ]);

//        auth()->user()->likes()->save([
//            'likable_id' => $request->note_id,
//            'likable_type' => 'note'
//        ]);
//        dd($request->likable_id);
        auth()->user()->postLike($request->likable_id, 'note');
    }
}