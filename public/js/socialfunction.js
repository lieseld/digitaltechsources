function upvoteResource(resourceId, userId) {
    if ($('.upvote-sect').hasClass('blue')) {
        console.log('should be a downvote');
        return;
    }
    $('.upvote-sect').addClass('blue');
    $.ajax({
        type: 'POST',
        url: '/resources/social/function/upvote',
        data: {resource_id: resourceId, user_id: userId},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            console.log(data);
            $('#resource-upvote-count-' + resourceId).text(data.upvotes);
            alert(data.upvotes);
        },
        error: function(xhr, status, error) {
            $('.upvote-sect').removeClass('blue');
            alert('Upvote failed');
            console.log("Upvote not allowed: " + error.toString());
        }
    })
}