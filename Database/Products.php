<?php

class Products
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //getting all products
    public function getData($table = 'products')
    {
        $query = "SELECT * FROM {$table}";

        $result = mysqli_query($this->db->con, $query) or die("Error" . mysqli_error($this->db->con));

        //storing coming data in array
        $resultArray = array();
        //cycling through data
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        //returning array
        return $resultArray;
    }

    //getting single product
    public function getSingleProduct($id = null)
    {
        $query = "SELECT * FROM products WHERE product_id = {$id}";

        $result = mysqli_query($this->db->con, $query) or die("Error" . mysqli_error($this->db->con));

        //storing coming data in array
        $resultArray = array();
        //cycling through data
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        //returning array
        return $resultArray;
    }

    //searching product
    public function search_product($name)
    {


        $select_query = "SELECT * FROM products WHERE product_title LIKE '$name'";
        $sql = mysqli_query($this->db->con, $select_query) or die("Error" . mysqli_error($this->db->con));
        $s = "";
        while ($row = mysqli_fetch_array($sql)) {
            $s = $s . "
    <a class='link-p-colr' href='_prod_details.php?item_id=" . $row['product_id'] . "'>
    <div class='live-outer'>
            <div class='live-im'>
                <img src='img/product/" . $row['product_image'] . "'/>
            </div>
            <div class='live-product-det'>
                <div class='live-product-name'>
                    <p>" . $row['product_title'] . "</p>
                </div>
                <div class='live-product-price'>
                    <div class='live-product-price-text'><p>Rs." . $row['product_price'] . "</p></div>
                </div>
            </div>
        </div>
    </a>
    ";
        }
        echo $s;
    }

    // public function search_product_name($name)
    // {
    //     $query = "SELECT * FROM products WHERE product_title LIKE '$name'";
    //     $result = mysqli_query($this->db->con, $query);

    //     $resultArray = array();

    //     while ($item = mysqli_fetch_array($result)) {
    //         $resultArray[] = $item;
    //     }
    //     return $resultArray;
    // }
}
