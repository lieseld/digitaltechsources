function upvoteResource(resourceId, userId) {
    $('.upvote-sect').addClass('blue');

    $.ajax({
        type: 'POST',
        url: '',
        data: {resource_id: resourceId, user_id: userId},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            alert('Upvoted!');
        },
        error: function(xhr, status, error) {
            $('.upvote-sect').removeClass('blue');
            alert('Upvote failed');
            console.log("Upvote not allowed: " + error.toString());
        }
    })
}