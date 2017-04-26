{!! Form::open(['route' => ['note.store', $user]]) !!}
{{--{!! Form::open(['action' => 'NotesController@store', $user]) !!}--}}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Your thoughts') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'required', 'rows' => 3]) !!}
    </div>

    {!! Form::submit('Post Note!', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}