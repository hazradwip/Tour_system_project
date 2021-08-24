<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php'
  ?>
</head>

<body>

  <!-- Navbar -->
  <?php
  include 'navbar.php'
  ?>
  <!--==================Image and booking container===============-->
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h5 class="package-name">City Name</h5>
        <h6 class="package-places">Package Places</h6>
      </div>
    </div>

    <div class="row">
      <div class="col l9 s12">
        <img class="pimg" src="">
        <a id="view-gallery" href="" target="_blank">
          <h4 id="bottom-left" style="text-decoration: underline; text-shadow: 0 2px 10px rgb(0 0 0);">View All images</h4>
        </a>
      </div>

      <div class="col l3 s12">
        <div class="booking-window" id="">
          <div id="price">
            <span>₹52,000</span> per person
            <br>
            <br>
            (Including all taxes.)
          </div>
          <div>
            <h5 style="text-align: center;">
              <br>
              Travel Dates
            </h5>
          </div>
          <div>
            <span class="chip" id="travel-date">5th June,21</span>
          </div>
          <br>
          <div>
            <button class="btn-primary center-align" id="book-now">Book Now</button>
          </div>
          <br>
        </div>
      </div>
    </div>

    <!--==============Package includes container========r-->
    <div class="container" id="package-inc">
      <div class="row">
        <div class="col s12">
          <h5>Package Includes</h5>
        </div>
      </div>

      <div class="row">
        <div class="col l2 s4 center-align">
          <i class="icon"><img src="./images/icons/airplane.svg" alt="" /></i><br>
          <span>Flights</span>
        </div>
        <div class="col l2 s4 center-align">
          <i class="icon"><img src="./images/icons/binoculars.svg" alt="" /></i><br>
          <span>Sightseens</span>
        </div>
        <div class="col l2 s4 center-align">
          <i class="icon"><img src="./images/icons/hotel.svg" alt="" /></i><br>
          <span>Hotels</span>
        </div>
        <div class="col l2 s4 center-align">
          <i class="icon"><img src="./images/icons/car.svg" alt="" /></i><br>
          <span>Transfers</span>
        </div>
        <div class="col l2 s4 center-align">
          <i class="icon"><img src="./images/icons/dinner.svg" alt="" /></i><br>
          <span>Meals</span>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col s12 l5 offset-l1">
          <i class="far fa-clock"></i>
          <span style="padding-left: 5px;" id="duration"> Package Duration : 3 Days & 4 Nights </span>
        </div>
        <div class="col s6 l3">
          <i class="fas fa-map-marker-alt"></i>
          <span id="pickup">Pick Up : Howrah</span>
        </div>
        <div class="col s6 l3">
          <i class="fas fa-map-marker-alt"></i>
          <span id="dropoff">Drop tp : Howrah</span>
        </div>

      </div>

    </div>



    <!--======================tabs==============-->

    <p>&nbsp;</p>
    <div class="row">
      <div class="col s12">
        <ul id="tabs" class="tabs">
          <li class="tab col s3"><a href="#day-info">Day Wise Activity</a></li>
          <li class="tab col s3"><a href="#hotel-info">Hotel Details</a></li>
          <li class="tab col s3"><a href="#additional-info">Additional Information</a></li>
        </ul>
      </div>

      <!--==================================test swipe 1==========================================-->

      <hr>
      <div id="day-info" class="col s12" style="display: flex;">
        <div class="timeline">
        </div>
      </div>
    </div>
    <!--==================================test swipe 2============================================-->
    <div id="hotel-info" class="col s12 ">
    </div>
    <!--=============test swipe 3==================================-->
    <div id="additional-info" class="col s12 ">

    </div>
  </div>


  <?php
  include 'footer.php'
  ?>
  <?php
  include 'scripts.php';
  ?>
  <script>
    auth.onAuthStateChanged(user => {
      if (user) {
        setupNavLinks(user);
      } else {
        setupNavLinks();
      }
    })
  </script>
  <script>
    $(document).ready(function() {
      // console.log(urlParams);

      var errorTemplate = `<div class="center"><h5>There is something error in loading details.</h5></div>
                            <p>&nbsp;</p><div><a href="/">Go to Home Page</a><div>`;

      function getDayActivity(activity) {
        var template = `<div class="timeline-container primary">
            <div class="timeline-icon">
              <i class="far fa-check-circle"></i>
            </div>
            <div class="timeline-body">
              <div class="timeline-title"><span class="day-badge">Day ${activity.day}</span></div>
              <p>${activity.description}</p>
            </div>
          </div>`

        return template;
      }

      function getHotel(hotel) {
        var template = `<div class="row">
          <div class="col l5 s12">
            <img id="tab-image" src="${hotel.image}">
          </div>
          <div class="col l7 s12">
            <h5>${hotel.name}</h5>
            <i class="fas fa-map-marker-alt"></i>
            <span>${hotel.location}</span>&emsp;
            <i class="fas fa-link"></i>
            <a href="${hotel.link}" target="_blank" style="color:#1d1d1d;">See Hotel Page</a>
            <br>
            <br>
            <span>${hotel.description.substring(0,500)}...</span>
          </div>
        </div>`

        return template;
      }

      function setData(data) {
        $('.package-name').html(data.packageName);
        $('.package-places').html(data.packagePlaces);
        $('.pimg').attr("src", data.coverPhoto);
        $('#view-gallery').attr("href", "gallery.php?packageID="+data.packageID);

        // console.log(document('#price'))
        $('#price').html('<span>₹' + data.price + '</span> per person <br> <br> (Including all taxes.)');
        $('#travel-date').html(data.travelDate);

        $('#duration').html('Package Duration : ' + data.duration);
        $('#pcikup').html('Pick Up : ' + data.pickup);
        $('#dropoff').html('Drop Off : ' + data.dropoff);

        var activities = '';
        data.activities.forEach((activity) => {
          activities += getDayActivity(activity);
        });
        $('.timeline').html(activities);

        var hotels = '';
        data.hotels.forEach((hotel) => {
          hotels += getHotel(hotel);
        });
        $('#hotel-info').html(hotels);

      }

      var urlParams = new URLSearchParams(window.location.search);

      // ================= Fetching Data from API ===================
      var packageID = urlParams.get('packageID')
      console.log(packageID)
      $.ajax({
        url: "api/api_package.php",
        type: "GET",
        data: {
          packageID: packageID
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if (dataResult.statusCode == 200) {
            setData(dataResult.data);

          } else if (dataResult.statusCode == 201) {
            $('body').html(errorTemplate);
          }

        }
      });

      $('#book-now').click(() => {
        window.location = "booking.php?packageID=" + packageID;
      });

    });
  </script>
</body>

</html>