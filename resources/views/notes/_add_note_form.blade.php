{{--{!! Form::open(['route' => ['note.store', $user]]) !!}--}}
@if(isset($note))
    {!! Form::model($note, ['route' => ['note.update', $user, $note], 'method' => 'patch']) !!}
@else
    {!! Form::open(['route' => ['note.store', $user]]) !!}
@endif

{{--{!! Form::open(['action' => 'NotesController@store', $user]) !!}--}}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Your thoughts') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'required', 'rows' => 3]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Theme') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required', 'placeholder' => 'Select theme']) !!}
    </div>
<div class="form-group">

    {!! Form::submit('Post Note!', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}