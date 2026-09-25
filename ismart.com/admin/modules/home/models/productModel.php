<?php
    // Hàm thực hiện chức năng lấy ra danh sách danh mục sản phẩm
    function get_list_cat($parent_id = 0){
        $sql = "SELECT * FROM `tbl_categories` WHERE `parent_id` = '{$parent_id}'";
        $result = db_fetch_array($sql);
        return $result;
    }
?>