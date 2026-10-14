<?php 
    get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <div id="content-header">
                        <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                        <a href="<?php echo base_url("?controller=product&action=addProduct") ?>" title="" id="add-new" class="fl-left button">
                            <img src="public/icons/plus.svg" alt="">
                            Thêm sản phẩm
                        </a>
                    </div>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <form method="POST" class="filter-form">
                            <div class="filter-search">
                                <img src="public/icons/search.svg" alt="" class="filter-icon">
                                <input
                                    type="text"
                                    class="filter-input"
                                    placeholder="Tìm kiếm tên sản phẩm, mã sản phẩm..."
                                >
                            </div>

                            <div class="filter-search-wp">
                                <select class="filter-select">
                                    <option value="">Tất cả danh mục</option>
                                </select>
                                <img src="public/icons/chevron-down.svg" alt="" class="filter-icon">
                            </div>

                            <div class="filter-search-wp">
                                <select class="filter-select">
                                    <option value="">Tất cả trạng thái</option>
                                </select>
                                <img src="public/icons/chevron-down.svg" alt="" class="filter-icon">
                            </div>

                            <button type="submit" class="button filter-button">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="table-responsive wp">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">1</h3></span>
                                    <td><span class="tbody-text">WEB00001</h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="public/images/img-product.png" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Quần Âu nam vải trơn</a>
                                        </div>
                                    </td>
                                    <td><span class="tbody-text">250.000đ</span></td>
                                    <td><span class="tbody-text">Thời trang nam</span></td>
                                    <td><span class="tbody-text">Hoạt động</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>