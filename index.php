<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php';
  ?>
</head>

<body>

  <?php
  include 'navbar.php';
  ?>

  <!-- Slider Images -->
  <div class="slider center-align">
    <ul class="slides center-align">
      <li>
        <img src="./images/slider/slider_kedarkanth.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Kedarkanth</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
      <li>
        <img src="./images/slider/slider_manali.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Manali</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
      <li>
        <img src="./images/slider/slider_gangtok.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Gangtok</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
      <li>
        <img src="./images/slider/slider_arunachal.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Arunachal Pradesh</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
      <li>
        <img src="./images/slider/slider_maolinlong.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Meghalaya</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
      <li>
        <img src="./images/slider/slider_kerala.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Kerala</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
      <li>
        <img src="./images/slider/slider_andaman.jpg"> <!-- random image -->
        <div class="caption left-align">
          <span class="slider-text">Trending Package</span>
          <h4 class="slider-text">Andaman</h4><br>
          <a class="slider-text btn-primary" href="">Let's Visit</a>
        </div>
      </li>
    </ul>
  </div>
  <!-- End of Slider Images -->

  <div class="container">

    <div class="card center-align" id="search-package">
      <h5 class="center-align">Search Packages</h5>
      <form class="center-align" id="search-package-form">
        <div class="row">
          <div class="input-field col l5 s12" id="input-from">
            <input id="from-city" type="text" class="validate" required>
            <label for="from-city">From City <i class="fas fa-map-marker-alt right"></i></label>
          </div>
          <div class="col l2 s12">
            <i class="fas fa-exchange-alt"></i>
          </div>
          <div class="input-field col l5 s12" id="input-to">
            <input id="destination-city" type="text" class="validate" required>
            <label for="destination-city">To City <i class="fas fa-map-marker-alt right"></i></label>
          </div>
        </div>
        <button class="btn-primary center-align" type="submit" id="search-package-btn">Search</button>
      </form>
    </div>

    <p>&nbsp;</p>

    <!-- ========= Covid-19 Safety ========== -->
    <div class="covid-container">
      <div class="row">
        <div class="col l2 s12 covid-rules">
          <h5>Before Travelling Follow <span style="color: #F14C4C;">COVID-19</span> Rules</h5>
        </div>
        <div class="col l8 s12">
          <div class="covid-boxes">
            <img class="covid-box" src="./images/covid_image/covid1.png" alt="">
            <img class="covid-box" src="./images/covid_image/covid2.png" alt="">
            <img class="covid-box" src="./images/covid_image/covid3.png" alt="">
          </div>
        </div>
        <div class="col l2 s12 covid-rules">
          <button class="btn-secondary">See all Rules</button>
        </div>
      </div>
    </div>
    <!-- ========= End of Covid-19 Safety ========== -->

    <p>&nbsp;</p>

    <!-- ========= Trending Places =========== -->
    <h5>Our Best Selling Packages</h5>
    <hr>
    <div class="row">

      <div class="col l4">
        <div class="card small package-card">
          <div class="card-image">
            <img src="./images/gangtok.jpg" alt="">
          </div>
          <div class="card-content">
            <h6>Gangtok</h6>
            <span>Starting from <b>₹15000</b></span>
            <button class="btn-accent right">Explore</button>
          </div>
        </div>
      </div>

      <div class="col l4">
        <div class="card small package-card">
          <div class="card-image">
            <img src="./images/ooty.png" alt="">
          </div>
          <div class="card-content">
            <h6>Ooty</h6>
            <span>Starting from <b>₹15000</b></span>
            <button class="btn-accent right">Explore</button>
          </div>
        </div>
      </div>

      <div class="col l4">
        <div class="card small package-card">
          <div class="card-image">
            <img src="./images/Kedarnath.jpg" alt="">
          </div>
          <div class="card-content">
            <h6>Kedarkanth</h6>
            <span>Starting from <b>₹15000</b></span>
            <button class="btn-accent right">Explore</button>
          </div>
        </div>
      </div>

      <div class="center-align">
        <button class="btn-secondary">See More</button>
      </div>
    </div>

    <!-- ========= End of Trending Places =========== -->


    <!--===========Trip form===========-->
    <p>&nbsp;</p>
    <hr>
    <div class="form-container">
      <h5>Want to go for a <span style="color: #0B72EC; font-weight: 700;">Memorable Trip?</span></h5>
      <span>Provide your details to know about best
        holiday deals.</span>

      <form action="" class="center-align">
        <div class="row ">
          <div class="input-field col l4 s12">
            <input id="custom-dest" type="text" class="">
            <label for="custom-dest">Your Destination<i class="fas fa-map-marker-alt right"></i></label>
          </div>
          <div class="input-field col l4 s12">
            <input id="custom-date" type="text" class="datepicker">
            <label for="custom-date">Date of departure<i class="fas fa-calendar-alt right"></i></label>
          </div>
          <div class="input-field col l4 s12">
            <input id="custom-city" type="text" class="">
            <label for="custom-city">From City</label>
          </div>
        </div>
        <div class="row ">
          <div class="input-field col l4 s12">
            <input id="custom-name" type="text" class="">
            <label for="custom-name">Your Name</label>
          </div>
          <div class="input-field col l4 s12">
            <input id="custom-email" type="email" class="validate">
            <label for="custom-email">Email Id</label>
          </div>
          <div class="input-field col l4 s12">
            <input id="custom-phone" type="text" class="validate" pattern="[0-9]{10}">
            <label for="custom-phone">Phone No.</label>
          </div>
        </div>
        <div class="center-align">
          <button class="btn-primary center-align" id="search-package-btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>





  <!-- ========= Footer =========== -->
  <?php
  include 'footer.php';
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

    const searchPackageForm = document.querySelector('#search-package-form');
    searchPackageForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const fromCity = searchPackageForm['from-city'].value;
      const destinationCity = searchPackageForm['destination-city'].value;
      window.location = "/travellopia/search.php?fromCity=" + fromCity + "&destinationCity=" + destinationCity;
    });
  </script>
</body>

</html>