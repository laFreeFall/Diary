@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">
                        {{ $user->name }}`s diary
                    </h2>
                    <h3 class="text-center">
                        <span class="badge">{{ $notes->total() }}</span> {{ isset($category) ? ucfirst($category) : '' }} notes
                    </h3>
                </div>

                <div class="panel-body">

                    <button data-toggle="collapse" data-target="#add-note" class="btn btn-info pull-right">Post a Note</button>
                    <div class="clearfix"></div><br>

                    <div id="add-note" class="collapse {{ (count($errors) > 0) ? 'in' : ''}}">
                        @include('notes._add_note_form', ['user' => $user])
                        @include('partials._errors')
                    </div>
                </div>
            </div>

            @forelse($notes as $note)
                @include('notes._note')
            @empty
                <div class="alert alert-warning">
                    User <strong>{{ $user->name }}</strong> haven't posted any notes yet ):
                </div>
            @endforelse

            <div class="pagination-links text-center">
                {{ $notes->links() }}
            </div>

        </div>
    </div>
@endsection
