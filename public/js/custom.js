$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#like').on("click", function ()
    {
        var video_id = $(this).attr('data-video-id')
        $x = $.ajax({
            method: 'POST',
            url: '/tutorials/' + video_id + '/like'
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
});