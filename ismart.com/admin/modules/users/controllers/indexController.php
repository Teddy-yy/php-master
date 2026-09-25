<?php
// Hàm dùng chung, load đầu tiên
function construct() {
    load_model('index');
    // Chỉ trang xử lí đăng kí mới cần sử dụng validation
    load('lib','validation');
    load('lib','sendmail');
}

function indexAction() {
    load('helper','format');
    $list_users = get_list_users();
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function loginAction(){
    global $error, $username, $password;
    if(isset($_POST['btn_login'])){
        $error = array();

        // Kiểm tra tên đăng nhập
        if(empty($_POST['username'])){
            $error['username'] = "Tên đăng nhập không được để trống";
        } else if(!is_username($_POST['username'])){
            $error['username'] = "Tên đăng nhập phải từ 3-20 ký tự, chỉ gồm chữ, số, dấu gạch dưới (_) hoặc gạch ngang (-)";
        } else {
            $username = $_POST['username'];
        }

        // Kiểm tra mật khẩu
        if(empty($_POST['password'])){
            $error['password'] = "Mật khẩu không được để trống";
        } else if(!is_password($_POST['password'])){
            $error['password'] = "Mật khẩu phải dài ít nhất 8 ký tự, bao gồm ít nhất: 1 chữ hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt";
        } else {
            $password = $_POST['password'];
        }

        // Kết luận
        if(empty($error)){
            if(check_login($username, $password)){
                // Lưu trữ phiên đăng nhập
                $_SESSION['user_login'] = $username;
                $_SESSION['is_login'] = true;
                // Chuyển hướng vào trong hệ thống
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
            }
        } 
    }

    load_view('login');
}

// Đăng xuất
function logoutAction(){
    unset($_SESSION['user_login']);
    unset($_SESSION['is_login']);
    redirect("?mod=users&action=login");
}


function updateAction(){
    if(isset($_POST['btn-update'])){
        $error = array();

        // Kiểm tra họ tên
        if(!empty($_POST['fullname'])){
            if(!is_fullname($_POST['fullname'])){
                $error['fullname'] = "Họ và tên chỉ được chứa chữ cái, khoảng trắng và dài từ 2-50 ký tự";
            } else {
                $fullname = $_POST['fullname'];
            }
        }  

        // Kiểm tra email
        if(empty($_POST['email'])){
            $error['email'] = "Email không được để trống";
        } else if(!is_email($_POST['email'])){
            $error['email'] = "Địa chỉ email không đúng định dạng";
        } else {
            $email = $_POST['email'];
        }

        // Kiểm tra phone_number
        if(!empty($_POST['phone_number'])){
            if(!is_phone_number($_POST['phone_number'])){
                $error['phone_number'] = "Số điện thoại không đúng định dạng";
            } else {
                $phone_number = $_POST['phone_number'];
            }
        }  

        $address = $_POST['address'];

        if(empty($error)){
            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'address' => $address,
                'phone_number' => $phone_number,
            );

            update_user_login(user_login() ,$data);
        }
    }

    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('update', $data);
}

function resetAction(){
    global $error;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $error = array();
        $data = array();

        // Kiểm tra mật khẩu cũ
        if(empty($_POST['pass-old'])){
            $error['pass-old'] = "Không được để trống mật khẩu cũ";
        } else if(!check_pass(user_login(), md5($_POST['pass-old']))){
            $error['pass-old'] = "Mật khẩu không đúng";
        } else {
            $data['pass-old'] = $_POST['pass-old'];
        }

        // Kiểm tra mật khẩu mới
        if(empty($_POST['pass-new'])){
            $error['pass-new'] = "Không được để trống mật khẩu mới";
        } else if(!is_password($_POST['pass-new'])){
            $error['pass-new'] = "Mật khẩu phải dài ít nhất 8 ký tự, bao gồm ít nhất: 1 chữ hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt";
        } else {
            $data['pass-new'] = md5($_POST['pass-new']);
        }

        // Kiểm tra mật khẩu xác nhận 
        if(empty($_POST['pass-confirm'])){
            $error['pass-confirm'] = "Không được để trống mật khẩu xác thực";
        } else {
            $data['pass-confirm'] = md5($_POST['pass-confirm']);
        }

        if(empty($error)){
            if($data['pass-confirm'] === $data['pass-new']){
                $data_update = array(
                    'password' => $data['pass-new']
                );
                update_user_login(user_login(), $data_update);
                
                echo json_encode([
                    'status' => 'success',
                ]);

                exit();
            }
        } else {
            echo json_encode([
                'status' => 'error',
                "errors" => $error,
                'data' => $data,
            ]);

            exit(); 
        }
    }
    load_view('reset');
}

// Xử lí cập nhật ảnh đại diện
function updateAvatarAction(){
    // Xử lí ảnh Ajax gửi
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $error = array();

        $info_user = get_user_by_username(user_login());
        $old_avatar = $info_user['avatar'];
        
        // 1. Kiểm tra loại ảnh: png, webp, jpg, gif, jpeg
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // tạo một đối tượng dùng để kiểm tra thông tin của file, ở đây là FILEINFO_MIME_TYPE dùng để kiểm tra loại ảnh

        $type = finfo_file($finfo, $_FILES['avatar']['tmp_name']); // Dùng $finfo để kiểm tra file tạm và lấy MIME type của nó.

        $type_allowed = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if(!in_array($type, $type_allowed)){
            $error['type'] = "Loại ảnh không hợp lệ!";
        } else {
            // 2. Kiểm tra kích thước ảnh < 5MB
            $max_size = 5 * 1024 * 1024;

            if($_FILES['avatar']['size'] > $max_size) {
                $error['size'] = "Kích thước ảnh phải nhỏ hơn 5MB";
            }
        }

        if(empty($error)){
            // 3. Đổi tên
            $upload_dir = "public/upload/avatars/";
            $type = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $new_name = uniqid('avatar_').'.'.$type;
            $upload_file = $upload_dir.$new_name;

            // 4. Cập nhật file ảnh đã đổi tên vào DB 
            $data = array(
                'avatar' => $new_name
            );

            update_user_login(user_login(), $data);

            // 5. Chuyển ảnh đã đổi tên vào upload/avatars
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_file)){
                // Sau khi thêm ảnh thành công thì xoá bỏ avatar cũ
                if(file_exists($upload_dir . $old_avatar)){
                    unlink($upload_dir . $old_avatar);
                }

                echo json_encode([
                    'status' => 'success',
                    'upload_file' => $upload_file
                ]);
                exit();
            }   
            
        } else {
            echo json_encode([
                'status' => 'error',
                'error' => $error,
                'file' => $_FILES
            ]);

            exit();
        }   
    }
}


