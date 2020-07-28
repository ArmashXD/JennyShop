<?php
//DB Class
require('./Database/DBController.php');
//user class
require('./Database/User.php');
//Product Class
require('./Database/Products.php');
//Pagination Class
require('./Database/Pagination.php');
//Checkout Class
require('./Database/Checkout.php');


$db = new DBController();

$user = new User($db);

$products = new Products($db);

$pagination = new Pagination($db);

$checkout = new Checkout($db);
