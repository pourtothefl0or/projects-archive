$('button[name="button_login"]').click(function (e) {
    e.preventDefault();

    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();

    $('input').removeClass('ui-input--error');

    $.ajax({
        url: 'vendor/f_login.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {
            if (data.status) {
                window.location.href = "index.php";
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`[name*="${field}"]`).addClass('ui-input--error');
                    });
                }
                $('#error_login').text(data.message);
            }            
        }
    });
});