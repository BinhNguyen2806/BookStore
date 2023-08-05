<?php
include "../model/product.php";
include "../model/add_cart.php";
$header = 'product';
include "header.php";
session_start();

if(!isset($_SESSION['cart']))$_SESSION['cart']=[];

if(isset($_POST['buy_now']))
{   
    add_cart();
    
}


if(isset($_GET['delete_all'])) unset($_SESSION['cart']);

if(isset($_GET['delete']))
{
    array_splice($_SESSION['cart'],$_GET['delete'],1);

}

?>

<!-- Cart items details -->
        <div class="cart-wrapper bg-gray h-100vh">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2 class="cart-title mt20">Giỏ hàng</h2>
                        <div class="row txt-bold text-center bg-white mlr0 pt10 pb10 b-radius w-100 mb20">
                            <div class="col-1">STT</div>
                            <div class="col-3">Tên Sản Phẩm</div>
                            <div class="col-2">Hình ảnh</div>
                            <div class="col-2">Đơn giá</div>
                            <div class="col-1">Số lượng</div>
                            <div class="col-2">Thành tiền</div>
                            <div class="col-1">Xoá</div>
                        </div>
                      
                     
                        <?php
                        $total=show_to_cart();
                        ?>
                        <!-- <div class="row text-center bg-white mlr0 pt10 pb10 mb5 b-radius w-100">
                        <div class="col-1">'.($i+1).'</div>
                        <div class="col-3 text-start"></div>
                        <div class="col-2"></div>
                        <div class="col-1"></div>
                        <div class="col-2"></div>
                        <div class="col-2"><img style="width:70%;" src="../static/images/sach-truyen-kiem-hiep/biatrc_L.gif" alt="..."></div>
                        <div class="col-1">
                        <form method="GET">
                            <button type="submit" name="delete" value="'.$i.'">Xoá</button>
                        </form>
                        </div>
                        </div>' -->


                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col">
                                <h2 class="mt20">Thông tin thanh toán</h2>
                                <div class="bg-white b-radius p30">
                                    <div class="price d-flex justify-content-between mb10">
                                        <div class="price_heading">Tạm tính</div>
                                       <div class="price-value"><?php echo number_format($total); ?>đ</div>
                                    </div>
                                    <div class="discount d-flex justify-content-between mb10">
                                        <div class="discount-heading">Giảm giá</div>
                                        <div class="discount-value">0đ</div>
                                    </div>
                                    <div class="ship-fee d-flex justify-content-between mb10">
                                        <div class="ship-fee-heading">Phí giao hàng</div>
                                        <div class="ship-fee-value">0đ</div>
                                    </div>
                                    <div class="total d-flex justify-content-between m-t-10 txt-semiBold fs20">
                                        <div class="total-heading">Tổng thanh toán</div>
                                        <div class="total-value"><?php echo number_format($total); ?>đ</div>
                                        <form method="GET">
                                        <button type="submit" name="delete_all">Xoá tất cả</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body> 
</html>
