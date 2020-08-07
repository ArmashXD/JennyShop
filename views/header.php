<?php
ob_start();
session_start();
require('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Jewellery House</title>

    <!-- Icon css link -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet" />
    <link href="vendors/elegant-icon/style.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet" />
    <link href="vendors/revolution/css/layers.css" rel="stylesheet" />
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet" />

    <!-- Extra plugin css -->
    <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet" />
    <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!--================Top Header Area =================-->
    <div class="header_top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="top_header_left">
                        <select class="selectpicker usd_select">
                            <option>RS</option>
                        </select>
                        <form id="searchForm" action="search_ajax.php" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" onKeyUp="fx(this.value)" autocomplete="off" name="search" id="qu" class="textbox" placeholder="What are you looking for ?" tabindex="1" />
                            </div>
                            <div id="livesearch"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="top_header_middle">
                        <a href="#"><i class="fa fa-phone"></i> Call Us:
                            <span>+360601585</span></a>
                        <a href="#"><i class="fa fa-envelope"></i> Email:
                            <span>jennysshope@gmail.com</span></a>
                        <img src="img/logo.png" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="top_right_header">
                        <ul class="header_social">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </li>
                        </ul>
                        <ul class="top_right">
                            <?php if (isset($_SESSION['login'])) {
                                echo "<li class='user'>
                                <a href='user_details.php'><i class='icon-user icons'></i></a>
                            </li>";
                            } ?>
                            <?php if (isset($_SESSION['login'])) : ?>
                                <li class="user">
                                    <a href="track.php"><i class="icon-envelope-open"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['admin_login'])) :
                            ?>
                                <li class="user">
                                    <p class="lead"> Admin Logged In</p>
                                </li>

                            <?php endif; ?>
                            <li class="aside" id="cart-popover">
                                <a><i class="icon-handbag icons"></i><span class="badge"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Top Header Area =================-->

    <!--================Menu Area =================-->
    <header class="shop_header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="products.php">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="jewellery.php">Jewellery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cosmetics.php">Cosmetics</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php isset($_SESSION['login']) || isset($_SESSION['admin_login']) ?  print('#') : print('login.php'); ?>"><?php isset($_SESSION['login']) || isset($_SESSION['admin_login']) ? print('LOGGED IN') : print('LOGIN'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <?php
                        if (isset($_SESSION['login']) || isset($_SESSION['admin_login']))
                            echo " <li class='nav-item'>
                            <a class='nav-link' href='views/logout.php'>Logout</a>
                        </li>";
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Cart -->
    <div id="popover_content_wrapper" style="display: none">
        <span id="cart_details"></span>
        <div align="right">
            <?php if (isset($_SESSION['login']) || isset($_SESSION['admin_login'])) {
                print('  <a href="checkout.php" class="checkout_btn" id="check_out_cart">
                <span class="icon-basket"></span> Check out
            </a>');
            } else {
                print('Login to checkout');
            }

            ?>

            <a href="#" class="checkout_btn" id="clear_cart">
                <span class="icon-trash"></span> Remove All
            </a>
        </div>
    </div>