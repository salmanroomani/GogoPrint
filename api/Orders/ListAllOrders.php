<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// including database and object files
include_once '../config/database.php';
include_once '../objects/Orders.php';


// instantiate database and ConfigurationTypes object
$database = new Database();
$db = $database->getConnection();

// initialize object
$OrdersList = new Orders($db);

// query Orders
$stmt = $OrdersList->OrdersList();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // ConfigurationTypes array
    $Orders_arr=array();
    $Orders_arr["records"]=array();

    // retrieve our table content
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);


        $Orders_items=array(

            "id" => $id,
            "Quantity" => $Quantity,
            "Price" => $Price,
            "DueDate" => $DueDate,
            "ProcessingDays" => $ProcessingDays,
            "PaperFormat" => $PaperFormat,
            "PaperType" => $PaperType,
             "Page" => $Page,
        );

        array_push($Orders_arr["records"], $Orders_items);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show Orders data in json format
    echo json_encode($Orders_arr["records"]);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no Orders found
    echo json_encode(
        array("message" => "No Orders were found.")
    );
}
