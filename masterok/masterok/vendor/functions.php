<?php
function get_city() {
    if (isset($_GET['city'])) {
        $city = "`cities_name` = '{$_GET['city']}'";
    } else {
        $city = "`cities_name` != ''";
    }
    return $city;
}

function get_category() {
    if (isset($_GET['category'])) {
        $category = "`categories_name` = '{$_GET['category']}'";
    } else {
        $category = "`categories_name` != ''";
    }
    return $category;
}

function str_search() {
    if (isset($_GET['search']) && strpos($_SERVER['REQUEST_URI'], 'index.php') == false) {
        header('Location: index.php?search='.$_GET['search']);
    }
}
?>