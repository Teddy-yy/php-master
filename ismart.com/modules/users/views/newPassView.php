<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiết lập mật khẩu mới</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="wrapper-form-login">
        <h1>THIẾT LẬP MẬT KHẨU MỚI</h1>
        <form action="" method="post" class="form-login">
            <input type="password" name="password" id="" placeholder="Password">
            <?php echo form_error('password') ?>
            <input type="submit" value="Lưu" name="btn_new-pass">
            <?php echo form_error('account') ?>
        </form>
        <a href="<?php echo base_url("?mod=users&action=reset")?>">Lost your password?</a>|<a href="<?php echo base_url("?mod=users&action=reg")?>">Register</a>
    </div>
</body>
</html>        