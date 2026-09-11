<?php get_header(); ?>

<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user'); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST" id="form-reset-pass">
                        <label for="pass-old">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <span class="error" id="error-pass-old"></span>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <span class="error" id="error-pass-new"></span>
                        <label for="pass-confirm">Xác nhận mật khẩu</label>
                        <input type="password" name="pass-confirm" id="pass-confirm">
                        <span class="error" id="error-pass-confirm"></span>
                        <button type="submit" name="btn-reset" id="btn-reset">Cập nhật</button>
                    </form>
                    <!-- Thông báo sau khi đổi mật khẩu thành công -->
                    <div class="message-success" id="message">
                        <span class="message-success-icon">✓</span>
                        <span class="message-success-   text">Đổi mật khẩu thành công!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>