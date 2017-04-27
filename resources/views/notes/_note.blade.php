<div class="panel panel-default">

    <div class="panel-heading note-title">
            <h4>
                <button type="button" class="btn btn-sm btn-default like-btn" id="note-like-btn-{{ $note->id }}" data-id="{{ $note->id }}" data-morph="note">
                    <span class="likes-count">{{ $note->likes->count() }}</span>
                    <i class="fa {{ auth()->user()->likedNote($note) ? 'fa-heart' : 'fa-heart-o' }} text-primary"></i>
                </button>
                <a href="{{ route('note', ['user' => $user, 'note' => $note]) }}">{{ $note->title }}</a>
            </h4>
    </div>

    <div class="panel-body note-body">
            <p>{{ $note->content }}</p>
    </div>

    <div class="panel-footer note-info">
        <p>Category: <a href="{{ route('notes.list', ['user' => $user, 'category' => strtolower($note->category->title)]) }}">{{ $note->category->title }}</a> | Comments: {{ $note->comments_count }} | <a href="{{ route('profile', ['user' => $user]) }}">{{ $user->name }}</a> @ {{ $note->created_at->diffForHumans() }}</p>
    </div>

</div>