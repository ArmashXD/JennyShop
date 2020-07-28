<section class="categories_product_main p_80">

    <div class="container">
        <div class="categories_main_inner">
            <div class="row row_disable">
                <div class="col-lg-9 float-md-right">
                    <div class="showing_fillter">
                        <div class="row m0">
                            <div class="first_fillter">
                                <h4>Showing 1 to 12 of 30 total</h4>
                            </div>
                        </div>
                    </div>
                    <div class="categories_product_area">

                        <div class="row">
                            <?php
                            $product = $pagination->getDataJewellery();
                            $pages = $pagination->get_pagination_number();

                            //calling data 
                            array_map(function ($item) use ($product) { ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <a href="<?php printf('%s?item_id=%s', '_prod_details.php', $item['product_id']) ?>" name="productLink">

                                                <img src="img/product/<?php echo $item['product_image'] ?? 'Unknown' ?>" alt="">
                                                <!-- <h5 class="new">New</h5> -->
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <input type="hidden" name="quantity" id="quantity<?php echo $item['product_id'] ?>" class="form-control" value="1" />
                                                <input type="hidden" name="hidden_name" id="name<?php echo $item['product_id'] ?>" value="<?php echo $item['product_title'] ?>" />
                                                <input type="hidden" name="hidden_price" id="price<?php echo $item['product_id'] ?>" value="<?php echo $item['product_price'] ?>" />
                                                <li><input type="button" name="add_to_cart" id="<?php echo $item['product_id'] ?>" style="margin-top:5px;" class="add_cart_btn add_to_cart" value="Add to Cart" /></li>
                                            </ul>
                                            <h4><?php echo $item['product_title'] ?? 'Unknown' ?></h4>
                                            <h5><?php echo $item['product_price'] ?? 'Unknown' ?> <del>Rs</del></h5>
                                        </div>
                                    </div>
                                </div>

                            <?php  }, $product) ?>
                        </div>
                        <nav aria-label="Page navigation example" class="pagination_area">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                                    <li class="page-item <?php echo $pagination->is_active_class($i) ?>"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>

                                <?php endfor; ?>
                                <li class="page-item next"><a class="page-link" href="products.php?page=<?php echo $pagination->next_page(); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>