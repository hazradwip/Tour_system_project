<?php

include_once '../db.php';
$from = $_GET['fromCity'];
$destination = $_GET['destinationCity'];

$packageQuery = "SELECT 
    `package`.`package_id`, 
    `package`.`cover_photo`, 
    `package`.`name`, 
    `package`.`duration`, 
    `package`.`places`, 
    `package`.`price`
    FROM package
    WHERE LOWER(`package`.`places`) LIKE '%$destination%'
    OR LOWER(`package`.`name`) LIKE '%$destination%'";
$packageQueryResult = $conn->query($packageQuery);

if ($packageQueryResult->num_rows > 0) {
    
    $data = [];
    while($row = $packageQueryResult->fetch_assoc()) {

    //   echo json_encode($row);
        $packageID = $row["package_id"];
        $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
        $name = $row["name"];
        $places = $row["places"];
        $duration = $row["duration"];
        $price = $row["price"];

        $serviceQuery = "SELECT * FROM tour_services 
        WHERE `tour_services`.`package_id`='$packageID'";
        $serviceQueryResult = $conn->query($serviceQuery);

        $services = [];
        while ($row = $serviceQueryResult->fetch_assoc()) {
            $service = $row["service"];
            array_push($services, $service);
        }

        $package = array(
            "id" => $packageID,
            "name" => $name,
            "places" => $places,
            "photo" => $imageURL,
            "price" => $price,
            "duration" => $duration,
            "services" => $services
        );
        array_push($data, $package);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $data));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "Failed"));
}
