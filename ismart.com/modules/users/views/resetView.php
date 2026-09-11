<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi phục mật khẩu</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="wrapper-form-login">
        <h1>KHÔI PHỤC MẬT KHẨU</h1>
        <form action="" method="post" class="form-login">
            <input type="email" name="email" id="" placeholder="Email" value="<?php echo set_value('email') ?>">
            <?php echo form_error('email') ?>
            <input type="submit" value="GỬI YÊU CẦU" name="btn_reset">
            <a href="<?php echo base_url("?mod=users&action=login") ?>">Đăng nhập</a> | <a href="<?php echo base_url("?mod=users&action=regis") ?>">Đăng kí</a>
        </form>
    </div>
</body>
</html>        