<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="wrapper-form-login">
        <h1>Đăng kí tài khoản</h1>
        <form action="" method="post" class="form-login">
            <input type="text" name="fullname" id="" placeholder="Fullname" value="<?php echo set_value('fullname') ?>">
            <?php echo form_error('fullname') ?>
            <input type="text" name="username" id="" placeholder="Username" value="<?php echo set_value('username') ?>">
            <?php echo form_error('username') ?>
            <input type="email" name="email" id="" placeholder="Email" value="<?php echo set_value('email') ?>">
            <?php echo form_error('email') ?>
            <input type="password" name="password" id="" placeholder="Password" value="">
            <?php echo form_error('password') ?>
            <input type="submit" value="Đăng kí" name="btn_reg">
            <?php echo form_error('account') ?>
        </form>
        <a href="?mod=users&action=login">Đăng nhập</a>
    </div>
</body>
</html>        