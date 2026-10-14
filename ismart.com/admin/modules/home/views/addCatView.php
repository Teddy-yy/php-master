<?php 
    get_header();
    $list_cat_parent = $list_cat_parent ?? [];    
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <div id="content-header">
                        <h3 id="index" class="fl-left">Thêm danh mục sản phẩm</h3>
                    </div>
                </div>
            </div>
            <div class="add-cat wp">
                <h4 class="add-cat-title">Thông tin danh mục sản phẩm</h4>
                <form action="" method="post" class="form-add-cat" enctype="multipart/form-data">
                    <div class="form-input-wp">
                        <label for="cat-name">Tên danh mục</label>
                        <input type="text" name="cat-name" id="cat-name" placeholder="Nhập tên danh mục" value="<?php echo set_value('cat_name')?>">
                        <?php echo form_error('cat-name') ?>
                    </div>
                    <div class="form-input-wp">
                        <label for="cat-parent">Danh mục cha</label>
                        <div class="select-wrapper">
                            <select name="cat-parent" id="">
                                <option value="0">Không có danh mục cha</option>
                                <?php foreach($list_cat_parent as $item){ ?>
                                    <option value="<?php echo $item['cat_id'] ?>"><?php echo $item['name'] ?></option>
                                <?php } ?>
                            </select>
                            <img src="public/icons/chevron-down.svg" alt="" class="select-arrow">
                        </div>
                    </div>
                    <div class="form-input-wp">
                        <label for="">Ảnh danh mục</label>
                        <div class="form-upload-img" id="form-upload-img">
                            <img src="" alt="" id="form-img">
                            <img src="public/icons/xmark.svg" alt="" class="form-delete-img" id="form-delete-img">
                        </div>
                        <label for="cat-input-img" class="form-upload-label">
                            <input type="file" name="cat-input-img" id="cat-input-img" hidden>
                            <div class="form-upload-wp">
                                <img src="public/icons/upload.svg" alt="">
                            </div>
                            <p>Tải ảnh lên</p>
                        </label>
                        <?php echo form_error('cat-input-img') ?>
                    </div>
                    <input type="submit" value="Thêm danh mục" name="btn-add-cat">
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>