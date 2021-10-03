$('button[name="button_register"]').click(function (e) {
    e.preventDefault();

    let name = $('input[name="name"]').val();
    let email = $('input[name="email"]').val();
    let telephone = $('input[name="telephone"]').val();
    let password = $('input[name="password"]').val();
    let password_confirm = $('input[name="password_confirm"]').val();

    $('input').removeClass('ui-input--error');

    $.ajax({
        url: 'vendor/f_register.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            email: email,
            telephone: telephone,
            password: password,
            password_confirm: password_confirm
        },
        success (data) {
            if (data.status) {
                window.location.href = "login.php";
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`[name*="${field}"]`).addClass('ui-input--error');
                    });
                }
                $('#error_register').text(data.message);
            }            
        }
    });
});