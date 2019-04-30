<?php
class ConfigurationTypes{

    // database connection and table name
    private $conn;
    private $table_name = "configuration_types";

    // object properties
    public $id;
    public $TypeName;
    public $TypeValue;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read ConfigurationTypes
    function read(){

        // select all query
        $query = "select * from " . $this->table_name ;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}