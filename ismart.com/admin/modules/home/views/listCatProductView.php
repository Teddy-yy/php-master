<?php 
    get_header();
    $list_cat_parent = $list_cat_parent ?? [];    
    $list_cat_child = $list_cat_child ?? [];
    $cat_id = isset($_GET['cat_id']) ? (int)$_GET['cat_id'] : 1;
    // show_array($list_cat_parent[$cat_id]);
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <div id="content-header">
                        <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                        <a href="<?php echo base_url("?controller=product&action=addCat") ?>" title="" id="add-new" class="fl-left button">
                            <img src="public/icons/plus.svg" alt="">
                            Thêm danh mục
                        </a>
                    </div>
                </div>
            </div>
            <div class="category-container">
                <div class="category-sidebar wp">
                    <div class="category-header">
                        <p class="category-title">DANH MỤC</p>
                    </div>
                    <ul class="category-sidebar-list">
                        <?php foreach($list_cat_parent as $item){ ?>
                        <li class="item category-sidebar-item wp <?php if($item['cat_id'] == $cat_id) echo "active" ?>">
                            <a href="?controller=product&action=listCat&cat_id=<?php echo $item['cat_id'] ?>" class="category-item-link">
                                <div class="category-item-info">
                                    <img src="<?php echo $item['image'] ?>" alt="" class="category-info-img">
                                    <span class="category-item-name"><?php echo $item['name'] ?></span>
                                </div>
                            </a>
                            <div class="action category-sidebar-action">
                                <img src="public/icons/three-dots.svg" alt="" class="action-icon">
                                <div class="action-dropdown wp">
                                    <a href="" class="action-link">Xem thêm</a>
                                    <a href="" class="action-link">Xoá</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="category-content wp">
                    <div class="category-header">
                        <div class="category-header-left">
                            <img src="public/upload/category/phone.svg" alt="">
                            <p class="category-title"><?php echo $list_cat_parent[$cat_id]['name'] ?></p>
                        </div>
                    </div>
                    <?php if(!empty($list_cat_child)) { ?>
                        <table class="category-content-list">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã Danh mục</td>
                                    <td>Danh mục</td>
                                    <td>Số lượng</td>
                                    <td>Hành động</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $k = 0;
                                    foreach($list_cat_child as $item){ 
                                        $k++;
                                ?>
                                    <tr>
                                        <td><?php echo $k ?></td>
                                        <td><?php echo $item['code'] ?></td>
                                        <td>
                                            <div class="category-info-wp">
                                                <img src="<?php echo $item['image'] ?>" alt="" class="category-img">
                                                <span><?php echo $item['name'] ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo $item['quantity'] ?></td>
                                        <td>
                                            <div class="action">
                                                <img src="public/icons/three-dots-vertical.svg" alt="" class="action-icon">
                                                <div class="action-dropdown wp">
                                                    <a href="" class="action-link">Xem thêm</a>
                                                    <a href="" class="action-link">Xoá</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p><i>Chưa có danh mục con</i></p>
                    <?php } ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>