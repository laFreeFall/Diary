<div class="panel panel-default">
    <div class="panel-body">
        <p>{{ $comment->content }}</p>
    </div>
    <div class="panel-footer">
        <p>Posted by <a href="{{ route('profile', ['user' => $user]) }}">{{ $comment->author->name }}</a> @ {{ $comment->created_at->diffForHumans() }}</p>
    </div>
</div>
