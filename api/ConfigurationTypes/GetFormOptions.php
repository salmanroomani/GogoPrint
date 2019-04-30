<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// including database and object files
include_once '../config/database.php';
include_once '../objects/ConfigurationTypes.php';


// instantiate database and ConfigurationTypes object
$database = new Database();
$db = $database->getConnection();

// initialize object
$ConfigurationTypes = new ConfigurationTypes($db);

// query products
$stmt = $ConfigurationTypes->read();
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){

    // ConfigurationTypes array
    $ConfigurationTypes_arr=array();
    $ConfigurationTypes_arr["records"]=array();

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);


        $ConfigurationTypes_items=array(
            "id" => $id,
            "TypeName" => $TypeName,
            "TypeValue" => $TypeValue
        );

        array_push($ConfigurationTypes_arr["records"], $ConfigurationTypes_items);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show ConfigurationTypes data in json format
    echo json_encode($ConfigurationTypes_arr["records"]);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No ConfigurationTypes were found.")
    );
}
