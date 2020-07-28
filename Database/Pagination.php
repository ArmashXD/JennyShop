<?php

class Pagination
{

    public $db = null;
    //setting total record
    private $total_records = 0;
    //setting limit
    private $limit = 6;

    //constructor
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
        $this->set_total_records();
    }
    //finding total records
    public function set_total_records($table = 'products')
    {
        $query = "SELECT * FROM {$table}";

        $result = mysqli_query($this->db->con, $query);
        $this->total_records = mysqli_num_rows($result);
        // $number_of_pages = ceil($number_of_results / $results_per_page);
    }
    //checking current page
    public function current_page()
    {
        return isset($_GET['page']) ? (int) $_GET['page'] : 1;
    }
    //getting data
    public function getData($table = 'products')
    {
        $start = 0;
        if ($this->current_page() > 1) {
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }
        $result = mysqli_query($this->db->con, "SELECT * FROM {$table} LIMIT $start,$this->limit");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getDataJewellery($table = 'products')
    {
        $start = 0;
        if ($this->current_page() > 1) {
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }
        $result = mysqli_query($this->db->con, "SELECT * FROM {$table} WHERE product_cat = 1 LIMIT $start,$this->limit ");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDataCosmetics($table = 'products')
    {
        $start = 0;
        if ($this->current_page() > 1) {
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }
        $result = mysqli_query($this->db->con, "SELECT * FROM {$table} WHERE product_cat = 2 LIMIT $start,$this->limit ");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    //calculating pagination number
    public function get_pagination_number()
    {
        return ceil($this->total_records / $this->limit);
    }
    //assigning active class 
    public function is_active_class($page)
    {
        return ($page == $this->current_page()) ? 'active' : '';
    }
    //next page button function
    public function next_page()
    {
        return ($this->current_page() < $this->get_pagination_number()) ? $this->current_page() + 1 : $this->get_pagination_number();
    }
    //getting brands
    public function getBrands()
    {
        $query = "SELECT * FROM brands";

        $result = mysqli_query($this->db->con, $query) or die(mysqli_error($this->db->con));

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}
