@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">
                        Categories list
                    </h2>
                </div>

                <div class="panel-body">
                    @if(count($categories) > 0)
                        <ul class="list-group col-md-6 col-md-offset-3">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{ route('notes.list', ['user' => auth()->user(), 'category' => strtolower($category->title)]) }}">{{ $category->title }}</a>
                                    <span class="badge">{{ $category->notes_count }}</span>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <div class="alert alert-warning">
                            There are no categories yet ):
                        </div>
                    @endif


                </div>
            </div>



        </div>
    </div>
@endsection
