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

    // Kiểm tra tên danh mục đã tồn tại chưa
    function check_cat_name($cat_name){
        $sql = "SELECT * FROM `tbl_categories` WHERE `name` = '$cat_name'";
        $result = db_num_rows($sql);
        if($result > 0){
            return false;
        } 
        return true;
    }

    // Kiểm tra mã danh mục đã tồn tại chưa
    function check_cat_code($cat_code){
        $sql = "SELECT * FROM `tbl_categories` WHERE `name` = '$cat_code'";
        $result = db_num_rows($sql);
        if($result > 0){
            return false;
        } 
        return true;
    }

    function createCategoryCode($parent_id){
        $sql = "SELECT * FROM `tbl_categories` WHERE `parent_id` = '$parent_id'";
        $result = db_fetch_array($sql);
        $last_cat = end($result);
        $last_cat_code = mb_substr($last_cat['code'], -3, null, 'UTF-8');

        return 'CTG' . str_pad($last_cat_code + 1, 3, '0', STR_PAD_LEFT);
    }
?>