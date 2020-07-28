<?php
if (isset($_SESSION['login']) || isset($_SESSION['admin_login'])) {
?>
    <!--================Track Area =================-->
    <section class="track_area p_100">
        <div class="container">
            <div class="track_inner">
                <div class="track_title">
                    <h2>Track Your Item</h2>
                    <?php $user_id = $_SESSION['user_id'];
                    $user->track_orders($user_id); ?>
                </div>

                <form class="track_form row" method="POST">
                    <div class="col-lg-12 form-group">
                        <label for="text">Order ID</label>
                        <input class="form-control" type="text" id="text" name="order_id">
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" value="submit" name="order_submit" class="btn subs_btn form-control">Track Order</button>
                    </div>
                </form>
            </div>
            <br><br>
            <div class="container text-center">
                <?php if (isset($_POST['order_submit'])) {
                    $orderid = $_POST['order_id'];
                    $user->get_order_status($orderid, $user_id);
                } ?>
            </div>
        </div>
    </section>
    <!--================End Track Area =================-->
<?php } else {
    echo "<script>window.location.href= 'index.php'</script>";
}
?>