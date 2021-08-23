<?php

include_once '../db.php';
$packageID = $_GET['packageID'];
// echo $packageID;
$galleryQuery = "SELECT * FROM tour_photos
    WHERE `package_id` = '$packageID'";
$galleryQueryResult = $conn->query($galleryQuery);

if ($galleryQueryResult->num_rows > 0) {
    
    $data = [];
    while($row = $galleryQueryResult->fetch_assoc()) {

    //   echo json_encode($row);
        // $packageID = $row["package_id"];
        $photo = 'package-image/' . $packageID . '/' . $row["photo"];
        // echo $photo;
        array_push($data, $photo);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $data));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "Failed"));
}
