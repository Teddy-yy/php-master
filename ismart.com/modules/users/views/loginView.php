<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="wrapper-form-login">
        <h1>LOGIN</h1>
        <form action="" method="post" class="form-login">
            <input type="text" name="username" id="" placeholder="Username" value="<?php echo set_value('username') ?>">
            <?php echo form_error('username') ?>
            <input type="password" name="password" id="" placeholder="Password">
            <?php echo form_error('password') ?>
            <!-- <input type="checkbox" name="remember_me" id="">Ghi nhớ đăng nhập -->
            <input type="submit" value="Login" name="btn_login">
            <?php echo form_error('account') ?>
        </form>
        <a href="<?php echo base_url("?mod=users&action=reset")?>">Lost your password?</a>|<a href="<?php echo base_url("?mod=users&action=reg")?>">Register</a>
    </div>
</body>
</html>        