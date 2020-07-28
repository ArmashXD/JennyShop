<?php

class User
{

  //public Variable to access Database

  public $db = null;

  public function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

  //login function

  public function login($email, $pass)
  {

    $query = "SELECT * FROM user_info WHERE email = '$email' and password = '$pass'";

    $result = mysqli_query($this->db->con, $query) or die("Error:" . mysqli_error($this->db->con));

    $user_data = mysqli_fetch_array($result);
    // Checking if the user is available in table or not
    $count = $result->num_rows;

    if ($count == 1) {

      $_SESSION['login'] = true;
      $_SESSION['username'] = $user_data['first_name'];
      $_SESSION['user_id'] = $user_data['user_Id'];
      $_SESSION['last_name'] = $user_data['last_name'];
      $_SESSION['email'] = $user_data['email'];
      $_SESSION['Mobile'] = $user_data['mobile'];
      $_SESSION['Address1'] = $user_data['address1'];
      $_SESSION['Address2'] = $user_data['address2'];
      return true;
    } else {
      return false;
    }
  }
  //admin Login
  public function adminLogin($email, $pass)
  {
    $query = "SELECT * FROM admin_info WHERE admin_email = '$email' and admin_password = '$pass'";

    $result = mysqli_query($this->db->con, $query) or die("Error:" . mysqli_error($this->db->con));

    $user_data = mysqli_fetch_array($result);
    // Checking if the user available in table or not
    $count = $result->num_rows;

    if ($count == 1) {
      $_SESSION['admin_login'] = true;
      $_SESSION['admin_email'] = $user_data['admin_email'];
      return true;
    } else {
      return false;
    }
  }

  //register function
  public function register($first_name, $last_name, $user_email, $user_password, $mobile, $address1, $address2)
  {
    $query = "INSERT INTO user_info(first_name, last_name, email, password, mobile, address1, address2)
     VALUES ('$first_name', '$last_name', '$user_email','$user_password','$mobile', '$address1', '$address2') ";

    $result = mysqli_query($this->db->con, $query) or die("Error:" + mysqli_error($this->db->con));

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  //Single User Data
  public function user_details($id = null)
  {
    $query = "SELECT * FROM user_info WHERE user_id ='$id'";

    $result = mysqli_query($this->db->con, $query) or die("Error:" + mysqli_error($this->db->con));

    //Array to store user data
    $resultArray = array();
    //Fetching User Data
    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      $resultArray = $item;
    }

    return $resultArray;
  }
  //tracking order
  public function track_orders($user_id = null)
  {
    $query = "SELECT * FROM orders_info WHERE user_id = '$user_id'";
    $result = mysqli_query($this->db->con, $query) or die("Error:" + mysqli_error($this->db->con));

    $resultArray = array();

    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $resultArray = $item;
      if ($result) {
        echo "<p>The Order Id of your Product is <b>" . $resultArray['order_id'] . "</b> </p>";
      } else {
        echo "<p>You Have Zero Orders</p>";
      }
    }
    return $resultArray;
  }
  //getting order status
  public function get_order_status($orderid = null, $user_id = null)
  {
    $query = "SELECT Status FROM orders_info WHERE order_id ='$orderid' && user_id = '$user_id'";
    $result = mysqli_query($this->db->con, $query) or die(mysqli_error($this->db->con));

    $resultArray = array();

    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $resultArray = $item;
      if ($query) {
        echo "<h4>Your Order's " . $resultArray['Status'] . "</h4>";
      } else {
        echo "<p>No Report Yet </p>";
      }
    }
    return $resultArray;
  }
  //removal of order not necessary
  public function remove_order($orderid = null)
  {
    $query = "DELETE FROM order_info WHERE order_id = '$orderid'";

    $result = mysqli_query($this->db->con, $query);
  }
  //updating profile
  public function updateProfile($first_name, $last_name, $user_email, $mobile, $address1, $address2, $user_id = null)
  {
    $query = "UPDATE user_info SET first_name='$first_name',last_name='$last_name',email='$user_email',mobile=$mobile,address1='$address1',address2='$address2' WHERE user_Id = $user_id";

    $result = mysqli_query($this->db->con, $query) or die(mysqli_error($this->db->con));

    if ($result) {
      $_SESSION['username'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['email'] = $user_email;
      $_SESSION['Mobile'] = $mobile;
      $_SESSION['Address1'] = $address1;
      $_SESSION['Address2'] = $address2;
      return true;
    } else {
      return false;
    }
  }
  public function change_password($user_id = null)
  {
  }
}
