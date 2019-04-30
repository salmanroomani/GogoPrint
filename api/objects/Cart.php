<?php
class Cart
{

    // database connection and table name
    private $conn;
    private $table_name = "cart";

    // object properties
    public $id;
    public $ConfigurationID;
    public $ProcessingDays;
    public $DueDate;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function AddToCart($ConfigurationID,$ProcessingDays,$DueDate)
    {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                ConfigurationID= ".$ConfigurationID.", ProcessingDays=".$ProcessingDays.", DueDate='".$DueDate."'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }
}