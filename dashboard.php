<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php';
  ?>
</head>

<body>
  <!-- ============Navbar============== -->
  <?php
  include 'navbar.php';
  ?>

  <!--=====================End of Navbar=================-->

  <div class="container">
    <p>&nbsp;</p>
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a class="active" href="#upcoming">Upcoming Trips</a></li>
          <li class="tab col s3"><a href="#completed">Completed Trips</a></li>
          <li class="tab col s3"><a href="#package-list">Packages</a></li>
          <li class="tab col s3"><a href="#hotel-list">Hotels</a></li>
        </ul>
      </div>

      <!--  -->
      <div id="upcoming" class="col s12">
        <div class="center">
          <h5>No Upcoming Tours</h5>
        </div>
      </div>
      <!--  -->
      <div id="completed" class="col s12">
        <div class="center">
          <h5>No Completed Tours</h5>
        </div>
      </div>
      <!--  -->
      <div id="package-list" class="col s12">
        <p>&nbsp;</p>
        <div class="center">
          <a class="btn-primary" href="create-package.php">Add Packages</a>
          <br>
        </div>
        <div class="row" id="packages">

        </div>
      </div>
      <!--  -->
      <div id="hotel-list" class="col s12">
        <p>&nbsp;</p>
        <div class="center">
          <a class="btn-primary" href="add-hotel.php">Add Hotel</a>
          <br>
        </div>
        <div class="row" id="hotels">

        </div>
      </div>
      <!--  -->
      <div id="modal-list" class="modal">
        <div class="modal-content">
          <h4>Traveller List</h4>
          <table></table>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
      </div>

    </div>
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
            load();
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
  <!-- =========================================================================================================================== -->
  <script>
    function load() {
      // =============== Fetching Guest List ================
      function openGuestList(tour) {
        $.ajax({
          url: "api/api_dashboard.php",
          type: "GET",
          data: {
            type: "guestList",
            packageID: tour
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            if (dataResult.statusCode == 200) {
              var table = `<thead><tr>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                        </tr></thead>
                        <tbody>`;
              dataResult.data.forEach((guest) => {
                table += `<tr> <td>${guest.name}</td> <td>${guest.age}</td> <td>${guest.gender}</td> </tr>`;
              })
              table += `</tbody>`

              $('table').html(table);
            }
            if (dataResult.statusCode == 201) {
              // $('body').html(errorTemplate);
            }

          }
        });
      }
      $(document).ready(function() {

        function getUpcomingTour(tour) {
          var template = `<div class="card review-package row">
                          <div class="card-image col l4 s12" style="padding: 0;">
                            <img src="${tour.photo}" alt="" style="height: 208px; border-radius: 8px 0 0 8px;">
                          </div>
                          <div class="card-content col l8 s12">
                            <div>
                              <p class="package-title">${tour.name}<span class="btn-acc right">${tour.duration}</span></p>
                            </div>
                            <p style="font-size: small;">Pick Up : <b>${tour.pickup}</b>, Drop Off : <b>${tour.dropoff}</b></p>
                            <br>
                              <a class="icon-con chip modal-trigger" style="color: #0B72EC;" href="#modal-list" onclick="openGuestList('${tour.id}')"> See Guest List </a>
                            <br>
                            <div>
                              <p>
                                <span class="chip" style="background-color: #0B72EC; color: #FCFCFC;">${tour.date}</span>
                                <span class="right chip" style="font-size: medium; line-height: 2;"><a href="#">Cancel</a></span>
                              </p>
                            </div>
                          </div>
                        </div>`;

          return template;
        }

        function setUpcomingData(data) {
          var tours = '';
          data.forEach((tour) => {
            tours += getUpcomingTour(tour);
          })
          $('#upcoming').html(tours);
        }

        function getCompletedTour(tour) {
          var template = `<div class="card review-package row">
                          <div class="card-image col l4 s12" style="padding: 0;">
                            <img src="${tour.photo}" alt="" style="height: 208px; border-radius: 8px 0 0 8px;">
                          </div>
                          <div class="card-content col l8 s12">
                            <div>
                              <p class="package-title">${tour.name}<span class="btn-acc right">${tour.duration}</span></p>
                            </div>
                            <p style="font-size: small;">Pick Up : <b>${tour.pickup}</b>, Drop Off : <b>${tour.dropoff}</b></p>
                            <br>
                              <a class="icon-con chip modal-trigger" style="color: #0B72EC;" href="#modal-list" onclick="openGuestList('${tour.id}')"> See Guest List </a>
                            <br>
                            <div>
                              <p>
                              <span class="chip right" style="color: #1D1D1D;">${tour.date}</span>
                              </p>
                            </div>
                          </div>
                        </div>`;

          return template;
        }

        function setCompletedData(data) {
          var tours = '';
          data.forEach((tour) => {
            tours += getCompletedTour(tour);
          })
          $('#completed').html(tours);
        }

        function getPackage(package) {
          var template = `<div class="col s12 l4">
            <div class="card package-card">
              <div class="card-image">
                <img src="${package.photo}" alt="">
              </div>
              <div class="card-content">
                <div>
                  <p class="package-title">${package.name.substring(0,25)}<span class="btn-acc right">${package.duration}</span></p>
                </div>
                <br>
                <p style="font-size: small;">Pickup: <b>${package.pickup}</b>, Drop Off: <b>${package.dropoff}</b></p>
                <br>
                <a href="" class="icon-con chip" style="color: #0B72EC;">
                  View
                </a>
                <a class="icon-con chip right" style="color: #e23028; background-color: #ffd9d7;" href="">
                  Delete
                </a>
                <br>
              </div>
            </div>
          </div>`;

          return template;
        }

        function setPackageData(data) {
          var packages = '<p>&nbsp;</p>';
          data.forEach((package) => {
            packages += getPackage(package);
          })
          $('#packages').html(packages);
        }

        function getHotel(hotel) {
          var template = `<div class="col s12 l4">
            <div class="card package-card">
              <div class="card-image">
                <img src="${hotel.photo}" alt="">
              </div>
              <div class="card-content">
                <div>
                  <p class="package-title">${hotel.name.substring(0,25)}</p>
                </div>
                <br>
                <p style="font-size: small;">Pickup: <b>${hotel.location}</b></p>
                <br>
                <a href="${hotel.link}" target="_blank" class="icon-con chip" style="color: #0B72EC;">
                  View
                </a>
                <a class="icon-con chip right" style="color: #e23028; background-color: #ffd9d7;" href="">
                  Delete
                </a>
                <br>
              </div>
            </div>
          </div>`;

          return template;
        }

        function setHotelData(data) {
          var hotels = '<p>&nbsp;</p>';
          data.forEach((hotel) => {
            hotels += getHotel(hotel);
          })
          $('#hotels').html(hotels);
        }

        // ============ Fetching Upcoming Data =============
        $.ajax({
          url: "api/api_dashboard.php",
          type: "GET",
          data: {
            type: "upcoming"
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            // console.log(dataResult);
            if (dataResult.statusCode == 200) {
              setUpcomingData(dataResult.data);
            }
            if (dataResult.statusCode == 201) {
              // $('body').html(errorTemplate);
            }

          }
        });

        // ============ Fetching Completed Data =============
        $.ajax({
          url: "api/api_dashboard.php",
          type: "GET",
          data: {
            type: "completed"
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            // console.log(dataResult);
            if (dataResult.statusCode == 200) {
              setCompletedData(dataResult.data);
            }
            if (dataResult.statusCode == 201) {
              // $('body').html(errorTemplate);
            }

          }
        });

        // ============ Fetching Package Data =============
        $.ajax({
          url: "api/api_dashboard.php",
          type: "GET",
          data: {
            type: "packages"
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            // console.log(dataResult);
            if (dataResult.statusCode == 200) {
              setPackageData(dataResult.data);
            }
            if (dataResult.statusCode == 201) {
              // $('body').html(errorTemplate);
            }

          }
        });

        // ============ Fetching Hotel Data =============
        $.ajax({
          url: "api/api_dashboard.php",
          type: "GET",
          data: {
            type: "hotels"
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            if (dataResult.statusCode == 200) {
              setHotelData(dataResult.data);
            }
            if (dataResult.statusCode == 201) {
              // $('body').html(errorTemplate);
            }

          }
        });
      })
    }
  </script>
</body>

</html>