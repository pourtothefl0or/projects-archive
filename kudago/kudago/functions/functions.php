<?php
session_start();
require 'functions/connect.php';

function filter_category() {
    if (isset($_GET['category'])) {
        $filter_category = "`category_name` = '{$_GET['category']}'";
    } else {
        $filter_category = "`category_name` != ''";
    }
    return $filter_category;
}

function filter_group() {
    if (isset($_GET['group'])) {
        $filter_group = "ASC";
    } else {
        $filter_group = "DESC";
    }
    return $filter_group;
}
?>