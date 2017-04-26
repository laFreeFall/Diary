@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading note-title">
                        <h4 class="text-center">{{ $note->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="note-body">
                            <p>{{ $note->content }}</p>
                        </div>
                        <hr>
                        <div class="note-info">
                            <p>Author: <a href="{{ route('profile', ['user' => $user]) }}">{{ $user->name }}</a> @ {{ $note->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                <p><strong>Comments: </strong> {{ $note->comments->count() }}</p>
                @forelse($note->comments as $comment)
                    @include('comments._comment')
                @empty
                    <div class="alert alert-warning">
                        There are no comments yet. Post a first one! (:
                    </div>
                @endforelse

                @include('comments._add_comment_form')


            </div>
        </div>
    </div>
@endsection


