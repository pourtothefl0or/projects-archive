<?php
require('connect.php');

/* -- GET CATEGORY -- */
function get_category() {
    if(isset($_GET['category'])) {
        $get_category = [];
        $get_category = $_GET['category'];
        $get_category = "WHERE `category_name` IN ('".implode("','",$get_category)."')";
    }
    return $get_category;
}



/* -- GET SORTING -- */
function get_sorting() {
    if ($_GET['sorting'] == 'min') {
        $get_sorting = "ORDER BY `products_property-1` ASC";
    } elseif ($_GET['sorting'] == 'max') {
        $get_sorting = "ORDER BY `products_property-1` DESC";
    }
    return $get_sorting;
}



/* -- CATEGORY COMPARSION IN CHECKBOX -- */
function implode_category() {
    if (isset($_GET['category'])) {
        $implode = implode(',', $_GET['category']);
    }
    return $implode;
}



/* -- CALORIES COMPARSION IN RADIO -- */
function checkedCalories_min() {
    if ($_GET['sorting'] == 'min') {
        echo "checked";
    }
}

function checkedCalories_max() {
    if ($_GET['sorting'] == 'max') {
        echo "checked";
    }
}



/* -- CATEGORY COMPARSION IN WIDGET -- */
function checkedCategory_title() {
    if (isset($_GET['category'])) {
        echo "widget__title--active";
    }
}

function checkedCategory_body() {
    if (isset($_GET['category'])) {
        echo "widget__body--active";
    }
}



/* -- CALORIES COMPARSION IN WIDGET -- */
function checkedCalories_title() {
    if (isset($_GET['sorting'])) {
        echo "widget__title--active";
    }
}

function checkedCalories_body() {
    if (isset($_GET['sorting'])) {
        echo "widget__body--active";
    }
}
?>