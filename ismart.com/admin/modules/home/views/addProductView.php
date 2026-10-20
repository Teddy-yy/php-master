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
                        <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                    </div>
                </div>
            </div>
            <div class="add-cat wp">
                <h4 class="add-cat-title">Thông tin sản phẩm</h4>
                <form action="" method="post" class="form-add-product" enctype="multipart/form-data">
                    <div class="form-row">
                        <!-- Tên Sản phẩm -->
                        <div class="form-input-wp">
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" name="product-name" id="product-name" placeholder="Nhập tên Sản phẩm" value="<?php echo set_value('product_name')?>">
                            <?php echo form_error('product-name') ?>
                        </div>
                        <!-- Danh mục sản phẩm -->
                        <div class="form-input-wp">
                            <label for="product-cat-parent">Danh mục sản phẩm cha</label>
                            <div class="select-wrapper">
                                <select name="product-cat-parent" id="product-cat-parent">
                                    <option value="0">-- Chọn danh mục sản phẩm cha --</option>
                                    <?php foreach($list_cat_parent as $item){ ?>
                                        <option value="<?php echo $item['cat_id'] ?>"><?php echo $item['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <img src="public/icons/chevron-down.svg" alt="" class="select-arrow">
                            </div>
                            <?php echo form_error('product-cat-parent') ?>
                        </div>
                        <div class="form-input-wp">
                            <label for="product-cat-child">Danh mục sản phẩm con</label>
                            <div class="select-wrapper">
                                <select name="product-cat-child" id="product-cat-child">
                                    <option value="0">-- Chọn danh mục sản phẩm con --</option>
                                </select>
                                <img src="public/icons/chevron-down.svg" alt="" class="select-arrow">
                            </div>
                            <?php echo form_error('product-cat-child') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Giá sản phẩm -->
                        <div class="form-input-wp">
                            <label for="product-price">Giá sản phẩm</label>
                            <input type="number" name="product-price" id="product-price" placeholder="Nhập giá sản phẩm" value="<?php echo set_value('product_price')?>">
                            <?php echo form_error('product-price') ?>
                        </div>
                        <!-- Số lượng sản phẩm -->
                        <div class="form-input-wp">
                            <label for="product-quantity">Số lượng sản phẩm</label>
                            <input type="number" name="product-quantity" placeholder="Nhập số lượng sản phẩm" value="<?php echo set_value('product_quantity')?>">
                            <?php echo form_error('product-quantity') ?>
                        </div>
                    </div>
                    <!-- Mô tả sản phẩm -->
                    <div class="form-input-wp">
                        <label for="product-desc">Mô tả sản phẩm</label>
                        <textarea name="product-desc" id=""><?php echo set_value('product_desc')?></textarea>
                        <?php echo form_error('product-desc') ?>
                    </div>
                    <!-- Chi tiết sản phẩm -->
                    <div class="form-input-wp">
                        <label for="product-detail">Chi tiết sản phẩm</label>
                        <div id="editor"></div>
                        <input type="hidden" name="product-detail" id="product_detail">
                    </div>
                    <!-- Ảnh sản phẩm -->
                    <div class="form-input-wp">
                        <label for="">Ảnh sản phẩm</label>
                        <div class="form-upload-img" id="form-upload-img">
                            <img src="" alt="" id="form-img">
                            <img src="public/icons/xmark.svg" alt="" class="form-delete-img" id="form-delete-img">
                        </div>
                        <label for="input-img" class="form-upload-label">
                            <input type="file" name="input-img" id="input-img" hidden>
                            <div class="form-upload-wp">
                                <img src="public/icons/upload.svg" alt="">
                            </div>
                            <p>Tải ảnh lên</p>
                        </label>
                        <?php echo form_error('input-img') ?>
                    </div>
                    <input type="submit" value="Thêm danh mục" name="btn-add-product">
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>