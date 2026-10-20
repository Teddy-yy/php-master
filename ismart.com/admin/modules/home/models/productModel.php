<?php
    /* Product */
    # Tạo mã sản phẩm
    function createProductCode($product_id_child){
        // Lấy tên danh mục có `cat_code` = $product_id_child
        $sql_1 = "SELECT `code` FROM `tbl_categories` WHERE `cat_id` = '$product_id_child'";
        $cat_list = db_fetch_row($sql_1);
        $cat = str_replace("SUB-", "", $cat_list['code']);
        $sql_2 = "SELECT * FROM `tbl_products` WHERE `cat_child_id` = '$product_id_child'";
        $next_number = 1;
        if(db_num_rows($sql_2) > 0) {
            $product_list = db_fetch_array($sql_2);
            $product_code = end($product_list);
            $number = (int)substr($product_code['code'], -4);
            $next_number = $number + 1;
        }
        $new_code = 'PRD-' . $cat . '-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
        return $new_code;
    }

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