$('.like-btn').click(function() {
    var morphType = $(this).data('morph'); //note/comment
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "POST",
        url: "/like",
        data: {
            likable_id: $(this).data('id'),
            likable_type: morphType
        }
    }).done(function(data) {
        var likesDiv = $('#' + morphType + '-like-btn-' + data[1]);
        if(data[0]) {
            likesDiv.children('.fa').removeClass('fa-heart-o').addClass('fa-heart');
        } else {
            likesDiv.children('.fa').removeClass('fa-heart').addClass('fa-heart-o');
        }
        likesDiv.children('.likes-count').html(data[2]);
    });
})