
<div id="page">
    <div class="content_scene_cat_bg" style="background:url(http://demo.posthemes.com/pos_lavoro/layout2/c/25-category_default/fashion.jpg) right center no-repeat; background-size:cover; min-height:270px;">
        <div class="cat_heading">
            <span class="cat-name-heading"></span>
        </div>
    </div>
    <div class="columns-container">
        <div id="columns" class="container">
            <div id="slider_row" class="row">
            </div>
            <div class="row">
                <div id="left_column" class="column col-xs-12 col-sm-3">
<!--                    viết lọc sản phẩm tại đây-->
                    <div class="form-group">
                    <h3>Filter <i class="fas fa-funnel-dollar"></i></h3>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <?php if (isset($category_all)): ?>
                            <h4 style="color: #0a90eb">Lọc theo tên danh mục: </h4>
                            <div class="form-group">
                                <table class="khiem">
                                    <?php foreach ($category_all as $category): ?>
                                        <tr>
                                            <td><input type="checkbox" name="category[]" value="<?php echo $category['id'] ?>"></td>
                                            <td><p><?php echo $category['name'] ?></p></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <h4 style="color: #0a90eb">Lọc theo giá sản phẩm: </h4>
                            <style>
                                .khiem td {
                                    /* margin: 0; */
                                    padding: 8px 3px !important;
                                    /* font-size: 30px; */
                                }
                                .khiem p{
                                    margin: 0;
                                    font-size: 15px;
                                }
                            </style>
                            <div class="form-group" >
                                <table class="khiem">
                                    <tr>
                                        <td><input type="checkbox" name="price[]" value="0"></td>
                                        <td><p>Dưới 1tr đồng</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="price[]" value="1"></td>
                                        <td><p>Từ 1tr - 2tr đồng</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="price[]" value="2"></td>
                                        <td><p>Từ 2tr - 3tr đồng</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="price[]" value="3"></td>
                                        <td><p>Từ 3tr - 4tr đồng</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="price[]" value="4"></td>
                                        <td><p>Trên 4 triệu đồng</p></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Tìm Kiếm" name="submit" class="btn btn-primary">
                            <input type="reset" value="Xóa Filter" class="btn btn-danger">
                        </div>
                    </form>
                </div>
                <div id="center_column" class="center_column col-xs-12 col-sm-9">
                    <!-- Products list -->
                    <div class="product_block_container">
<!--                        Viết sản phẩm tại đây-->
                        <ul class="product_list product_content grid row">
                            <?php foreach ($products as $product):
                               // $product_link = "index.php?controller=product&action=detail&id={$product['id']}";
                               // $product_add_cart = "index.php?controller=carts&action=add&id={$product['id']}";
                                ?>
                                <li class="ajax_block_product item_out col-xs-12 col-sm-6 col-md-3">
                                    <div class="product-container item" itemscope itemtype="">
                                        <div class="left-block">
                                            <a class="" href="<?php echo "index.php?controller=product&action=detail&id={$product['id']}"?>" title="Printed Chiffon Dress">
                                                <img class="replace-2x img-responsive" src="../backend/Assets/container_file/<?php echo $product['avatar']?>" alt="Printed Chiffon Dress" title="Printed Chiffon Dress" itemprop="image" />
                                            </a>
                                            <div class="label_box">
                                                <a class="label-new" href="">
                                                    <span>New</span>
                                                </a>
                                            </div>
                                            <a class="quick-view visible-lg animated" href="#" rel="">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                            <div class="price-box animated">
                                                <div class="price-box-in"><span class="price"><?php echo number_format($product['price'],'0','.','.'). " vnđ"?></span></div>
                                            </div>
                                            <div class="btn_content animated">
                                                <div class="btn_content_in">
                                                    <a class="addToWishlist wishlistProd_10" href="" data-rel="10" onclick="WishlistCart('wishlist_block_list', 'add', '10', false, 1); return false;">
                                                        <i class="fas fa-heartbeat"></i>
                                                    </a>
<!--                                                    <a class="ajax_add_to_cart_button btn btn-default exclusive" href="--><?php //echo "index.php?controller=carts&action=add&id={$product['id']}" ?><!--" title="Add to cart" >-->
<!--                                                        <i class="fas fa-cart-arrow-down"></i>-->
<!--                                                    </a>-->
                                                    <span class="add-to-cart" data-id="<?php echo $product['id']?>">
                                                <a class="exclusive btn btn-default" href="<?php echo "index.php?controller=carts&action=add&id={$product['id']}" ?>" rel="nofollow" title="Add to cart">
                                                    <i class="fas fa-cart-arrow-down"></i>
                                                </a>
                                            </span>
                                                    <a class="add_to_compare" href="" data-id-product="10">
                                                        <i class="fas fa-retweet"></i>
                                                    </a>
                                                    <a class="quick-view hidden-lg" href="" rel="">
                                                        <i class="icon-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 itemprop="name">
                                                <a class="product-name" href="" title="Printed Chiffon Dress" itemprop="url" >
                                                    <?php echo $product['title']?>
                                                </a>
                                            </h5>
<!--                                            <div class="short-desc" itemprop="description">-->
<!--                                                <p>--><?php //echo $product['content'] ?><!--</p>-->
<!--                                            </div>-->
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="form-group">
                        <?php echo $pagination;?>
                    </div>
                </div><!-- #center_column -->
            </div><!-- .row -->
        </div>
    </div>
</div>
