<?php
    /* Product */


    /* Category  */
    # Hàm lấy ra danh sách danh mục sản phẩm 
    function get_list_cat($parent_id = ""){
        $sql = "";
        if($parent_id === ""){
            $sql = "SELECT * FROM `tbl_categories`";
        } else {
            $sql = "SELECT * FROM `tbl_categories` WHERE `parent_id` = '{$parent_id}'";
        }
        $result = db_fetch_array($sql);
        return $result;
    }

    # Kiểm tra tên danh mục đã tồn tại chưa
    function check_name($name){
        $sql = "SELECT * FROM `tbl_categories` WHERE `name` = '$name'";
        $result = db_num_rows($sql);
        if($result > 0){
            return false;
        } 
        return true;
    }

    # Kiểm tra mã danh mục đã tồn tại chưa
    function check_cat_code($cat_code){
        $sql = "SELECT * FROM `tbl_categories` WHERE `code` = '$cat_code'";
        $result = db_num_rows($sql);
        if($result > 0){
            return false;
        } 
        return true;
    }

    # Tạo mã danh mục sản phẩm
    function createCategoryCode($parent_id, $code){
        if($parent_id == '0'){
            return "CTG-".$code;
        } else {
            return "SUB-".$code;
        }
    }
?>