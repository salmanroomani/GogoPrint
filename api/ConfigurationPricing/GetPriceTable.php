<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// including database and object files
include_once '../config/database.php';
include_once '../objects/ConfigurationPricing.php';


// instantiate database and ConfigurationTypes object
$database = new Database();
$db = $database->getConnection();

// initialize object
$ConfigurationPricing = new ConfigurationPricing($db);
// Get Params
$PaperFormat = isset($_GET['PaperFormat']) ? $_GET['PaperFormat'] : die();
$Page = isset($_GET['Page']) ? $_GET['Page'] : die();
$PaperType = isset($_GET['PaperType']) ? $_GET['PaperType'] : die();

// query products
$stmt = $ConfigurationPricing->GetPrice($PaperFormat,$Page,$PaperType);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // ConfigurationTypes array
    $ConfigurationPricing_arr=array();
    $ConfigurationPricing_arr["records"]=array();

    // retrieve our table content
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);


        $ConfigurationPricing_items=array(
            "id" => $id,
            "Quantity" => $Quantity,
            "Price" => $Price
        );

        array_push($ConfigurationPricing_arr["records"], $ConfigurationPricing_items);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show ConfigurationPricing data in json format
    echo json_encode($ConfigurationPricing_arr["records"]);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No ConfigurationPricing were found.")
    );
}
