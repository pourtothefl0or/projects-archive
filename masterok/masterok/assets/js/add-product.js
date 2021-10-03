let image = false;
$('input[name="image"]').change(function (e) { 
    image = e.target.files[0]; 
});

$('button[name="button_add"]').click(function (e) {
    e.preventDefault();
    
    let city = $('select[name="city"]').val();
    let category = $('select[name="category"]').val();
    let name = $('input[name="name"]').val();
    let desc = $('textarea[name="desc"]').val();
    let number = $('input[name="number"]').val();
    let whatsapp = $('input[name="whatsapp"]').val();
    let telegram = $('input[name="telegram"]').val();
    let viber = $('input[name="viber"]').val();

    let formData = new FormData();
    formData.append('city', city);
    formData.append('category', category);
    formData.append('name', name);
    formData.append('desc', desc);
    formData.append('number', number);
    formData.append('whatsapp', whatsapp);
    formData.append('telegram', telegram);
    formData.append('viber', viber);
    formData.append('image', image);

    $.ajax({
        url: 'vendor/f_add-product.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            if (data.status) {
                window.location.href = "index.php";
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`[name*="${field}"]`).addClass('ui-input--error');
                    });
                }
                $('#error_add').text(data.message);
            }            
        }
    });
});