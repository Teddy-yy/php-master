<?php
    get_header();
?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Dashboard</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="dashboard-list">
                            <!-- Dashboard card 1 -->
                            <li class="dashboard-card">
                                <div class="dashboard-card-left">
                                    <p class="dashboard-card-title">Doanh thu</p>
                                    <p class="dashboard-card-value">1000000</p>
                                </div>
                                <div class="dashboard-card-right" style="background: #EEF3FF;">
                                    <img src="public/icons/profit.svg" alt="">
                                </div>
                            </li>
                            <!-- Dashboard card 2 -->
                            <li class="dashboard-card">
                                <div class="dashboard-card-left">
                                    <p class="dashboard-card-title">Đơn hàng</p>
                                    <p class="dashboard-card-value">365</p>
                                </div>
                                <div class="dashboard-card-right" style="background: #F3F0FC;">
                                    <img src="public/icons/order.svg" alt="">
                                </div>
                            </li>
                            <!-- Dashboard card 3 -->
                            <li class="dashboard-card">
                                <div class="dashboard-card-left">
                                    <p class="dashboard-card-title">Sản phẩm</p>
                                    <p class="dashboard-card-value">10</p>
                                </div>
                                <div class="dashboard-card-right" style="background: #F0FAEC;">
                                    <img src="public/icons/product.svg" alt="">
                                </div>
                            </li>
                            <!-- Dashboard card 4 -->
                            <li class="dashboard-card">
                                <div class="dashboard-card-left">
                                    <p class="dashboard-card-title">Khách hàng</p>
                                    <p class="dashboard-card-value">200</p>
                                </div>
                                <div class="dashboard-card-right" style="background: #FFF0F0;">
                                    <img src="public/icons/user.svg" alt="">
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="dashboard-body">
                        <!-- Đơn hàng gần đây -->
                        <div class="recent-order">
                            <div class="recent-order-top">
                                <img src="public/icons/history.svg" alt="">
                                <p class="recent-order-title">Đơn hàng gần đây</p>
                            </div>
                            <table class="dashboard-table">
                                <thead>
                                    <tr>
                                        <td>Mã đơn</td>
                                        <td>Khách hàng</td>
                                        <td>Tổng tiền</td>
                                        <td>Trạng thái</td>
                                        <td>Ngày đặt</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#01</td>
                                        <td>Trần Huyền Linh</td>
                                        <td>1000000</td>
                                        <td>
                                            <span class="status status--pending">Đang xử lí</span>
                                        </td>
                                        <td>14/09/2026</td>
                                    </tr>
                                    <tr>
                                        <td>#01</td>
                                        <td>Trần Huyền Linh</td>
                                        <td>1000000</td>
                                        <td>
                                            <span class="status status--pending">Đang xử lí</span>
                                        </td>
                                        <td>14/09/2026</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Sản phẩm bán chạy -->
                        <div class="top-sell">
                            <div class="top-sell-top">
                                <img src="public/icons/box.svg" alt="">
                                <p class="top-sell-title">Sản phẩm bán chạy</p>
                            </div>
                            <table class="dashboard-table">
                                <thead>
                                    <tr>
                                        <td>Sản phẩm</td>
                                        <td>Đã bán</td>
                                        <td>Doanh thu</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="top-sell-wp">
                                                <img src="public/upload/products/mouse.webp" alt="" class="top-sell-img">
                                                <span class="top-sell-name">Chuột máy tính</span>
                                            </div>
                                        </td>
                                        <td>1000000</td>
                                        <td>1000000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="top-sell-wp">
                                                <img src="public/upload/products/mouse.webp" alt="" class="top-sell-img">
                                                <span class="top-sell-name">Chuột máy tính</span>
                                            </div>
                                        </td>
                                        <td>1000000</td>
                                        <td>1000000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>

<?php get_footer(); ?>