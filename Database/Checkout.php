<?php
class Checkout
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function insertOrder($user_id, $fname, $email, $address, $city, $state, $mobile, $cardname, $cardnumber, $expdate, $product_name, $prod_count, $total_amt, $cvv, $status)
    {
        $query = "INSERT INTO 
                  orders_info
                  (user_id, f_name, email, address, city, state, mobile, cardname, cardnumber, expdate, product_name, prod_count, total_amt, cvv, Status, Start_Date)
         VALUES 
                  ('$user_id','$fname','$email','$address','$city','$state','$mobile','$cardname','$cardnumber','$expdate','$product_name','$prod_count','$total_amt','$cvv', '$status', CURDATE())";

        $result = mysqli_query($this->db->con, $query) or  die("Error:" . mysqli_error($this->db->con));;

        if ($result) {
            unset($_SESSION['shopping_cart']);
            unset($_SESSION['products']);
            unset($_SESSION['product_quantity']);
            unset($_SESSION['total_amount']);
            echo "<script>confirm('Your Order is Placed Success Fully Please Note the Order Id'); window.location.href= 'index.php'</script>";
            return true;
        } else {
            $error = mysqli_error($this->db->con);
            return false;
        }
    }
}
