<?php

//dbcontroller class
require('../Database/DBController.php');

//cart Class
require('../Database/cart.php');

//Dbcontoller object
$db = new DBController();

//object Cart
$cart = new Cart($db);

$cart->fetchItem();
