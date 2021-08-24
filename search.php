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

  <!--=====================Search Contents==================-->
  <p>&nbsp;</p>
  <div class="container">
    <form class="center-align search_con" id="search-package-form">
      <div class="row">
        <div class="input-field col l4 s12" id="input-from">
          <input id="from-city" type="text" class="validate" required>
          <label for="from-city">From City <i class="fas fa-map-marker-alt right"></i></label>
        </div>
        <div class="col l2 s12" style="font-size: 1.25rem; padding-top: 1.55rem; color: #CCCCCC;">
          <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="input-field col l4 s12" id="input-to">
          <input id="destination-city" type="text" class="validate" required>
          <label for="destination-city">To City <i class="fas fa-map-marker-alt right"></i></label>
        </div>
        <div class="col l2 s12" style="padding-top: 1.25rem;">
          <button id="search-package-btn" class="btn-primary center-align">Search</button>
        </div>
      </div>
    </form>
    <!--=========End of search content====================-->

    <!--==================Search Result========================-->

    <p>&nbsp;</p>
    <div class="search-filter-heading">
      <span>Search Results</span>

      <!--=========Modal Trigger===========-->
      <a class="modal-trigger" href="#search-filters">
        <i class="fas fa-sliders-h"></i> Filter Result
      </a>
      </h5>
    </div>
    <!--==========Modal body==============-->
    <div id="search-filters" class="modal">
      <div class="modal-content">
        <p style="font-weight: 800;">Filter Search Result</p>
        <div class="row">
          <div class="col l6 s12">
            <span>Budget ($2000-$10000)</span>
            <div id="budget-slider"></div>
          </div>
          <div class="col l6 s12">
            <span>Duration (2N-$10N)</span>
            <div id="duration-slider"></div>
          </div>
          <div class="col l6 s12">
            <span>Hotel Quality</span><br>
            <a href="" class="chip">3 <i class="fas fa-star"></i></a>
            <a href="" class="chip">4 <i class="fas fa-star"></i></a>
            <a href="" class="chip">5 <i class="fas fa-star"></i></a>
          </div>
          <div class="col l6 s12">
            <span>Sort By</span><br>
            <a href="" class="chip">Popularity</a>
            <a href="" class="chip">Price</a>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close btn-flat">Cancel</a>
        <a href="#!" class="modal-close btn-primary">Apply</a>
      </div>
    </div>

    <hr>

    <!-- ============ Package List =============== -->
    <div class="row" id="search-result">

      <div class="col s12 l6 offset-l3">
        <div class="center">
          <p>&nbsp;</p>
          <i class="far fa-frown-open" style="font-size: 8rem; color: #CCCCCC;"></i><br><br>
          <h6>Sorry! You have to enter From and Destination City.</h6>
        </div>
      </div>

    </div>
    <p>&nbsp;</p>

    <p class="center" style="font-weight: 600;">Don't like this packages? <span style="color: var(--primary);text-decoration: underline;">See our trending packages.</span></p>

    <p>&nbsp;</p>

  </div>


  <!--==================End Search Result========================-->

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
  </script>
  <script>
    var budgetSlider = document.getElementById('budget-slider');

    noUiSlider.create(budgetSlider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });

    var durationSlider = document.getElementById('duration-slider');

    noUiSlider.create(durationSlider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });

    function getServices(services) {
      var template = '';
      services.forEach((service) => {
        template += `<i class="${service}" id="ic"></i>`;
      })
      return template;
    }

    function getPackage(package) {
      var template = `<div class="col l4 s12">
                        <div class="card package-card">
                          <div class="card-image">
                            <img src="${package.photo}" alt="">
                          </div>
                          <div class="card-content">
                            <div>
                              <p class="package-title">${package.name.substring(0,25)}<span class="btn-acc right">${package.duration}</span></p>
                            </div>
                            <p style="font-size: small; height: 38px;">${package.places.substring(0,80)}</p>
                            <br>
                            <div class="icon-con">${getServices(package.services)}</div>
                            <br>
                            <div>
                              <p>
                                <span style="font-size: large; line-height: 2;"><b>₹${package.price}</b><span style="font-size: small;">/person</span></span>
                                <span>
                                    <a href="package-details.php?packageID=${package.id}" class="btn-primary right">Book Now</a>
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>`;
      return template;
    }

    function setData(packages) {
      var html = '';
      packages.forEach((package) => {
        html += getPackage(package);
      })

      $('#search-result').html(html);
    }

    function fetchSearchResult(fromCity, destinationCity, options) {
      $.ajax({
        url: "api/api_search.php",
        type: "GET",
        data: {
          fromCity: fromCity,
          destinationCity: destinationCity
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          // console.log(dataResult);
          if (dataResult.statusCode == 200) {
            setData(dataResult.data);
          } else if (dataResult.statusCode == 201) {
            var html = `<div class="col s12 l6 offset-l3">
                          <div class="center">
                            <p>&nbsp;</p>
                            <i class="far fa-frown-open" style="font-size: 8rem; color: #CCCCCC;"></i><br><br>
                            <h6>Sorry! We do not have this tour package right now. We are trying to add this package as soon as
                              possible.</h6>
                          </div>
                        </div>`;
            $('#search-result').html(html);
          }

        }
      });
    }

    $('document').ready(function() {
      var urlParams = new URLSearchParams(window.location.search);

      // ================= Fetching Data from API ===================
      var fromCity = urlParams.get('fromCity');
      var destinationCity = urlParams.get('destinationCity');

      if (destinationCity && fromCity) {
        fetchSearchResult(fromCity, destinationCity, {});
      }

    });

    const searchPackageForm = document.querySelector('#search-package-form');
    searchPackageForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const fromCity = searchPackageForm['from-city'].value;
      const destinationCity = searchPackageForm['destination-city'].value;
      // console.log(fromCity, destinationCity)
      fetchSearchResult(fromCity, destinationCity, {});
    });
  </script>


</body>

</html>