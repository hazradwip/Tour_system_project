<?php

include_once '../db.php';
$packageID = $_GET['packageID'];
// $packageID = 'Visit the Land of Aryans in Ladakh1628177004';

$packageQuery = "SELECT 
    `package`.`package_id`, 
    `package`.`name`, 
    `package`.`places`,
    `package`.`cover_photo`, 
    `package`.`pickup`, 
    `package`.`dropoff`, 
    `package`.`duration`, 
    `package`.`price`, 
    `tour`.`date` 
    FROM package, tour
    WHERE `package`.`package_id`='$packageID'
    AND `package`.`package_id`=`tour`.`package_id` 
    AND STR_TO_DATE(`tour`.`date`, '%b%d,%Y') > CURDATE()";
$packageQueryResult = $conn->query($packageQuery);

if ($packageQueryResult->num_rows > 0) {
  $row = $packageQueryResult->fetch_assoc();
  
//   echo json_encode($row);
  $packageID = $row["package_id"];
  $packageName = $row["name"];
  $places = $row["places"];
  $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
  $duration = $row["duration"];
  $price = $row["price"];
  $pickup = $row["pickup"];
  $dropoff = $row["dropoff"];
  $date = $row["date"];

  $activityQuery = "SELECT * FROM tour_activity WHERE package_id='$packageID'";
  $activityQueryResult = $conn->query($activityQuery);

  $activities = [];
  while ($row = $activityQueryResult->fetch_assoc()) {
    $activity = array("day"=>$row["day"], "description"=>$row["description"]);
    array_push($activities, $activity);
  }

  $hotelQuery = "SELECT 
    `hotel`.`hotel_id`,
    `hotel`.`name`,
    `hotel`.`location`,
    `hotel`.`description`,
    `hotel`.`photo`,
    `hotel`.`link` 
    FROM hotel, tour_hotels 
    WHERE `hotel`.`hotel_id`=`tour_hotels`.`hotel_id`
    AND `tour_hotels`.`package_id`='$packageID'";
  $hotelQueryResult = $conn->query($hotelQuery);

  $hotels = [];
  while ($row = $hotelQueryResult->fetch_assoc()) {
    $hotelID = $row["hotel_id"];
    $photo = 'hotel-image/' . $hotelID . '/' . $row["photo"];

    $hotel = array("hotel_id"=>$hotelID, "name"=>$row["name"], "location"=>$row["location"], "description"=>$row["description"], "image"=>$photo, "link"=>$row["link"]);
    array_push($hotels, $hotel);
  }

  $serviceQuery = "SELECT * FROM tour_services 
    WHERE `tour_services`.`package_id`='$packageID'";
  $serviceQueryResult = $conn->query($serviceQuery);

  $services = [];
  while ($row = $serviceQueryResult->fetch_assoc()) {
    $service = $row["service"];
    array_push($services, $service);
  }

  $data = array(
    "packageID"=>$packageID,
    "packageName"=>$packageName,
    "packagePlaces"=>$places,
    "coverPhoto"=>$imageURL,
    "price"=>$price,
    "travelDate"=>$date,
    "duration"=>$duration,
    "pickup"=>$pickup,
    "dropoff"=>$dropoff,
    "activities"=>$activities,
    "hotels"=>$hotels,
    "services"=>$services);
    echo json_encode(array("statusCode"=>200, "msg"=>"Success", "data"=>$data));
}
else {
    echo json_encode(array("statusCode"=>201, "msg"=>"Failed"));
}

?>