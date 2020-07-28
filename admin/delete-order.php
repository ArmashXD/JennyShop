<?php
include('include/config.php');


$sql = "DELETE FROM orders_info WHERE order_id='" . $_GET["order_id"] . "'";

$query = mysqli_query($con, $sql) or die(mysqli_error($con));
if ($query) {
    header('location:index.php');
} else {
    echo "error";
}
