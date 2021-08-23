<?php
if (isset($_POST['create_package'])) {
    // Include the database configuration file 
    include_once 'db.php';

    // File upload configuration 
    $allowTypes = array('jpg','png','jpeg','gif','webp'); 
    $packageName = $_POST['package-name'];
    $places = $_POST['places'];
    $pickup = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];
    $duration = $_POST['duration'];
    $price = $_POST['package-price'];

    // $packageID = 'Uttarakhand - Rivers, Lakes and Corbett National Park1628230481';
    $packageID = "TOURPKG".strtotime("now");
    mkdir("package-image/".$packageID);
    $targetDir = "/package-image/".$packageID."/";

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileName = $_FILES['cover_photo']['name'];
    if(!empty($fileName)){ 

        // File upload path 
        $thumb_image = basename($_FILES['cover_photo']['name']);
        $targetFilePath = $targetDir.$thumb_image;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $targetFilePath = $targetDir."cover-photo.".$fileType;
        $thumb_image = "cover-photo.".$fileType;

        if(in_array($fileType, $allowTypes)){ 

            // Upload file to server 
            if(move_uploaded_file($_FILES["cover_photo"]["tmp_name"], SITE_ROOT.$targetFilePath)){ 

                // Image db insert sql 
                $insertValuesSQL .= "('".$packageID."','".$packageName."', '".$thumb_image."', '".$duration."', '".$places."', '".$pickup."', '".$dropoff."', '".$price."'),"; 
            }else{ 
                $errorUpload .= $fileName.' | '; 
            } 
        }else{ 
            $errorUploadType .= $fileName.' | '; 
        }

    	if(!empty($insertValuesSQL)){ 
    		$insertValuesSQL = trim($insertValuesSQL, ','); 
    		// Insert image file name into database 
    		$insert = $conn->query("INSERT INTO package VALUES $insertValuesSQL"); 
    		if($insert){ 
    			$errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
    			$errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
    			$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
    			$statusMsg = "Files are uploaded successfully.".$errorMsg; 
    		}else{ 
    			$statusMsg = "Sorry, there was an error uploading your file."; 
    		} 
    	} 
    }else{ 
    	$statusMsg = 'Please select a file to upload.'; 
    } 

    // Display status message 
    echo $statusMsg; 

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['photos']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['photos']['name'] as $key=>$val){ 
            // File upload path 
            $img = basename($_FILES['photos']['name'][$key]);
            // mkdir($targetDir."photos");
            $targetFilePath = $targetDir.$img; 

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["photos"]["tmp_name"][$key], SITE_ROOT.$targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$packageID."','".$img."'),"; 
                }else{
                    $errorUpload .= $_FILES['photos']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['photos']['name'][$key].' | '; 
            } 

        } 
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $conn->query("INSERT INTO tour_photos VALUES $insertValuesSQL"); 
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        } 

    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 

    // Display status message 
    echo $statusMsg; 


    $activities = $_POST['day_activities'];
    $activities = explode("\r\n\r\n",$activities);

    $statusMsg = $errorMsg = $insertValuesSQL = '';
    foreach($activities as $key=>$val) {
        // echo $val." | ";
        $insertValuesSQL .= "('".$packageID."','".($key+1)."','".$val."'),"; 
    }
    if(!empty($insertValuesSQL)){ 
        $insertValuesSQL = trim($insertValuesSQL, ','); 
        $insert = $conn->query("INSERT INTO tour_activity VALUES $insertValuesSQL"); 
        if($insert){ 
            $statusMsg = "Activities Uploaded.".$errorMsg; 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading data."; 
        } 
    }

    echo $statusMsg;

    $hotels = $_POST['select_hotels'];
    $statusMsg = $errorMsg = $insertValuesSQL = '';
    foreach($hotels as $key=>$val) {
        // echo $val." | ";
        $insertValuesSQL .= "('".$packageID."','".$val."'),"; 
    }
    if(!empty($insertValuesSQL)){ 
        $insertValuesSQL = trim($insertValuesSQL, ','); 
        $insert = $conn->query("INSERT INTO tour_hotels VALUES $insertValuesSQL"); 
        if($insert){ 
            $statusMsg = "Hotels Updated".$errorMsg; 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading data."; 
        } 
    } 

    $services = $_POST['select_services'];
    $statusMsg = $errorMsg = $insertValuesSQL = '';
    foreach ($services as $key => $val) {
        $insertValuesSQL .= "('" . $packageID . "','" . $val . "'),";
    }
    if (!empty($insertValuesSQL)) {
        $insertValuesSQL = trim($insertValuesSQL, ',');
        $insert = $conn->query("INSERT INTO tour_services VALUES $insertValuesSQL");
        if ($insert) {
            $statusMsg = "Services Updated" . $errorMsg;
        } else {
            $statusMsg = "Sorry, there was an error uploading data.";
        }
    }

    $date = $_POST['dep-date'];

    $insertValuesSQL = "('".$packageID."','".$date."'),"; 
    if(!empty($insertValuesSQL)){ 
        $insertValuesSQL = trim($insertValuesSQL, ','); 
        $insert = $conn->query("INSERT INTO tour VALUES $insertValuesSQL"); 
        if($insert){ 
            $statusMsg = "Dates Updated".$errorMsg; 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading data."; 
        } 
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php'
    ?>

    <style>
        input[type=text]:not(.browser-default)+label,
        input[type=text]:not(.browser-default):focus:not([readonly])+label,
        input[type=text]:not(.browser-default).validate+label,
        input[type=email]:not(.browser-default)+label,
        input[type=email]:not(.browser-default):focus:not([readonly])+label,
        input[type=email]:not(.browser-default).validate+label,
        input[type=password]:not(.browser-default)+label,
        input[type=password]:not(.browser-default):focus:not([readonly])+label,
        input[type=password]:not(.browser-default).validate+label {
            color: var(--text-primary);
            width: 100%;
            font-weight: 500;
            font-size: 1rem;
            left: 10%;
            margin-top: 2px;
        }

        input[type=text]:not(.browser-default),
        input[type=text]:not(.browser-default):focus:not([readonly]),
        input[type=email]:not(.browser-default),
        input[type=email]:not(.browser-default):focus:not([readonly]),
        input[type=password]:not(.browser-default),
        input[type=password]:not(.browser-default):focus:not([readonly]) {
            width: 100%;
            color: var(--text-primary);
            border: 2px solid rgba(0, 0, 0, 0.25);
            border-bottom: 2px solid rgba(0, 0, 0, 0.25);
            box-shadow: none;
            border-radius: 100px;
            background-color: var(--bg-primary);
            text-indent: 16px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- ============Navbar============== -->
    <?php
    include 'navbar.php'
    ?>

    <div class="container">
        <p>&nbsp;</p>
        <form action="" method="post" enctype="multipart/form-data">

            <!-- =========== Create Package ============= -->
            <div id="section-1">
                <h5>Create Package</h5>
                <div class="row ">
                    <div class="input-field col l6 s12">
                        <input id="package-name" name="package-name" type="text" class="">
                        <label for="package-name">Package Name</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="places" name="places" type="text" class="">
                        <label for="places">Places to Visit (Use Comma Sperated Values)</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="pickup" name="pickup" type="text" class="">
                        <label for="pickup">Pick Up Location</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="dropoff" name="dropoff" type="text" class="">
                        <label for="dropoff">Drop Location</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="duration" name="duration" type="text" class="">
                        <label for="duration">Duration (Example : 3N/4D)</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="package-price" name="package-price" type="text" class="">
                        <label for="package-price">Price</label>
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn right">
                        <span>Upload Cover Photo</span>
                        <input type="file" name="cover_photo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <hr>

            <!-- =========== Create Package ============= -->
            <div id="section-2">
                <h5>Add Activities of the Tour Package</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="day_activities" name="day_activities" class="materialize-textarea"></textarea>
                        <label for="day_activities">Day wise Activities (Separate them by new line)</label>
                    </div>
                </div>
            </div>

            <hr>

            <!-- =========== Create Package ============= -->
            <div id="page-3">
                <h5>Add Hotels and Services</h5>
                <div class="row">
                    <div class="input-field col s12 l6">
                        <select multiple name="select_hotels[]" id="select_hotels">
                            <option value="" disabled>Choose your option</option>
                            <?php
                            include_once 'db.php';
                            $sql = "SELECT * FROM hotel";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_array()) {
                                echo "<option value='" . $row["hotel_id"] . "'>" . $row["name"] . ", " . $row['location'] . "</option>";
                            }

                            ?>
                        </select>
                        <label>Select Hotels</label>
                    </div>

                    <div class="input-field col s12 l6">
                        <select multiple name="select_services[]" id="select_services">
                            <option value="" disabled>Choose your option</option>
                            <option value="fas fa-bed">Hotels</option>
                            <option value="fas fa-plane-departure">Flights</option>
                            <option value="fas fa-car-side">Transfers</option>
                            <option value="fas fa-utensils">Meals</option>
                            <option value="fas fa-glasses">Sightseeing</option>
                        </select>
                        <label>Select Services</label>
                    </div>
                </div>
            </div>

            <hr>

            <!-- =========== Create Package ============= -->
            <div id="section-4">
                <h5>Add a Date and Upload Photos</h5>
                <div class="row">
                    <div class="col s12 l6">
                        <div class="file-field input-field">
                            <div class="btn right">
                                <span>Upload Photos</span>
                                <input type="file" multiple name="photos[]">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="input-field col l6 s12">
                        <input id="dep-date" name="dep-date" type="text" class="datepicker">
                        <label for="dep-date">Date of departure</label>
                    </div>
                </div>

            </div>
            <div class="center">
                <a href="dashboard.php" class="btn-secondary">Back</a>&emsp;
                <input type="submit" name="create_package" value="Create Package" class="btn-primary">
            </div>
        </form>
        <p>&nbsp;</p>

    </div>
    <script src="./scripts/styles.js"></script>
    <?php include 'scripts.php'; ?>
  <script>
    function fakeAdmin() {
      auth.signOut().then(() => {})
      alert("You are not an Admin! You don't have permission to visit.")
      window.location = "admin-login.php"
    }
    auth.onAuthStateChanged(user => {
      if (user) {
        db.collection('users').doc(user.uid).get().then(doc => {
          var admin = doc.data().admin;
          console.log(admin)
          if(admin == true) {
            setupNavLinks(user);
            // load();
          } else {
              fakeAdmin();
          }
        });
        
        // 
        // getData(user.email);
      } else {
        setupNavLinks();
        window.location = "admin-login.php"
      }
    })
  </script>
</body>

</html>