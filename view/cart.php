<!-- Cart items details -->
<div class="cart-wrapper bg-gray h-100vh">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="cart-title mt20">Giỏ hàng</h2>
                <div class="row txt-bold text-center bg-white mlr0 pt10 pb10 b-radius w-100 mb20">
                    <div class="col-1">STT</div>
                    <div class="col-4">Tên Sản Phẩm</div>
                    <div class="col-2">Đơn giá</div>
                    <div class="col-2">Số lượng</div>
                    <div class="col-2">Thành tiền</div>
                    <div class="col-1">Xoá</div>
                </div>

                <?php $total=show_to_cart();?>

            </div>

            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <h2 class="mt20 mb20">Thông tin thanh toán</h2>
                        <div class="bg-white b-radius p30">
                            <div class="price d-flex justify-content-between mb10">
                                <div class="price_heading">Tạm tính</div>
                                <div class="price-value">
                                    <?php echo number_format($total); ?>đ
                                </div>
                            </div>
                            <div class="discount d-flex justify-content-between mb10">
                                <div class="discount-heading">Giảm giá</div>
                                <div class="discount-value">0đ</div>
                            </div>
                            <div class="ship-fee d-flex justify-content-between mb10">
                                <div class="ship-fee-heading">Phí giao hàng</div>
                                <div class="ship-fee-value">0đ</div>
                            </div>
                            <div class="total d-flex justify-content-between mt20 txt-semiBold fs20">
                                <div class="total-heading">Tổng thanh toán</div>
                                <div class="total-value">
                                    <?php echo number_format($total); ?>đ
                                </div>
                            </div>
                            <form method="GET" class="row d-flex justify-content-between mt10">
                                <a type="submit" name="delete_all" href="index.php?act=cart&delete_all" class="col-4 btn btn-outline-danger mt10 b-radius">Xoá tất cả</a>
                                <a href="#" class="col-7 order b-radius mt10">Đặt hàng</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.php";
?>


</body>

</html>