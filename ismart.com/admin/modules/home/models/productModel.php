<?php
    // Hàm thực hiện chức năng lấy ra danh sách danh mục sản phẩm cha
    function get_list_cat_parent($parent_id = 0){
        $sql = "SELECT * FROM `tbl_categories` WHERE `parent_id` = '{$parent_id}'";
        $result = db_fetch_array($sql);
        return $result;
    }

    // Hàm thực hiện chức năng lấy ra danh sách danh mục sản phẩm con
    function get_list_cat_child(){
        $parent_id = isset($_GET['cat_id']) ? (int)$_GET['cat_id'] : 1;
        $sql = "SELECT * FROM `tbl_categories` WHERE `parent_id` = '{$parent_id}'";
        $result = db_fetch_array($sql);
        return $result;
    }
?>