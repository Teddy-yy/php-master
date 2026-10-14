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

    // Kiểm tra phone_number
    function is_phone_number($phone_number){
        $pattern = "/^(0|\+84)(3|5|7|8|9)[0-9]{8}$/";
        if(!preg_match($pattern, $phone_number)){
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

    // Kiểm tra ảnh tải lên
    function check_update_img($image){
        // 1. Kiểm tra người dùng đã chọn ảnh chưa 
        if (!isset($image) || $image['error'] === UPLOAD_ERR_NO_FILE) { 
            return "Vui lòng chọn ảnh"; 
        } 

        // 2. Kiểm tra lỗi tải ảnh 
        if ($image['error'] !== UPLOAD_ERR_OK) { 
            return "Có lỗi xảy ra khi tải ảnh lên"; 
        } 

        // 3. Kiểm tra định dạng ảnh 
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg']; 

        $imageInfo = getimagesize($image['tmp_name']); 

        if ($imageInfo === false) { 
            return "File tải lên không phải là ảnh hợp lệ"; 
        } 
        
        if (!in_array($imageInfo['mime'], $allowedTypes, true)) { 
            return "Chỉ chấp nhận ảnh JPG, PNG, SVG hoặc WEBP"; 
        } 
        
        // 4. Kiểm tra dung lượng (tối đa 2MB) 
        if ($image['size'] > 2 * 1024 * 1024) { 
            return "Dung lượng ảnh không được vượt quá 2MB"; 
        } 
        
        return true;
    }

    // Hàm tạo tên đường dẫn ảnh mới và lưu vào thư mục upload
    function uploadImage($upload_folder, $file){
        $upload_dir = "public/upload/$upload_folder/";

        $file_name = bin2hex(random_bytes(16)) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

        $upload_file = $upload_dir.$file_name;

        if (move_uploaded_file($file['tmp_name'], $upload_file)) {
            return $upload_file;
        }

        return "";
    }
?>