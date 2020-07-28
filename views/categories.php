<div class="col-lg-3 float-md-right">
    <div class="categories_sidebar">
        <aside class="l_widgest l_p_categories_widget">
            <div class="l_w_title">
                <h3>Categories</h3>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="jewellery.php">Necklaces
                        <i class="icon_plus" aria-hidden="true"></i>
                        <i class="icon_minus-06" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cosmetics.php">Earrings
                        <i class="icon_plus" aria-hidden="true"></i>
                        <i class="icon_minus-06" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cosmetics.php">Make up
                        <i class="icon_plus" aria-hidden="true"></i>
                        <i class="icon_minus-06" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="cosmetics.php">Creams
                        <i class="icon_plus" aria-hidden="true"></i>
                        <i class="icon_minus-06" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="jewellery.php">Jewellery
                        <i class="icon_plus" aria-hidden="true"></i>
                        <i class="icon_minus-06" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </aside>

        <?php
        $brands = $pagination->getBrands();


        ?>

        <aside class="l_widgest l_menufacture_widget">
            <div class="l_w_title">
                <h3>Our Brands</h3>
            </div>
            <?php array_map(function ($item) use ($brands) { ?>
                <ul>
                    <li><?php echo $item['brand_title'] ?> </li>
                </ul>

            <?php }, $brands);
            ?>
        </aside>
    </div>
</div>
</div>
</div>
</div>
</section>