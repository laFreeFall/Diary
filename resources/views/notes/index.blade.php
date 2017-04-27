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
                {{ $notes->appends(Request::except('page'))->links() }}
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    $('.like-btn').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/note/like",
            data: {
                likable_id: $(this).data('noteid'),
                likable_type: 'note'
            }
        }).done(function(data) {
            var likesDiv = $('#like-btn-' + data[1]);
            if(data[0]) {
                likesDiv.children('.fa').removeClass('fa-heart-o').addClass('fa-heart');
            } else {
                likesDiv.children('.fa').removeClass('fa-heart').addClass('fa-heart-o');
            }
            likesDiv.children('.likes-count').html(data[2]);
        });
    })
</script>
@endpush