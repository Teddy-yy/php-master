<?php 
    get_header();
    $list_cat = $list_cat ?? [];
    $list_cat_child = $list_cat_child ?? [];
    $cat_id = isset($_GET['cat_id']) ? (int)$_GET['cat_id'] : 1;
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <div id="content-header">
                        <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                        <a href="?page=add_cat" title="" id="add-new" class="fl-left button">
                            <img src="public/icons/plus.svg" alt="">
                            Thêm mới
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
                        <?php foreach($list_cat as $item){ ?>
                        <li class="category-sidebar-item wp <?php if($item['cat_id'] == $cat_id) echo "active" ?>">
                            <a href="?controller=product&action=listCatProduct&cat_id=<?php echo $item['cat_id'] ?>" class="category-item-link">
                                <div class="category-item-info">
                                    <img src="<?php echo $item['image'] ?>" alt="">
                                    <span class="category-item-name"><?php echo $item['name'] ?></span>
                                </div>
                            </a>
                            <div class="category-item-action">
                                <img src="public/icons/three-dots.svg" alt="">
                                <div class="category-item-dropdown wp" id="category-item-dropdown">
                                    <a href="" class="category-item-dropdown-link">Xem thêm</a>
                                    <a href="" class="category-item-dropdown-link">Xoá</a>
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
                            <p class="category-title">Điện thọai</p>
                        </div>
                        <a href="" class="button category-content-btn">
                            <img src="public/icons/plus-circle.svg" alt="">
                            Thêm danh mục con
                        </a>
                    </div>
                    <table class="category-content-list">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Mã Danh mục</td>
                                <td>Danh mục</td>
                                <td>Số lượng</td>
                                <td></td>
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
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['quantity'] ?></td>
                                    <td>
                                        <a href=""></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>