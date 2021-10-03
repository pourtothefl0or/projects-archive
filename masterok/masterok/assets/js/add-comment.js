$('button[name="button_comment"]').click(function (e) {
    e.preventDefault();

    let id = $(this).attr('id');
    let comment = $('textarea[name="comment"]').val();

    $.ajax({
        url: 'vendor/f_add-comment.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            comment: comment
        },
        success (data) {
            if (data.status) {
                location.reload();
            } else {
                $('#error_comment').text(data.message);
            }            
        }
    });
});