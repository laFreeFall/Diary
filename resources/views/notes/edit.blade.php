@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading note-title">
                    <h4 class="text-center">Edit :: {{ $note->title }}</h4>
                </div>

                <div class="panel-body note-body">
                    @include('notes._add_note_form')
                    @include('partials._errors')
                </div>

                {{--<div class="panel-footer note-info">--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection


