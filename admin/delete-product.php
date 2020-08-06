<?php

include('include/config.php');

$id = $_GET['product_Id'];
$filename = $_GET['file_name'];

$query = "DELETE FROM products WHERE product_id = $id";
$result = mysqli_query($con, $query);

$path = "../img/product/" . $filename;

if ($result) {
    unlink($path);
    header("location: manage-products.php");
    echo "Success";
} else {
    echo mysqli_error($con);
    echo "False";
}
