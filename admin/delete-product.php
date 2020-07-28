<?php

include('include/config.php');

$id = $_GET['product_Id'];

$query = "DELETE FROM products WHERE product_id = $id";
$result = mysqli_query($con, $query);

if ($result) {
    header("location: manage-products.php");

    echo "Success";
} else {
    echo mysqli_error($con);
    echo "False";
}
