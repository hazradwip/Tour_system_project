<?php

include_once '../db.php';

$type = $_GET['type'];

switch ($type) {
  case "upcoming":
    $query = "SELECT 
      `package`.`package_id`, 
      `package`.`name`, 
      `package`.`cover_photo`, 
      `package`.`pickup`, 
      `package`.`dropoff`, 
      `package`.`duration`, 
      `package`.`price`, 
      `tour`.`date` 
      FROM package, tour
      WHERE `package`.`package_id`=`tour`.`package_id` 
      AND STR_TO_DATE(`tour`.`date`, '%b%d,%Y') > CURDATE()
      ORDER BY STR_TO_DATE(`tour`.`date`, '%b%d,%Y')";
    $queryUpcoming = $conn->query($query);

    $upcomingTours = [];
    if ($queryUpcoming->num_rows > 0) {

      while ($row = $queryUpcoming->fetch_assoc()) {
        $packageID = $row["package_id"];
        $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
        $packageName = $row["name"];
        $pickup = $row["pickup"];
        $dropoff = $row["dropoff"];
        $duration = $row["duration"];
        $price = $row["price"];
        $date = $row["date"];

        $tour = array(
          "id" => $packageID,
          "photo" => $imageURL,
          "name" => $packageName,
          "duration" => $duration,
          "pickup" => $pickup,
          "dropoff" => $dropoff,
          "date" => $date
        );

        array_push($upcomingTours, $tour);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $upcomingTours));
    } else {
      echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
    }

    break;
  case "completed":
    $query = "SELECT 
      `package`.`package_id`, 
      `package`.`name`, 
      `package`.`cover_photo`, 
      `package`.`pickup`, 
      `package`.`dropoff`, 
      `package`.`duration`, 
      `package`.`price`, 
      `tour`.`date` 
      FROM package, tour
      WHERE `package`.`package_id`=`tour`.`package_id` 
      AND STR_TO_DATE(`tour`.`date`, '%b%d,%Y') < CURDATE()
      ORDER BY STR_TO_DATE(`tour`.`date`, '%b%d,%Y') DESC";
    $queryCompleted = $conn->query($query);

    $completedTours = [];
    if ($queryCompleted->num_rows > 0) {

      while ($row = $queryCompleted->fetch_assoc()) {
        $packageID = $row["package_id"];
        $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
        $packageName = $row["name"];
        $pickup = $row["pickup"];
        $dropoff = $row["dropoff"];
        $duration = $row["duration"];
        $price = $row["price"];
        $date = $row["date"];

        $tour = array(
          "id" => $packageID,
          "photo" => $imageURL,
          "name" => $packageName,
          "duration" => $duration,
          "pickup" => $pickup,
          "dropoff" => $dropoff,
          "date" => $date
        );

        array_push($completedTours, $tour);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $completedTours));
    } else {
      echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
    }
    break;
  case "packages":
    $query = "SELECT 
      `package`.`package_id`, 
      `package`.`name`, 
      `package`.`cover_photo`, 
      `package`.`pickup`, 
      `package`.`dropoff`, 
      `package`.`duration`, 
      `package`.`price`, 
      `tour`.`date` 
      FROM package, tour
      WHERE `package`.`package_id`=`tour`.`package_id` 
      AND STR_TO_DATE(`tour`.`date`, '%b%d,%Y') > CURDATE()";
    $queryPackages = $conn->query($query);

    $packages = [];
    if ($queryPackages->num_rows > 0) {

      while ($row = $queryPackages->fetch_assoc()) {
        $packageID = $row["package_id"];
        $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
        $packageName = $row["name"];
        $pickup = $row["pickup"];
        $dropoff = $row["dropoff"];
        $duration = $row["duration"];
        $price = $row["price"];
        $date = $row["date"];

        $package = array(
          "id" => $packageID,
          "photo" => $imageURL,
          "name" => $packageName,
          "duration" => $duration,
          "pickup" => $pickup,
          "dropoff" => $dropoff,
          "date" => $date
        );

        array_push($packages, $package);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $packages));
    } else {
      echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
    }
    break;
  case "hotels":
    $query = "SELECT * FROM hotel";
    $queryHotels = $conn->query($query);

    $hotels = [];
    if ($queryHotels->num_rows > 0) {

      while ($row = $queryHotels->fetch_assoc()) {
        $hotelID = $row["hotel_id"];
        $imageURL = 'hotel-image/' . $hotelID . '/' . $row["photo"];
        $hotelName = $row["name"];
        $location = $row["location"];
        $description = $row["description"];
        $link = $row["link"];

        $hotel = array(
          "id" => $hotelID,
          "photo" => $imageURL,
          "name" => $hotelName,
          "description" => $description,
          "location" => $location,
          "link" => $link
        );

        array_push($hotels, $hotel);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $hotels));
    } else {
      echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
    }
    break;
  case "guestList":
    $packageID = $_GET["packageID"];
    // $packageID = 'Visit the Land of Aryans in Ladakh1628177004';
    // $date = $_GET["date"];

    $query = "SELECT
      `booking_persons`.`booking_id`, 
      `booking_persons`.`person_name`, 
      `booking_persons`.`age`, 
      `booking_persons`.`gender` 
      FROM booking_persons, booking 
      WHERE `booking`.`booking_id`=`booking_persons`.`booking_id`
      AND `booking`.`package_id`='$packageID'";
    $queryGuestList = $conn->query($query);

    $guestList = [];
    if ($queryGuestList->num_rows > 0) {

      while ($row = $queryGuestList->fetch_assoc()) {
        $bookingID = $row["booking_id"];
        $personName = $row["person_name"];
        $age = $row["age"];
        $gender = $row["gender"];

        $guest = array(
          "bookingID" => $bookingID,
          "name" => $personName,
          "age" => $age,
          "gender" => $gender
        );

        array_push($guestList, $guest);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $guestList));
    }
    break;
  default:
    //   code to be executed if n is different from all labels;
}
