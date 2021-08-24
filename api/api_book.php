<?php
include_once '../db.php';

$package_id = $_POST['package_id'];
$email = $_POST['email'];
$date = $_POST['date'];
$price = $_POST['price'];
$status = $_POST['status'];

$now = strtotime("now");
$bookingID = "BKG".strtotime("now");

// echo $bookingID." | ".$package_id." | ".
$insertValuesSQL = '';
$insertValuesSQL .= "('".$bookingID."','".$package_id."', '".$email."', '".$date."', '".$price."', '".$status."'),";

if(!empty($insertValuesSQL)){ 
    $insertValuesSQL = trim($insertValuesSQL, ','); 
    // Insert image file name into database 
    $insertBooking = $conn->query("INSERT INTO booking VALUES $insertValuesSQL"); 
}

$persons = $_POST['persons'];
// $persons = [["person-1", "Amit Manna", "23", "Male"], ["person-2", "Iti Bera", "23", "Female"]];
$statusMsg = $errorMsg = $insertValuesSQL = '';
foreach ($persons as $key => $val) {
    $insertValuesSQL .= "('" . $bookingID . "','" . $val[1] . "','" . $val[2] . "','" . $val[3] . "','" . $date . "'),";
}
if (!empty($insertValuesSQL)) {
    $insertValuesSQL = trim($insertValuesSQL, ',');
    $insertPerson = $conn->query("INSERT INTO booking_persons VALUES $insertValuesSQL");
    if($insertPerson AND $insertBooking){ 
        echo json_encode(array("statusCode"=>200));
    }else{ 
        echo json_encode(array("statusCode"=>201, "email"=>$email, "bookingID"=>$bookingID, "packageID"=>$package_id, "date"=>$date, "price"=>$price, "persons"=>$persons));
    } 
}
// echo json_encode(array("statusCode"=>201, "email"=>$email, "bookingID"=>$bookingID, "packageID"=>$package_id, "date"=>$date, "price"=>$price, "persons"=>$persons))
?>