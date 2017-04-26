{!! Form::open(['route' => ['comment.store', $user, $note]]) !!}

<div class="form-group">
    {!! Form::label('content', 'Your comment') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'required', 'rows' => 2]) !!}
</div>

{!! Form::submit('Publish!', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}