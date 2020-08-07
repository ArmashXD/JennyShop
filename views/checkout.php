<?php
if (empty($_SESSION['shopping_cart'])) {
    echo "<script>window.location.href= 'index.php'</script>";
}
if (isset($_SESSION['login']) || isset($_SESSION['admin_login'])) {

    if (isset($_POST['checkout_btn_submit'])) {

        $user_id = $_SESSION['user_id'];
        $fname = htmlentities($_POST['fname']);
        $email = htmlentities($_POST['email']);
        $address = htmlentities($_POST['address']);
        $city = htmlentities($_POST['city']);
        $state = htmlentities($_POST['state']);
        $mobile = htmlentities($_POST['mobile']);
        $cardname = htmlentities($_POST['cardname']);
        $cardnumber = htmlentities($_POST['cardnumber']);
        $expdate = htmlentities($_POST['expdate']);
        $total_amt = htmlentities($_POST['total']);
        $cvv = htmlentities($_POST['cvv']);
        $products = htmlentities($_POST['product_names']);
        $quantity = htmlentities($_POST['product_quantities']);
        $status = htmlentities($_POST['status']);

        $checkout->insertOrder($user_id, $fname, $email, $address, $city, $state, $mobile, $cardname, $cardnumber, $expdate, $products, $quantity, $total_amt, $cvv, $status);
    }
?>
    <br>
    <div class="container">

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge"></span>
                </h4>
                <?php
                $total_price = 0;
                $total_item = 0;
                if (!isset($_SERVER['shopping_cart'])) :
                    foreach ($_SESSION['shopping_cart'] as $item) : ?>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $item['product_name'];
                                                        $_SESSION['products'] = $item['product_name']
                                                            ?? "" ?></h6>
                                    <small class="">Quantity: <?php echo $item['product_quantity'] ?? 1 ?></small>

                                </div>
                                <span class="text-muted"><?php echo number_format($item["product_quantity"] * $item["product_price"], 2) ?? 0  ?> Rs</span>
                            </li>
                        </ul>
                        <?php

                        $total_price = $total_price + ($item["product_quantity"] * $item["product_price"]);
                        $total_item = $total_item + 1;

                        ?>
                <?php endforeach;
                endif;
                ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Rs)</span>
                    <strong><?php $total = number_format($total_price, 2);
                            echo $total ?? 0;
                            $_SESSION['total_amount'] = $total;
                            $_SESSION['product_quantity'] = $item['product_quantity'];
                            ?> Rs</strong>
                </li>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" value="<?php isset($_SESSION['username']) ? print($_SESSION['username']) : "Enter First Name" ?>" name="fname" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter last Name" value="<?php isset($_SESSION['last_name']) ? print($_SESSION['last_name']) : "Enter Last Name" ?>" name="lastname" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo  $_SESSION['products'] ?>" name="product_names" />
                    <input type="hidden" value="<?php echo $_SESSION['product_quantity']  ?>" name="product_quantities" />
                    <input type="hidden" value="<?php echo $_SESSION['total_amount']  ?>" name="total" />
                    <input type="hidden" value="In Process" name="status" />


                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php isset($_SESSION['email']) ? print($_SESSION['email']) : "Enter Email" ?>" name="email">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Shipping Address</label>
                        <input type="text" class="form-control" id="address" value="<?php isset($_SESSION['Address1']) ? print($_SESSION['Address1']) : "Enter Shipping Addresss" ?>" required name="address">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Home Address <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" value="<?php isset($_SESSION['Address1']) ? print($_SESSION['Address1']) : "Enter Home Address" ?>" name="address2">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" name="city" required>
                                <option value="">Choose...</option>
                                <option value="Karachi">Karachi</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" name="state" required>
                                <option value="Default">Choose...</option>
                                <option value="Sindh">Sindh</option>
                                <option value="Punjab">Punjab</option>

                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" required>
                            <div class="invalid-feedback">
                                Mobile Number required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="Enter card name" name="cardname" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="Enter credit card number" name="cardnumber" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="Enter expiry date" name="expdate" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="Enter CVV" name="cvv" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <?php if (empty($_SESSION['shopping_cart'])) { ?>
                        <button class="add_cart_btn" name="checkout_btn_submit" type="submit">Cannot Checkout, Zero Item in your cart</button>
                    <?php } else {
                        print(' <button class="add_cart_btn" name="checkout_btn_submit" type="submit">Continue to checkout</button>');
                    } ?>
                </form>
            </div>
        </div>
        <br>

    <?php } else {
    echo "<script>window.location.href= 'index.php'</script>";
}
    ?>