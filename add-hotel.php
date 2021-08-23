<?php
	if(isset($_POST['add_hotel'])){ 
		// Include the database configuration file 
		include_once 'db.php'; 
		 
		// File upload configuration 
		$allowTypes = array('jpg','png','jpeg','gif','webp'); 
		$hotelName = $_POST['hotel-name'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$link = $_POST['link'];

	
		$hotelID = "HTL".strtotime("now");
        mkdir("hotel-image/".$hotelID);
        $targetDir = "/hotel-image/".$hotelID."/";
		
		$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
		$fileName = $_FILES['hotel_photo']['name'];
		if(!empty($fileName)){ 

            // File upload path 
            $thumb_image = basename($_FILES['hotel_photo']['name']);
            $targetFilePath = $targetDir.$thumb_image;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 

                // Upload file to server 
                if(move_uploaded_file($_FILES["hotel_photo"]["tmp_name"], SITE_ROOT.$targetFilePath)){ 

                    // Image db insert sql 
                    $insertValuesSQL .= "('".$hotelID."','".$hotelName."', '".$location."', '".$description."', '".$thumb_image."', '".$link."'),"; 
                }else{ 
                    $errorUpload .= $fileName.' | '; 
                } 
            }else{ 
                $errorUploadType .= $fileName.' | '; 
            }

			if(!empty($insertValuesSQL)){ 
				$insertValuesSQL = trim($insertValuesSQL, ','); 
				// Insert image file name into database 
				$insert = $conn->query("INSERT INTO hotel VALUES $insertValuesSQL"); 

				if($insert){ 
					$errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
					$errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
					$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
					$statusMsg = "Hotel Added successfully.".$errorMsg; 
				}else{ 
					$statusMsg = "Sorry, there was an error uploading your file."; 
				} 
			} 
		}else{ 
			$statusMsg = 'Please select a file to upload.'; 
		} 
		 
		// Display status message 
		echo $statusMsg; 
        // echo "\n Hotel Added Successfully.";
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
            <div id="page-1">
                <h5>Add Hotel</h5>
                <div class="row ">
                    <div class="input-field col l6 s12">
                        <input id="hotel-name" name="hotel-name" type="text" class="">
                        <label for="hotel-name">Hotel Name</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="location" name="location" type="text" class="">
                        <label for="location">Location</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <textarea id="description" name="description" class="materialize-textarea"></textarea>
                        <label for="description">Hotel Description</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="link" name="link" type="text" class="">
                        <label for="link">Website Link</label>
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn right">
                        <span>Upload Hotel Photos</span>
                        <input type="file" name="hotel_photo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <div class="center">
                <a href="dashboard.php" class="btn-secondary">Back</a>&emsp;
                <input type="submit" name="add_hotel" value="Add Hotel" class="btn-primary">
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