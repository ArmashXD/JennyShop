<?php
//dbcontroller class
require('../Database/DBController.php');

//product class
require('../Database/Products.php');

//Dbcontoller object
$db = new DBController();

//object product
$product = new Products($db);


$name = $_POST['search'];
$product->search_product($name);


// if (isset($_POST['search_btn'])) {

//     $name = $_POST['name'];

//     $single = $product->search_product_name($name);

//     foreach ($item as $single) {
//         echo $item['product_title'];
//     }
// }
