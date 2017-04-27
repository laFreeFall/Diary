@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading note-title">
                    <button type="button" class="btn btn-sm btn-default like-btn" id="note-like-btn-{{ $note->id }}" data-id="{{ $note->id }}" data-morph="note">
                        <span class="likes-count">{{ $note->likes->count() }}</span>
                        <i class="fa {{ auth()->user()->likedNote($note) ? 'fa-heart' : 'fa-heart-o' }} text-primary"></i>
                    </button>
                    <h4 class="text-center">{{ $note->title }}
                    <div class="btn-group btn-group-sm pull-right" role="group">
                        <a href="{{ route('note.edit', ['user' => auth()->user(), 'note' => $note]) }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-default" onclick="confirmDelete()" ><i class="fa fa-times"></i></a>
                    </div>
                    </h4>
                    <div class="clearfix"></div>
                    {!! Form::open(['route' => ['note.delete', $user, $note], 'method' => 'delete', 'id' => 'note-delete-form']) !!}
                    {!! Form::close() !!}
                    <form id="note-delete-form" action="{{ route('note.delete', ['user' => auth()->user(), 'note' => $note]) }}" method="delete" style="display: none;">
                    </form>
                </div>
                <div class="panel-body note-body">
                    <p>{{ $note->content }}</p>
                </div>
                <div class="panel-footer note-info">
                    <p>Category: {{ $note->category->title }} | Author: <a href="{{ route('profile', ['user' => $user]) }}">{{ $user->name }}</a> @ {{ $note->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <p><strong>Comments: </strong> {{ $note->comments->count() }}</p>
            @forelse($comments as $comment)
                @include('comments._comment')
            @empty
                <div class="alert alert-warning">
                    There are no comments yet. Post a first one! (:
                </div>
            @endforelse

            @include('comments._add_comment_form')


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete() {
            if(confirm('Are you sure you want to delete?'))
                document.getElementById('note-delete-form').submit();

        }
    </script>

    <script src="{{ asset('js/like.js') }}"></script>
@endpush

