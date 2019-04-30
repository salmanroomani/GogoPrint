<?php
class ConfigurationPricing{

    // database connection and table name
    private $conn;
    private $table_name = "configuration_pricing";

    // object properties
    public $id;
    public $Quantity;
    public $Price;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function GetPrice($PaperFormat,$Page,$PaperType){

        // query to read single record
        $query = "SELECT
                id,Quantity,Price
            FROM
                " . $this->table_name . "         
            WHERE
                PaperFormat = ".$PaperFormat."  AND
                Page = ".$Page." AND
                PaperType = ".$PaperType;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;

    }
}