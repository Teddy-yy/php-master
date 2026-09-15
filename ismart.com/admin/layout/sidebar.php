<div id="sidebar" class="fl-left">
    <ul id="sidebar-menu">
        <li class="nav-item">
            <a href="<?php echo base_url() ?>" title="" class="nav-link">
                <span class="icon">
                    <img src="public/icons/dashboard.svg" alt="">
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-map icon"></span>
                <span class="title">Trang</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=home&action=addPage") ?>" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=home&action=listPage") ?>" title="" class="nav-link">Danh sách các trang</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-pencil-square-o icon"></span>
                <span class="title">Bài viết</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=posts&action=addPost") ?>" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=posts&action=listPost") ?>" title="" class="nav-link">Danh sách bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=posts&action=listCatPost") ?>" title="" class="nav-link">Danh mục bài viết</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-product-hunt icon"></span>
                <span class="title">Sản phẩm</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=products&action=addProduct") ?>" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=products&action=listProduct") ?>" title="" class="nav-link">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=products&action=listCatProduct") ?>" title="" class="nav-link">Danh mục sản phẩm</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-database icon"></span>
                <span class="title">Bán hàng</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=sales&action=listOrder") ?>" title="" class="nav-link">Danh sách đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=sales&action=listCustomer") ?>" title="" class="nav-link">Danh sách khách hàng</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" title="" class="nav-link nav-toggle">
                <span class="fa fa-cubes icon"></span>
                <span class="title">Khối giao diện</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=widget&action=addWidget") ?>" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=widget&action=listWidget") ?>" title="" class="nav-link">Danh sách khối</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=widget&action=menu") ?>" title="" class="nav-link">Menu</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" title="" class="nav-link nav-toggle">
                <i class="fa fa-sliders" aria-hidden="true"></i>
                <span class="title">Slider</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=sliders&action=addSlider") ?>" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=sliders&action=listSlider") ?>" title="" class="nav-link">Danh sách slider</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" title="" class="nav-link nav-toggle">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <span class="title">Media</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo base_url("?mod=media&action=listMedia") ?>" title="" class="nav-link">Danh sách media</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
