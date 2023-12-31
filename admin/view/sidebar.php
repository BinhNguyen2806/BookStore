<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100vh">
    <a href="/" class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../static/images/logo/logo1.png" alt="" width="50%">
        <!-- <span class="fs-4">BookStore</span> -->
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto fs14">
        <li class="nav-item">
            <a href="index.php?act=user" class="nav-link text-white <?php if($header=="user") echo' active';?>" aria-current="page" title="Thông tin thành viên">
                <i class="fa-light fa-user w16"></i>
                Thành viên
            </a>
        </li>
        <li>
            <a href="index.php?act=category" class="nav-link text-white<?php if($header=="category") echo' active';?>" title="Các phân loại sản phẩm">
                <i class="fa-light fa-list w16"></i>
                Danh mục
            </a>
        </li>
        <li>
            <a href="index.php?act=product" class="nav-link text-white <?php if($header=="product") echo' active';?>" title="Danh mục sản phẩm">
                <i class="fa-light fa-grid-2 w16"></i>
                Sản phẩm
            </a>
        </li>
        <li>
            <a class="nav-link text-secondary cursor-disabled" title="Bình luận của khách về sản phẩm">
                <i class="fa-light fa-gavel w16"></i>
                Đánh giá sản phẩm
            </a>
        </li>
        <li>
            <a class="nav-link text-secondary cursor-disabled" title="Danh sách đơn hàng và trạng thái">
                <i class="fa-light fa-box w16"></i>
                Đơn hàng
            </a>
        </li>
        <li>
            <a class="nav-link text-secondary cursor-disabled" title="Phản hồi thắc mắc của khách hàng">
                <i class="fa-light fa-comment w16"></i>
                Phản hồi khách hàng
            </a>
        </li>
        <li>
            <a class="nav-link text-secondary cursor-disabled" title="Gửi mail khuyến mãi cho khách hàng">
                <i class="fa-light fa-rectangle-ad w16"></i>
                Giới thiệu khuyến mãi
            </a>
        </li>
        <li>
            <a class="nav-link text-secondary cursor-disabled" title="Thay đổi banner tại trang chủ">
                <i class="fa-light fa-sliders w16"></i>
                Thay đổi banner
            </a>
        </li>
        <li>
            <a class="nav-link text-secondary cursor-disabled" title="Thay đổi thông tin liên lạc">
                <i class="fa-light fa-address-card"></i>
                Thay đổi thông tin
            </a>
        </li>
    </ul>
    <hr>
    <p class="text-center"><?php if(isset($_SESSION['auth_admin']))echo $_SESSION['auth_admin']['name'];?></p>
    <a class="btn btn-primary fs14" href="index.php?act=logout">Đăng xuất</a>
</div>