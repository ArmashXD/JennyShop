<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function fetchItem()
    {
        session_start();
        $total_price = 0;
        $total_item = 0;

        $output = '
        <div class="table-responsive" id="order_table">
            <table class="table table-bordered table-striped">
                <tr>  
                    <th width="40%">Product Name</th>  
                    <th width="10%">Quantity</th>  
                    <th width="20%">Price</th>  
                    <th width="15%">Total</th>  
                    <th width="5%">Action</th>  
                </tr>
        ';
        if (!empty($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                $output .= '
                <tr>
                 <td>' . $values["product_name"] . '</td>
                 <td>' . $values["product_quantity"] . '</td>
                 <td align="right">' . $values["product_price"] . ' Rs</td>
                 <td align="right">' . number_format($values["product_quantity"] * $values["product_price"], 2) . ' Rs</td>
                 <td><button name="delete" class="btn btn-danger btn-xs delete" id="' . $values["product_id"] . '"><i class="icon-trash"></i></button></td>
                </tr>
                ';
                $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                $total_item = $total_item + 1;
            }
            $output .= '
            <tr>  
                <td colspan="3" align="right">Total</td>  
                <td align="right"> ' . number_format($total_price, 2) . ' Rs</td>  
                <td></td>  
            </tr>
            ';
        } else {
            $output .= '
            <tr>
                <td colspan="5" align="center">
                    Your Cart is Empty!
                </td>
            </tr>
            ';
        }
        $output .= '</table></div>';
        $data = array(
            'cart_details'  => $output,
            'total_price'  => '$' . number_format($total_price, 2),
            'total_item'  => $total_item
        );


        echo json_encode($data);
    }

    public function add()
    {
        session_start();
        if (isset($_POST["action"])) {
            if ($_POST["action"] == "add") {
                if (isset($_SESSION["shopping_cart"])) {
                    $is_available = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
                            $is_available++;
                            $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
                        }
                    }
                    if ($is_available == 0) {
                        $item_array = array(
                            'product_id'               =>     $_POST["product_id"],
                            'product_name'             =>     $_POST["product_name"],
                            'product_price'            =>     $_POST["product_price"],
                            'product_quantity'         =>     $_POST["product_quantity"]
                        );
                        $_SESSION["shopping_cart"][] = $item_array;
                    }
                } else {
                    $item_array = array(
                        'product_id'               =>     $_POST["product_id"],
                        'product_name'             =>     $_POST["product_name"],
                        'product_price'            =>     $_POST["product_price"],
                        'product_quantity'         =>     $_POST["product_quantity"],
                    );
                    $_SESSION["shopping_cart"][] = $item_array;
                }
            }

            if ($_POST["action"] == 'remove') {
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    if ($values["product_id"] == $_POST["product_id"]) {
                        unset($_SESSION["shopping_cart"][$keys]);
                    }
                }
            }
            if ($_POST["action"] == 'empty') {
                unset($_SESSION["shopping_cart"]);
            }
        }
    }

    public function remove()
    {
        session_start();

        if (isset($_POST["action"])) {

            if ($_POST["action"] == 'remove') {
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    if ($values["product_id"] == $_POST["product_id"]) {
                        unset($_SESSION["shopping_cart"][$keys]);
                    }
                }
            }
            if ($_POST["action"] == 'empty') {
                unset($_SESSION["shopping_cart"]);
            }
        }
    }
}
