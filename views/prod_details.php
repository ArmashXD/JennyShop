<?php
$id = $_GET['item_id'];

$single_product = $products->getSingleProduct($id);

array_map(function ($item) use ($single_product) {
?>
    <section class="product_details_area">
        <div class="container" name="productLink">
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <!-- <div class="product_details_slider">
                         -->
                        <div>
                            <!-- <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                            <ul> -->
                            <!-- SLIDE  -->
                            <li>
                                <div class="container">
                                    <!-- MAIN IMAGE -->
                                    <img id="prod_details_img" src="img/product/<?php echo $item['product_image'] ?? "Unknown" ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                </div>
                                <!-- LAYERS -->
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product_details_text">
                        <h3><?php echo $item['product_title'] ?? "Unknown" ?></h3>
                        <ul class="p_rating">
                            <li><a href="“javascript:void(0)"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="add_review">
                            <a href="#">5 Reviews</a>
                            <a href="#">Add your review</a>
                        </div>
                        <h6>Available In <span>Stock</span></h6>
                        <h4><?php echo $item['product_price'] ?? 0 ?> <del>Rs</del></h4>
                        <p><?php echo $item['product_desc'] ?? "Unknown" ?></p>
                        <div class="p_color">
                            <h4 class="p_d_title">color <span>*</span></h4>
                            <ul class="color_list">
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                        <div class="p_color">
                            <h4 class="p_d_title">size <span>*</span></h4>
                            <select class="selectpicker">
                                <option>Select your size</option>
                                <option>Select your size M</option>
                                <option>Select your size XL</option>
                            </select>
                        </div>
                        <div class="quantity">
                            <div class="custom">
                                <!-- <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button> -->
                                <ul>
                                    <input type="text" name="quantity" id="quantity<?php echo $item['product_id'] ?>" maxlength=" 12" value="01" title="Quantity:" class="input-text qty">
                                    <input type="hidden" name="hidden_name" id="name<?php echo $item['product_id'] ?>" value="<?php echo $item['product_title'] ?>" />
                                    <input type="hidden" name="hidden_price" id="price<?php echo $item['product_id'] ?>" value="<?php echo $item['product_price'] ?>" />

                                </ul> <!-- <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button> -->
                            </div>
                            <input type="button" name="add_to_cart" id="<?php echo $item['product_id'] ?>" class="add_cart_btn add_to_cart" value="Add to Cart" />
                        </div>
                        <div class="shareing_icon">
                            <h5>share :</h5>
                            <ul>
                                <li><a href="#"><i class="social_facebook"></i></a></li>
                                <li><a href="#"><i class="social_twitter"></i></a></li>
                                <li><a href="#"><i class="social_pinterest"></i></a></li>
                                <li><a href="#"><i class="social_instagram"></i></a></li>
                                <li><a href="#"><i class="social_youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }, $single_product);
?>
<!--================End Product Details Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <nav class="tab_menu">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Description</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (1)</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tags</a>
                <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">additional information</a>
                <a class="nav-item nav-link" id="nav-gur-tab" data-toggle="tab" href="#nav-gur" role="tab" aria-controls="nav-gur" aria-selected="false">gurantees</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <h4>Rocky Ahmed</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                </ul>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
            </div>
            <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
            </div>
            <div class="tab-pane fade" id="nav-gur" role="tabpanel" aria-labelledby="nav-gur-tab">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
            </div>
        </div>
    </div>
</section>
<!--================End Product Details Area =================-->

<!--================End Related Product Area =================-->
<section class="related_product_area">
    <div class="container">
        <div class="related_product_inner">
            <h2 class="single_c_title">Products</h2>
            <section class="our_latest_product">
                <div class="container">
                    <div class="l_product_slider owl-carousel">

                        <?php
                        $product = $products->getData();
                        $product_shuffle = shuffle($product);

                        //calling data
                        array_map(function ($item) use ($product_shuffle) {

                        ?>
                            <div class="item">
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <div class="container">
                                            <a name="productLink" href="<?php printf('%s?item_id=%s', '_prod_details.php', $item['product_id']) ?>">

                                                <img src="img/product/<?php echo $item['product_image'] ?? 'Unknown' ?>" alt=""></a>
                                        </div>
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
                        <?php   }, $product); ?>
            </section>
        </div>
    </div>
</section>