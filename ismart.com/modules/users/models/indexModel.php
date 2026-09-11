<?php
// Lấy danh sách người dùng
function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

// Lấy user bằng id
function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}


// Thêm tài khoản
function add_user($data){
    return db_insert('tbl_users',$data);
}

function check_login($username, $password){
    $password_md5 = md5($password);
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '$username' OR `password` = '$password_md5'");
    if($check_user > 0){
        return true;
    }
    return false;
}

// Kiểm tra tài khoản người dùng có tồn tại không
function user_exits($username, $email){
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '$username' OR `email` = '$email'");
    if($check_user > 0){
        return true;
    }
    return false;
}

// Active tài khoản của người dùng
function active_user($active_token){
    db_update('tbl_users', array('is_active' => 1), "`active_token` = '$active_token'");
}

// Kiểm tra active_token có tồn tại trong db hay không
function check_active_token($active_token){
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '$active_token' AND `is_active` 
    = '0'");
    if($check_token > 0){
        return true;
    }
    return false;
}

// Xoá những tài khoản chưa thực hiện xác thực sau 24h
function delete_unverified_account(){
    $time_limit = time() - 86400;
    db_delete("tbl_users", "`is_active` = '0' AND `reg_date` < '$time_limit'");
}

// Kiểm tra email tồn tại trên hệ thống 
function check_email($email){
    $check_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '$email'");
    if($check_email > 0){
        return true;
    }
    return false;
}

function update_reset_token($email, $data){
    db_update('tbl_users', $data, "`email` = '$email'");
}

function check_reset_tokem($reset_token){
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '$reset_token'");
    if($check_token > 0){
        return true;
    }
    return false;
}

function update_pass($data, $reset_token){
    db_update('tbl_users', $data, "`reset_token` = '{$reset_token}'");
}