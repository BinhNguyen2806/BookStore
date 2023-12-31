<?php
session_start();
if(!isset($_SESSION['view']))$_SESSION['view']=0;
else $_SESSION['view']+=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/font/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./static/css/normalize.css">
    <link rel="stylesheet" href="./static/css/cart.css">
    <link rel="stylesheet" href="./static/css/common.css">
    <link rel="stylesheet" href="./static/css/Style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <header class="p-3 bg-blue text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none icon-mobile-view">
                    <img src="./static/images/logo/logo1.png" width="80" height="35" alt="logo">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-3 text-white active">Trang chủ</a></li>
                    <li>
                        <a class="nav-link px-3 text-white dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu fs14">
                            <li><a class="dropdown-item" href="index.php?act=product">Tất cả</a></li>
                            <li><a class="dropdown-item" href="index.php?act=product&category=1">Sách văn học</a></li>
                            <li><a class="dropdown-item" href="index.php?act=product&category=2">Truyện kiếm hiệp</a></li>
                            <li><a class="dropdown-item" href="index.php?act=product&category=3">Truyện tranh Manga - Comic</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?act=about" class="nav-link px-3 text-white">Về chúng tôi</a></li>
                    <li><a href="index.php?act=contact" class="nav-link px-3 text-white">Liên hệ</a></li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 search-mobile" action="index.php" method="GET">
                    <input type="hidden" name="act" value="search" />
                    <input type="text" name="search" class="form-control form-control-dark fs14" placeholder="Tìm kiếm..." aria-label="Search" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
                </form>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 cart-mobile">
                    <a href="index.php?act=cart" class="btn btn-outline-light txt-medium d-flex align-items-center pb05 pt05 fs14">
                        <div class="cart-icon me-2">
                            <i class="fa-regular fa-cart-shopping fs18"></i>
                        </div>
                        Giỏ hàng
                    </a>
                </form>
                <?php
                if (isset($_SESSION['auth_user'])) 
				{	
                    echo '<div class="text-end avatar-mobile">';
                    if($_SESSION['auth_user']['image'])
               			 echo '
                            <div class="text-white me-2 text-decoration-none fs14 header-avatar"  data-bs-toggle="dropdown" >
                                <img src="./static/images/user/'.$_SESSION['auth_user']['image'].'" alt="ảnh đại diện">
                            </div>
                    ';
				 	else 
						echo '<div class="text-white me-2 text-decoration-none fs14 header-avatar"  data-bs-toggle="dropdown" >
                                <img src="./static/images/user/blank-profile-picture.png" alt="ảnh đại diện">
                            </div>';
                    echo '
                        <ul class="dropdown-menu fs14 mt10">
                            <li><a class="dropdown-item" href="index.php?act=account">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="index.php?act=logout">Đăng xuất</a></li>
                        </ul>
                        </div>';}
               	else 
					echo'<div class="text-end">
					<a href="index.php?act=login" type="button" class="btn btn-outline-light me-2 fs14  txt-medium">Đăng nhập</a>
					</div>';
                ?>      
            </div>
        </div>
    </header>