<?php
class Orders{

    // database connection and table name
    private $conn;
    private $table_name = "cart";

    // object properties
    public $id;
    public $Quantity;
    public $ProcessingDays;
    public $DueDate;
    public $PaperFormat;
    public $PaperType;
    public $Page;
    public $Price;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read ConfigurationTypes
    function OrdersList(){

        // select all query
        $query = "SELECT C.id,C.ProcessingDays,C.DueDate,P.Quantity,P.Price,T.TypeValue as PaperFormat , T2.TypeValue as Page, T3.TypeValue as PaperType
                    FROM " . $this->table_name." C
                    INNER JOIN configuration_pricing P
                    ON C.ConfigurationID = P.id
                    INNER JOIN configuration_types T
                    ON P.PaperFormat = T.id
                    INNER JOIN configuration_types T2
                    ON P.Page = T2.id
                    INNER JOIN  configuration_types T3
                    ON P.PaperType = T3.id "  ;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}