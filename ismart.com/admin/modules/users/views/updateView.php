<?php
    get_header();
    global $data;
    $info_user = $data['info_user'];
    if(empty($info_user['avatar'])){
        $avatar = "public/upload/avatars/default-avatar.jpg";
    } else {
        $avatar = $info_user['avatar'];
    }
?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form id="form-avatar" class="form-avatar" method="post" enctype="multipart/form-data">
                        <label for="">Ảnh đại diện</label>
                        <img id="avatar-preview" src="<?php echo $avatar ?>" alt="Avatar" class="avatar-preview">
                        <label class="avatar-upload" for="avatar-input" id="avatar-upload">
                            <img src="public/upload/icons/camera.svg" alt="" class="avatar-upload-icon">
                        </label>
                        <input class="avatar-input" type="file" id="avatar-input" name="avatar">
                    </form>
                    <form id="form-profile" method="POST">
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name" value="<?php echo $info_user['fullname'] ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="admin" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email'] ?>">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="tel" value="<?php echo $info_user['phone_number'] ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" style="resize: none;"><?php echo $info_user['address'] ?></textarea>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>