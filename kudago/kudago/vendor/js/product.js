/* -- ADD -- */
let add_image = false;
$('input[name="add_image"]').change(function (e) { add_image = e.target.files[0]; });

$('button[name="add"]').click(function (e) {
    e.preventDefault();
    
    let add_category = $('select[name="add_category"]').val();
    let add_name = $('input[name="add_name"]').val();
    let add_adress = $('input[name="add_adress"]').val();
    let add_tel = $('input[name="add_tel"]').val();
    let add_price = $('input[name="add_price"]').val();

    let add_formData = new FormData();
    add_formData.append('add_category', add_category);
    add_formData.append('add_name', add_name);
    add_formData.append('add_adress', add_adress);
    add_formData.append('add_tel', add_tel);
    add_formData.append('add_price', add_price);
    add_formData.append('add_image', add_image);

    $.ajax({
        url: 'functions/f_product-add.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: add_formData,
        success (data) {
            if (data.status) {
                location.reload();
            } else {
                $('#msg_add').text(data.message);
            }            
        }
    });
});
/* -- /ADD -- */