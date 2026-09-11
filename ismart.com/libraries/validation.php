<?php
    // Kiểm tra họ và tên
    function is_fullname($fullname){
        $pattern = "/^[a-zA-Z\sÀ-ỹ]{2,50}$/u";
        if(!preg_match($pattern, $fullname)){
            return false;
        } 
        return true;
    }

    // Kiểm tra tên đăng nhập
    function is_username($username){
        $pattern = "/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/";
        if(!preg_match($pattern, $username)){
            return false;
        } 
        return true;
    }

    // Kiểm tra mật khẩu (dài ít nhất 8 kí tự và phải bao gồm chữ viết hoa, chữ thường, số, kí tự đặc biệt)
    function is_password($password){
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if(!preg_match($pattern, $password)){
            return false;
        } 
        return true;
    }

    // Kiểm tra email
    function is_email($email){
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if(!preg_match($pattern, $email)){
            return false;
        } 
        return true;
    }

    // Kiểm tra nếu input trống thì hiện thông báo lỗi
    function form_error($label_field){
        global $error;
        if(!empty($error[$label_field])){
            return "<p class='error'>{$error[$label_field]}</p>";
        }
    }

    // Nếu value đã điền đúng thì giữ lại
    function set_value($label_field){
        global $$label_field;
        if(!empty($$label_field)) return $$label_field;
    }
?>