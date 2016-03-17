$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#like').on("click", function ()
    {
        var tut_id = $(this).attr('tutorial-id')
        $x = $.ajax({
            method: 'POST',
            url: '/tutorials/' + tut_id + '/like'
        });
        var num = Number($('#count').text());

        $x.done(function (response) {
            console.log(response.message);

            if (response.message == 'liked') {
                $('#count').text(' ' + ++num);
            } else if(response.message == 'unliked') {
                $('#count').text(' ' + --num);
            }
        });
    });

    $('#createComment').on("click", function (e)
    {
        var comment = $('#comment').val().trim();
        var tut_id = $(this).attr('tutorial-id');

        if (comment.length !== 0) {
            addNewComment = $.ajax({
                type : 'POST',
                url: '/tutorials/comment',
                data: {
                    comment:  comment,
                    video_id: tut_id
                }
            });
            addNewComment.done(function (response) {
                $('#comment').val('');
                var newComment = '';
                newComment = '<li class="media">';
                newComment += '<a class="media-left" href="#">';
                newComment += '<img class="media-object img-circle img-thumbnail" src='+ response.user.avatar +' style="width:100px;">';
                newComment += '</a>';
                newComment += '<div class="media-body">';
                newComment += '<div class="well">'
                newComment += '<h4 class="media-heading">'+ response.user.name +'</h4>';
                newComment += '<h6 class="pull-right">1 second ago </h6>';
                newComment += '<p class="media-comment">' + comment + '</p>';
                newComment += '</div>';
                newComment += '</div>';
                newComment += '</li>';

                $('.media-list').prepend(newComment);
            });
        }
    });
});