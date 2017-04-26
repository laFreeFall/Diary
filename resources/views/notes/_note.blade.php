<div class="panel panel-default">
    <div class="panel-heading note-title">
            <h4><a href="{{ route('note', ['user' => $user, 'note' => $note]) }}">{{ $note->title }}</a></h4>
    </div>
    <div class="panel-body">
        <div class="note-body">
            <p>{{ $note->content }}</p>
        </div>
        <hr>
        <div class="note-info">
            <p><a href="{{ route('profile', ['user' => $user]) }}">{{ $user->name }}</a> @ {{ $note->created_at->diffForHumans() }}</p>
        </div>
    </div>

</div>