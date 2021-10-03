/* -- LOGIN -- */
$('button[name="login"]').click(function (e) {
    e.preventDefault();

    let login = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();

    $.ajax({
        url: 'functions/f_auth.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {
            if (data.status) {
                window.location.reload();
            } else {
                $('#msg_login').text(data.message);
            }            
        }
    });
});
/* -- /LOGIN -- */

/* -- EXIT -- */
$('button[name="exit"]').click(function (e) {
    e.preventDefault();

    $.ajax({
        url: 'functions/f_exit.php',
        type: 'POST',
        
        success () {
            window.location.reload();
        }
    });
    
});
/* -- /EXIT -- */