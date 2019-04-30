<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/Cart.php';

$database = new Database();
$db = $database->getConnection();

$Cart = new Cart($db);

// make sure data is not empty
if(
    !empty($_POST['ConfigurationID']) &&
    !empty($_POST['ProcessingDays']) &&
    !empty($_POST['DueDate'])
){

    // set Cart property values
    $ConfigurationID = $_POST['ConfigurationID'];
    $ProcessingDays = $_POST['ProcessingDays'];
    $DueDate = $_POST['DueDate'];

    // create the product
    if($Cart->AddToCart($ConfigurationID,$ProcessingDays,$DueDate)){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Cart was created."));
    }

    // if unable to create the product, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create Cart. Data is incomplete."));
}
?>