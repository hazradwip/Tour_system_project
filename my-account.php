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

  <div class="container">

    <p>&nbsp;</p>
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a class="active" href="#upcoming">Upcoming Trips</a></li>
          <li class="tab col s3"><a href="#completed">Booking History</a></li>
        </ul>
      </div>
      <div id="upcoming" class="col s12">
        <div class="center">
          <h6>No Upcoming Trips</h6>
        </div>
      </div>
    </div>
    <div id="completed" class="col s12">
    <div class="center">
          <h6>No Booking History</h6>
        </div>
    </div>
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

  <hr>
  <?php
  include 'scripts.php';
  ?>
  <script>
    let userEmail = '';
    auth.onAuthStateChanged(user => {
      if (user) {
        setupNavLinks(user);
        getData(user.email);
      } else {
        setupNavLinks();
        window.location = "login.php"
      }
    })

    function openGuestList(bookingId) {
      $.ajax({
        url: "api/api_accountdata.php",
        type: "GET",
        data: {
          type: "guestList",
          bookingID: bookingId
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

    function getUpcomingTour(tour) {
      var template = `<div class="card review-package row">
                          <div class="card-image col l4 s12" style="padding: 0;">
                            <img src="${tour.photo}" alt="" style="height: 208px; border-radius: 8px 0 0 8px;">
                          </div>
                          <div class="card-content col l8 s12">
                            <div>
                              <p class="package-title">${tour.name}<span class="btn-acc right">${tour.duration}</span></p>
                            </div>
                            <p style="font-size: small;">${tour.places}</p>
                            <p style="font-size: small;">Pick Up : <b>${tour.pickup}</b>, Drop Off : <b>${tour.dropoff}</b></p>
                            <br>
                            <a class="icon-con chip modal-trigger" style="color: #0B72EC;" href="#modal-list" onclick="openGuestList('${tour.booking_id}')"> See Guest List </a>
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

    function getBookings(tour) {
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
                          <a class="icon-con chip modal-trigger" style="color: #0B72EC;" href="#modal-list" onclick="openGuestList('${tour.booking_id}')"> See Guest List </a>
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

    function setUpcomingData(data) {
      var tours = '';
      data.forEach((tour) => {
        tours += getUpcomingTour(tour);
      })
      $('#upcoming').html(tours);
    }

    function setBookingsData(data) {
      var tours = '';
      data.forEach((tour) => {
        tours += getBookings(tour);
      })
      $('#completed').html(tours);
    }


    // ============ Fetching Upcoming Data =============
    function getData(userEmail) {
      // console.log(userEmail)
      $.ajax({
        url: "api/api_accountdata.php",
        type: "GET",
        data: {
          type: "upcoming",
          email: userEmail
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

      $.ajax({
        url: "api/api_accountdata.php",
        type: "GET",
        data: {
          type: "bookings",
          email: userEmail
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          // console.log(dataResult);
          if (dataResult.statusCode == 200) {
            setBookingsData(dataResult.data);
          }
          if (dataResult.statusCode == 201) {
            // $('body').html(errorTemplate);
          }
        }
      });

    }
  </script>
</body>

</html>