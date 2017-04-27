@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text-center">
                            {{ $user->name }}`s profile
                        </h2>
                    </div>

                    <div class="panel-body">

                        <div class="col-md-6">
                            <h3 class="text-center">Notes</h3>
                            <h3 class="text-center"><a href="{{ route('notes.list', $user) }}">{{ $user->notes->count() }}</a></h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">Comments</h3>
                            <h3 class="text-center"><a href="{{ route('comments.list', $user) }}">{{ $user->comments->count() }}</a></h3>
                        </div>

                        <div class="col-md-12"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
