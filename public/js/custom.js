$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#like').on("click", function() {
        var tut_id = $(this).attr('tutorial-id')
        $x = $.ajax({
            method: 'POST',
            url: '/tutorials/' + tut_id + '/like'
        });

        var num = Number($('#count').text());

        $x.done(function(response) {

            if (response.message == 'liked') {
                $('#count').text(' ' + ++num);
            } else if (response.message == 'unliked') {
                $('#count').text(' ' + --num);
            }
        });

        $x.fail(function(response) {
            swal({
                title: "Error",
                text: "Error favoriting tutorial",
                type: "error",
                showCancelButton: true
            });
        });
    });

    $('#createComment').on("click", function(e) {
        var comment = $('#comment').val().trim();
        var tut_id = $(this).attr('tutorial-id');

        if (comment.length !== 0) {
            addNewComment = $.ajax({
                type: 'POST',
                url: '/tutorials/comment',
                data: {
                    comment: comment,
                    video_id: tut_id
                }
            });
            addNewComment.done(function(response) {
                $('#comment').val('');
                var newComment = '';

                newComment = '<li class="comment">';
                newComment += '<article>';
                newComment += '<img class="avatar" src=' + response.user.avatar + ' alt="userAvatar" width="50px" height="50px">';
                newComment += '<div class="comment-meta">';
                newComment += '<h6 class="author">' + response.user.name + ', 1 second ago </h6>';
                newComment += '</div>';
                newComment += '<div class="comment-body">';
                newComment += '<p>' + comment + '</p>';
                newComment += '</div>';
                newComment += '</article>';
                newComment += '</li>';

                $('.comments-list').prepend(newComment);

                var comments = $('#comment-count').html();

                var comments = Number(comments) + 1;
                $('#comment-count').html(comments);
            });

            $addNewComment.fail(function(response) {
            swal({
                title: "Error",
                text: "Error commenting on tutorial",
                type: "error",
                showCancelButton: true
            });
        });
        }
    });

    $('.delete-tutorial').on("click", function(event) {
        event.preventDefault();
        var this_ = $(this);

        swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this Video",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },
            function() {
                $deleteVideo = $.ajax({
                    method: 'DELETE',
                    'url': this_.attr('href')
                });

                $deleteVideo.done(function(response) {
                    if (response.message === "deleted") {
                        window.location = '/profile/tutorials';
                    } else {
                        swal({
                            title: "Error",
                            text: "Error deleting video",
                            type: "error",
                            showCancelButton: true
                        });
                    }
                });

                //network error or any other reason
                $deleteVideo.fail(function (response) {
                     swal({
                            title: "Error",
                            text: "Error deleting video",
                            type: "error",
                            showCancelButton: true
                        });
                });
            });
    });
});
