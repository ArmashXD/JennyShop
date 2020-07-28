<?php

class DBController
{
    //variables
    protected $DB_HOST = "localhost";
    protected $DB_USER = "root";
    protected $DB_PASS = "";
    protected $DB_TABLE = "onlineShopping";

    //connection prop
    public $con = null;

    //constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_TABLE);
        if ($this->con->connect_error) {
            echo "Connection Failed" . $this->con->connect_error;
        }
    }

    //destructor
    public function __destruct()
    {
        $this->closeConnection();
    }
    //closing connectionn
    public function closeConnection()
    {
        if ($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }
}
