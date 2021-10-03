$('button[name="button_comment_delete"]').click(function (e) {
    e.preventDefault();

    let id = $(this).attr('id');

    $.ajax({
        url: 'vendor/f_delete-comment.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success (data) {
            if (data.status) {
                location.reload();
            }           
        }
    });
});