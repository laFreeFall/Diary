<p>{{ $comment->content }}</p>
<p>Posted by {{ $comment->author->name }} @ {{ $comment->created_at->diffForHumans() }}</p>
<hr><br>