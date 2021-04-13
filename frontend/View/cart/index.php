<?php if (isset($_SESSION['cart'])):?>
<div class="columns-container" xmlns="http://www.w3.org/1999/html">
    <div id="columns" class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb_container">
            <div class="container">
                <div id="themejs-breadcrumb" class="breadcrumb clearfix titleFont">
                    <a class="home" href="index.php?gio-hang-cua-ban.html" title="Quay lại Trang chủ"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang Chủ </font></font></a>
                    <i class="fas fa-arrow-right"></i>
                    <span class="navigation_page"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Giỏ hàng của bạn</font></font></span>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">

                <h1 id="cart_title" class="page-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tóm tắt giỏ hàng
                        </font></font><span class="heading-counter"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giỏ hàng của bạn có:
			 </font></font><span id="summary_products_quantity"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo count($_SESSION['cart']) ?> sản phẩm</font></font></span>
		</span>
                </h1>
                <!-- Steps -->
                <ul class="step clearfix" id="order_step"> <li class="step_current  first"> <span><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">01.</font></font></em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Tóm tắt</font></font></span> </li> <li class="step_todo second"> <span><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">02.</font></font></em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Đăng nhập</font></font></span> </li> <li class="step_todo third"> <span><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">03.</font></font></em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Địa chỉ</font></font></span> </li> <li class="step_todo four"> <span><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">04.</font></font></em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Vận chuyển</font></font></span> </li> <li id="step_end" class="step_todo last"> <span><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">05.</font></font></em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Thanh toán</font></font></span> </li> </ul>
                 <!-- /Steps -->
                <p id="emptyCartWarning" class="alert alert-warning unvisible"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giỏ hàng của bạn đang trống.</font></font></p>
                <div class="cart_last_product">
                    <div class="cart_last_product_header">
                        <div class="left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sản phẩm cuối cùng được thêm vào</font></font></div>
                    </div>
                    <a class="cart_last_product_img" href="http://demo.posthemes.com/pos_lavoro/layout2/en/men/1-faded-short-sleeves-tshirt.html">
                        <img src="http://demo.posthemes.com/pos_lavoro/layout2/57-small_default/faded-short-sleeves-tshirt.jpg" alt="Áo thun tay ngắn đã phai màu">
                    </a>
                    <div class="cart_last_product_content">
                        <p class="product-name">
                            <a href="http://demo.posthemes.com/pos_lavoro/layout2/en/men/1-faded-short-sleeves-tshirt.html#/size-s/color-orange"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Áo thun tay ngắn đã phai màu
                                    </font></font></a>
                        </p>
                        <small>
                            <a href="http://demo.posthemes.com/pos_lavoro/layout2/en/men/1-faded-short-sleeves-tshirt.html#/size-s/color-orange"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Kích thước: S, Màu: Cam
                                    </font></font></a>
                        </small>
                    </div>
                </div>
                <div id="order-detail-content" class="table_block table-responsive">
                    <table id="cart_summary" class="table table-bordered stock-management-on">
                        <thead>
                        <tr>
                            <th class="cart_product first_item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sản phẩm</font></font></th>
                            <th class="cart_description item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sự miêu tả</font></font></th>
                            <th class="cart_avail item text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">khả dụng</font></font></th>
                            <th class="cart_unit item text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đơn giá</font></font></th>
                            <th class="cart_quantity item text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qty</font></font></th>
                            <th class="cart_delete last_item">&nbsp;</th>
                            <th class="cart_total item text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Toàn bộ</font></font></th>
                        </tr>
                        </thead>
                            <tfoot>
                            <tr style="display: none;">
                                <td colspan="3" class="text-right">
                                    Total gift-wrapping cost											</td>
                                <td colspan="2" class="price-discount price" id="total_wrapping">
                                    $0.00
                                </td>
                            </tr>
                            <tr class="cart_total_voucher unvisible">
                                <td colspan="3" class="text-right">
                                    Total vouchers
                                </td>
                                <td colspan="2" class="price-discount price" id="total_discount">
                                    $0.00
                                </td>
                            </tr>
                            </tfoot>
                        <tbody>
                        <?php $total_price = 0 ?>
                        <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                            <tr id="product_1_1_0_0" class="cart_item last_item first_item address_0 odd">
                            <td class="cart_product">
                                <a href=""><img src="../backend/Assets/container_file/<?php echo $product['avatar'] ?>" alt="Áo thun tay ngắn đã phai màu" width="98" height="119"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $product['title']?></font></font></a></p>
                                <small class="cart_ref"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $product['content'] ?></font></font></small>		<small><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $product['summary']?></font></font></a></small>	</td>
                            <td class="cart_avail"><span class="label label-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trong kho</font></font></span></td>
                            <td class="cart_unit" data-title="Unit price">
                                <ul class="price text-right" id="product_price_1_1_0">
                                    <li class="price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format($product['price'],'0','.','.'). " vnđ"?></font></font></li>
                                </ul>
                            </td>
                                <form action="" method="post">
                            <td class="cart_quantity text-center" data-title="Quantity">
                                <input type="number" class="form-control" min="0" name="<?php echo $product_id?>" value="<?php echo $product['quantity']?>">
                            </td>
                            <td class="cart_delete text-center" data-title="Delete">
                                <div>
                                    <a rel="nofollow" title="Xóa bỏ" class="cart_quantity_delete" id="1_1_0_0" href="index.php?controller=carts&action=delete&id=<?php echo $product_id ?>"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                            <td class="cart_total" data-title="Total">
		<span class="price" id="total_product_price_1_1_0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
												<?php echo number_format($product['price']*$product['quantity'],'0','.','.'). " vnđ"?>							</font></font></span>
                            </td>
                            <?php $total_price += $product['price']*$product['quantity'] ?>
                        </tr>
                        <?php endforeach; ?>
                        <tfoot>
                        <tr class="cart_total_price">
                            <td rowspan="4" colspan="3" id="cart_voucher" class="cart_voucher">
                            </td>
                            <td colspan="3" class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tổng số sản phẩm</font></font></td>
                            <td colspan="2" class="price" id="total_product"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format($total_price,'0','.','.'). " vnđ"?></font></font></td>
                        </tr>
                        <tr class="cart_total_delivery">
                            <td colspan="3" class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tổng số vận chuyển</font></font></td>
                            <td colspan="2" class="price" id="total_shipping"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(30000,'0','.','.'). " vnđ"?></font></font></td>
                        </tr>
                        <tr class="cart_total_price">
                            <td colspan="3" class="total_price_container text-right">
                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Toàn bộ</font></font></span>
                                <div class="hookDisplayProductPriceBlock-price">

                                </div>
                            </td>
                            <td colspan="2" class="price" id="total_price_container">
                                <span id="total_price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format($total_price + 30000,'0','.','.'). " vnđ"?></font></font></span>
                            </td>
                        </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div> <!-- end order-detail-content -->
                <div id="HOOK_SHOPPING_CART"></div>
                <p class="cart_navigation clearfix">
                    <?PHP
                    $link = "";
                        if(!isset($_SESSION['users'])){
                            $_SESSION['error'] = "Bạn cần đăng nhập để tiếp tục mua sắm !";
                            $link = "dang-nhap.html";
                        }else{
                            $link = "dia-chi.html";
                        }
                    ?>
                    <a href="<?php echo $link; ?>" class="button btn btn-default standard-checkout button-medium" title="Tiến hành kiểm tra" style="">
                        <span>Tiếp tục</span>
                    </a>
                    <input style="position: absolute;right: 150px;height: 48px;font-size: 15px;font-weight: bold;border-radius: 6px;" type="submit" value="Cập nhật lại giá" name="submit" class="btn btn-primary">
                </form>
                    <a href="danh-sach-san-pham.html" class="button-exclusive btn btn-default" title="Tiếp tục mua sắm">
                        <i class="fas fa-arrow-circle-left"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tiếp tục mua sắm
                            </font></font></a>
                </p>
                <div class="clear"></div>
                <div class="cart_navigation_extra">
                    <div id="HOOK_SHOPPING_CART_EXTRA"></div>
                </div>

            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div>
<?php else: ?>
<div class="form-group">
    <h2 style="color: red">Bạn chưa có sản phẩm nào trong giỏ hàng !</h2>
    <h3><a style="color: #0a90eb; text-decoration: underline" href="trang-chu.html">Quay lại trang chủ</a> để tiếp tục mua sắm !</h3>
</div>
<?php endif; ?>