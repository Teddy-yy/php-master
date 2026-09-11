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

function addAction() {
    
}

function editAction() {
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}

function regAction(){
    global $error, $fullname, $username, $email, $password; // global các biến này để sử dụng trong hàm form_error và set_value
    if(isset($_POST['btn_reg'])){
        $error = array();

        // Kiểm tra họ tên
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Họ và tên không được để trống";
        } else if(!is_fullname($_POST['fullname'])){
            $error['fullname'] = "Họ và tên chỉ được chứa chữ cái, khoảng trắng và dài từ 2-50 ký tự";
        } else {
            $fullname = $_POST['fullname'];
        }

        // Kiểm tra tên đăng nhập
        if(empty($_POST['username'])){
            $error['username'] = "Tên đăng nhập không được để trống";
        } else if(!is_username($_POST['username'])){
            $error['username'] = "Tên đăng nhập phải từ 3-20 ký tự, chỉ gồm chữ, số, dấu gạch dưới (_) hoặc gạch ngang (-)";
        } else {
            $username = $_POST['username'];
        }

        // Kiểm tra email
        if(empty($_POST['email'])){
            $error['email'] = "Email không được để trống";
        } else if(!is_email($_POST['email'])){
            $error['email'] = "Địa chỉ email không đúng định dạng";
        } else {
            $email = $_POST['email'];
        }

        // Kiểm tra mật khẩu
        if(empty($_POST['password'])){
            $error['password'] = "Mật khẩu không được để trống";
        } else if(!is_password($_POST['password'])){
            $error['password'] = "Mật khẩu phải dài ít nhất 8 ký tự, bao gồm ít nhất: 1 chữ hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt";
        } else {
            $password = md5($_POST['password']);
        }


        if(empty($error)){
            if(!user_exits($username, $email)){
                $active_token = md5($username.time());
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password,
                    'active_token' => $active_token,
                    'reg_date' => time(),
                );

                add_user($data);

                // Sau khi thêm người dùng mới thì xoá đi những tài khoản chưa xác thực sau 24h
                delete_unverified_account();

                $link_active = base_url("?mod=users&action=active&active_token=$active_token");
                $content = "<p>Vui lòng bấm vào link này để kích hoạt tài khoản: <a href='$link_active'>Click here!</a></p>";
                send_mail("huyenlinhtran2002@gmail.com", "Linh", "Kích hoạt tài khoản", $content);

                redirect("?mod=users&action=login");
            } else {
                $error['account'] = "Email hoặc tên đăng nhập đã tồn tại trên hệ thống";
            }
        }
    }

    load_view('reg');
}

function loginACtion(){
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
            $password = md5($_POST['password']);
        }

        // Kết luận
        if(empty($error)){
            if(check_login($username, $password)){
                // Lưu trữ phiên đăng nhập
                $_SESSION['username'] = $username;
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

function activeAction(){
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    if(check_active_token($active_token)){
        active_user($active_token);
        echo "Bạn đã kích hoạt thành công, vui lòng click vào link sau để đăng nhập: <a href='$link_login'>Đăng nhập</a>";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt trước đó, vui lòng click vào link sau để đăng nhập: <a href='$link_login'>Đăng nhập</a>";
    }   
}

// Đăng xuất
function logoutAction(){
    unset($_SESSION['username']);
    unset($_SESSION['is_login']);
    redirect("?mod=users&action=login");
}

function resetAction() {
    global $error, $email;
    $reset_token = $_GET['reset_token'];
    if(!empty($reset_token)){
        if(check_reset_tokem($reset_token)){
            if(isset($_POST['btn_new-pass'])){
                $error = array();

                // Kiểm tra mật khẩu
                if(empty($_POST['password'])){
                    $error['password'] = "Mật khẩu không được để trống";
                } else if(!is_password($_POST['password'])){
                    $error['password'] = "Mật khẩu phải dài ít nhất 8 ký tự, bao gồm ít nhất: 1 chữ hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt";
                } else {
                    $password = md5($_POST['password']);
                }

                if(empty($error)){
                    $data = array(
                        'password' => $password,
                    );

                    update_pass($data, $reset_token);
                    redirect("?mod=users&action=resetSuccess");
                } 
            }

            load_view('newPass');
        } else {
            echo "Yêu cầu lấy lại mật khẩu không hợp lệ";
        }
    } else {
        if(isset($_POST['btn_reset'])){
            $error = array();

            // Kiểm tra email
            if(empty($_POST['email'])) {
                $error['email'] = "Email không được để trống";
            } else if(!is_email($_POST['email'])){
                $error['email'] = "Địa chỉ email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
            
            // Kết luận
            if(empty($error)){
                if(check_email($email)){
                    $reset_token = md5($email.time());
                    $data = array(
                        'reset_token' => $reset_token
                    );
                    // Cập nhật reset_token
                    update_reset_token($email, $data);
                    // Gửi link khôi phục vào email
                    $link_reset = base_url("?mod=users&action=reset&reset_token={$reset_token}");
                    $content = "<p>Vui lòng bấm vào link này để thiết lập lại mật khẩu: <a href='$link_reset'>Click here!</a></p>";
                    send_mail($email, '', 'Khôi phục mật khẩu', $content);
                } else {
                    $error['account'] = "Email không tồn tại";
                }
            } 
        }

        load_view('reset');
    }
}

function resetSuccessAction(){
    load_view('resetSuccess');
}