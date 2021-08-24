<?php

include_once '../db.php';

$type = $_GET['type'];

switch ($type) {
  case "upcoming":
    $email = $_GET['email'];
    $query = "SELECT 
      `booking`.`booking_id`,
      `package`.`package_id`, 
      `package`.`name`, 
      `package`.`cover_photo`, 
      `package`.`places`,
      `package`.`pickup`, 
      `package`.`dropoff`, 
      `package`.`duration`, 
      `package`.`price`, 
      `tour`.`date` 
      FROM package, tour, booking
      WHERE `package`.`package_id`=`tour`.`package_id` 
      AND `package`.`package_id`=`booking`.`package_id`
      AND STR_TO_DATE(`tour`.`date`, '%b%d,%Y') > CURDATE()
      AND `booking`.`email`='$email'
      ORDER BY STR_TO_DATE(`tour`.`date`, '%b%d,%Y')";
    $queryUpcoming = $conn->query($query);

    $upcomingTours = [];
    if ($queryUpcoming->num_rows > 0) {

      while ($row = $queryUpcoming->fetch_assoc()) {
        $bookingID = $row["booking_id"];
        $packageID = $row["package_id"];
        $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
        $packageName = $row["name"];
        $places = $row["places"];
        $pickup = $row["pickup"];
        $dropoff = $row["dropoff"];
        $duration = $row["duration"];
        $price = $row["price"];
        $date = $row["date"];

        $tour = array(
          "id" => $packageID,
          "booking_id" => $bookingID,
          "photo" => $imageURL,
          "name" => $packageName,
          "duration" => $duration,
          "places" => $places,
          "pickup" => $pickup,
          "dropoff" => $dropoff,
          "date" => $date
        );

        array_push($upcomingTours, $tour);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $upcomingTours));
    } else {
      $params = [$type, $email];
      echo json_encode(array("statusCode" => 201, "msg" => "No Data Found", "params" => $params));
    }
    break;

  case "bookings":
    $email = $_GET['email'];
    $query = "SELECT 
      `booking`.`booking_id`,
      `package`.`package_id`, 
      `package`.`name`, 
      `package`.`cover_photo`, 
      `package`.`places`,
      `package`.`pickup`, 
      `package`.`dropoff`, 
      `package`.`duration`, 
      `package`.`price`, 
      `tour`.`date` 
      FROM package, tour, booking
      WHERE `package`.`package_id`=`tour`.`package_id` 
      AND `package`.`package_id`=`booking`.`package_id`
      AND `booking`.`email`='$email'
      ORDER BY STR_TO_DATE(`tour`.`date`, '%b%d,%Y') DESC";
    $queryBookings = $conn->query($query);

    $BookedTours = [];
    if ($queryBookings->num_rows > 0) {

      while ($row = $queryBookings->fetch_assoc()) {
        $bookingID = $row["booking_id"];
        $packageID = $row["package_id"];
        $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
        $packageName = $row["name"];
        $places = $row["places"];
        $pickup = $row["pickup"];
        $dropoff = $row["dropoff"];
        $duration = $row["duration"];
        $price = $row["price"];
        $date = $row["date"];

        $tour = array(
          "id" => $packageID,
          "booking_id" => $bookingID,
          "photo" => $imageURL,
          "name" => $packageName,
          "duration" => $duration,
          "places" => $places,
          "pickup" => $pickup,
          "dropoff" => $dropoff,
          "date" => $date
        );

        array_push($BookedTours, $tour);
      }
      echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $BookedTours));
    } else {
      $params = [$type, $email];
      echo json_encode(array("statusCode" => 201, "msg" => "No Data Found", "params" => $params));
    }

    break;

  case "guestList":
    $bookingId = $_GET['bookingID'];
    // echo $type." | ".$email;
    $query = "SELECT
      `booking_persons`.`booking_id`, 
      `booking_persons`.`person_name`, 
      `booking_persons`.`age`, 
      `booking_persons`.`gender` 
      FROM booking_persons 
      WHERE `booking_persons`.`booking_id` ='$bookingId'";
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
