$('button[name="button_product_delete"]').click(function (e) {
    e.preventDefault();

    let id = $(this).attr('id');

    $.ajax({
        url: 'vendor/f_delete-product.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success (data) {
            if (data.status) {
                window.location.href = 'index.php';
            }           
        }
    });
});