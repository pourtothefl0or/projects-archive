/* -- INPUTS -- */
let inputItems = document.querySelectorAll(".ui-input__item");

inputItems.forEach(function (inputItem) {
    inputItem.oninput = function (e) {
        if (e.target.value != "") {
            e.target.nextElementSibling.classList.add('ui-input__name--active');
        } else {
            e.target.nextElementSibling.classList.remove('ui-input__name--active');
        }
    };

    inputItem.onselect = function (e) {
        if (e.target.selected != false) {
            e.target.nextElementSibling.classList.add('ui-input__name--active');
        } else {
            e.target.nextElementSibling.classList.remove('ui-input__name--active');
        }
    };
});



/* -- MODAL -- */
const buttons = document.querySelectorAll('#button_modal');
const modalOverlay = document.querySelector('.modal-overlay');
const modals = document.querySelectorAll('.modal');

buttons.forEach((el) => {
	el.addEventListener('click', (e) => {
		let path = e.currentTarget.getAttribute('data-path');

		modals.forEach((el) => {
			modalOverlay.classList.remove('modal-overlay--active');
			el.classList.remove('modal--active');
		});

		document.querySelector(`[data-target="${path}"]`).classList.add('modal--active');
		modalOverlay.classList.add('modal-overlay--active');
	});
});



/* -- WIDGET -- */
const widgets = document.querySelectorAll('.widget');

widgets.forEach(function (widget) {
    widget.addEventListener('click', function (e) {
        if (e.target.classList.contains('widget__title')) {
            e.target.classList.toggle('widget__title--active');
            e.target.nextElementSibling.classList.toggle('widget__body--active');
        }
    });
});



/* -- FILTER RESET -- */
$('button[id="button_reset"]').click(function (e) {
    e.preventDefault();
    window.location.href = "index.php";
});



/* -- CALC -- */
$('button[id="button_calc"]').click(function (e) {
    e.preventDefault();

    let sex_calc = $('select[id="sex_calc"]').val();
    let height_calc = $('input[id="height_calc"]').val();
    let weight_calc = $('input[id="weight_calc"]').val();
    let age_calc = $('input[id="age_calc"]').val();
    let load_calc = $('select[id="load_calc"]').val();

    $.ajax({
        url: 'vendor/f_calc.php',
        type: 'POST',
        dataType: 'json',
        data: {
            sex_calc: sex_calc,
            height_calc: height_calc,
            weight_calc: weight_calc,
            age_calc: age_calc,
            load_calc: load_calc
        },
        success (data) {
            $('#error_calc').addClass("form-error_indent");
            $('#error_calc').text(data.message);           
        }
    });
});



/* -- LOGIN -- */
$('button[id="button_login"]').click(function (e) {
    e.preventDefault();

    let email_login = $('input[id="email_login"]').val();
    let password_login = $('input[id="password_login"]').val();

    $.ajax({
        url: 'vendor/f_login.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email_login: email_login,
            password_login: password_login
        },
        success (data) {
            if (data.status) {
                location.reload();
            } else {
                $('#error_login').addClass("form-error_indent");
                $('#error_login').text(data.message);
            }            
        }
    });
});



/* -- REGISTER -- */
$('button[id="button_register"]').click(function (e) {
    e.preventDefault();

    let name_register = $('input[id="name_register"]').val();
    let email_register = $('input[id="email_register"]').val();
    let password_register = $('input[id="password_register"]').val();
    let repeat_register = $('input[id="repeat_register"]').val();

    $.ajax({
        url: 'vendor/f_register.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name_register: name_register,
            email_register: email_register,
            password_register: password_register,
            repeat_register: repeat_register
        },
        success (data) {
            if (data.status) {
                location.reload();
            } else {
                $('#error_register').addClass("form-error_indent");
                $('#error_register').text(data.message);
            }            
        }
    });
});



/* -- LOGOUT -- */
$('button[id="button_logout"]').click(function (e) {
    e.preventDefault();
    let question = confirm("Вы хотите выйти?");
    if (question == true) {
        window.location.href = 'vendor/f_logout.php';
    }
});



/* -- FAVORITE -- */
$('button[id="button_favorite"]').click(function (e) {
    e.preventDefault();

    let id_favorite = $(this).attr('data-id');

    $.ajax({
        url: 'vendor/f_favorite.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_favorite: id_favorite
        },
        success () {
            location.reload();
        }
    });
});



/* -- PRODUCT ADD -- */
let image_add = false;
$('input[id="image_add"]').change(function (e) { 
    image_add = e.target.files[0];
});

$('button[id="button_add"]').click(function (e) {
    e.preventDefault();

    let category_add = $('select[id="category_add"]').val();
    let name_add = $('input[id="name_add"]').val();
    let property1_add = $('input[id="property1_add"]').val();
    let property2_add = $('input[id="property2_add"]').val();
    let property3_add = $('input[id="property3_add"]').val();
    let property4_add = $('input[id="property4_add"]').val();

    let formData_add = new FormData();
    formData_add.append('category_add', category_add);
    formData_add.append('name_add', name_add);
    formData_add.append('property1_add', property1_add);
    formData_add.append('property2_add', property2_add);
    formData_add.append('property3_add', property3_add);
    formData_add.append('property4_add', property4_add);
    formData_add.append('image_add', image_add);

    $.ajax({
        url: 'vendor/f_product-add.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData_add,
        success (data) {
            if (data.status) {
                location.reload();
            } else {
                $('#error_add').addClass("form-error_indent");
                $('#error_add').text(data.message);   
            }
        }
    });
});



/* -- PRODUCT EDIT -- */
let image_edit = false;
$('input[id="image_edit"]').change(function (e) { 
    image_edit = e.target.files[0];
});

$('button[id="button_edit"]').click(function (e) {
    e.preventDefault();

    let id_edit = $(this).attr('data-id');
    let category_edit = $('select[id="category_edit"]').val();
    let name_edit = $('input[id="name_edit"]').val();
    let property1_edit = $('input[id="property1_edit"]').val();
    let property2_edit = $('input[id="property2_edit"]').val();
    let property3_edit = $('input[id="property3_edit"]').val();
    let property4_edit = $('input[id="property4_edit"]').val();

    let formData_edit = new FormData();
    formData_edit.append('id_edit', id_edit);
    formData_edit.append('category_edit', category_edit);
    formData_edit.append('name_edit', name_edit);
    formData_edit.append('property1_edit', property1_edit);
    formData_edit.append('property2_edit', property2_edit);
    formData_edit.append('property3_edit', property3_edit);
    formData_edit.append('property4_edit', property4_edit);
    formData_edit.append('image_edit', image_edit);

    $.ajax({
        url: 'vendor/f_product-edit.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData_edit,
        success (data) {
            if (data.status) {
                location.reload();
            } else {
                $('#error_edit').addClass("form-error_indent");
                $('#error_edit').text(data.message);   
            }
        }
    });
});



/* -- PRODUCT DELETE -- */
$('button[id="button_delete"]').click(function (e) {
    e.preventDefault();
    let product_id = $(this).attr('data-id');
    $.ajax({
        url: 'vendor/f_product-delete.php',
        type: 'POST',
        data: { product_id: product_id },
        success () {
            let question = confirm("Вы хотите удалиить блюдо?");
            if (question == true) {
                window.location.href = "index.php";
            }
        }
    });
});