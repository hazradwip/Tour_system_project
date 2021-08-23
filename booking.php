<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php';
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
  include 'navbar.php';
  ?>

  <!--=====================End of Navbar=================-->

  <div class="container">

    <p style="font-weight: 700;font-size:x-large;">Review Package</p>
    <hr>
    <!--============Package Details Box===================-->

    <div class="card review-package row">
      <div class="card-image col l4 s12">
        <img id="pimg" src="" alt="">
      </div>
      <div class="card-content col l8 s12">
        <div>
          <p class="package-title"></p>
        </div>
        <p style="font-size: small;">Pick Up : <b id="pickup"></b>, Drop Off : <b id="dropoff"></b></p>
        <br>
        <div class="icon-con"></div>
        <br>
        <div>
          <p>
            <span style="font-size: large; line-height: 2;"><b id="package-cost"></b><span style="font-size: small;">/person</span></span>
            <span class="chip right" style="background-color: #0B72EC; color: #FCFCFC;" id="travel-date"></span>
          </p>
        </div>
      </div>
    </div>
    <!--============ End of Package Details Box===================-->

    <hr>

    <!--============Contact iInformation=====================-->
    <p style="font-size: x-large;font-weight: 700;">Contact Information</p>

    <div>
      <table class="highlight">
        <thead>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th></th>
          </tr>
        </thead>

        <tbody id="table-body">
        </tbody>
      </table>
    </div>
    <br>

    <div class="form-container2">
      <form>
        <div class="row ">
          <div class="input-field center-align col s12 l4">
            <input id="name" type="text" class="validate" required>
            <label for="name">Full Name</label>
          </div>
          <div class="input-field center-align col s4 l2">
            <input id="age" type="text" class="validate" pattern="[0-9]{1|2}" required>
            <label for="age" style="margin-left: 2rem;">Age</label>
          </div>
          <div class="input-field center-align col s8 l3" style="display: flex;">
            <p><label>
                <input class="with-gap" name="gender" type="radio" value="Male" />
                <span>Male</span>
              </label></p>
            <p><label>
                <input class="with-gap" name="gender" type="radio" value="Female" />
                <span>Female</span>
              </label></p>
          </div>
          <div class="center col s6 offset-s3 l3" style="padding-top: 1.25rem;">
            <button type="button" class="btn-secondary" id="add-people-btn">Add People</button>
          </div>
        </div>
      </form>
    </div>
    <p>&nbsp;</p>
    <!--============ End Contact iInformation=====================-->

    <hr>
    <div class="row right-align cost">
      <div class="col s12 offset-l6 l6">
        <p>Travel Cost : ₹<span id="travel-cost">0</span></p>
      </div>
      <div class="col s12 offset-l6 l6">
        <p>Convenience fees : ₹<span id="conv-fees">0</span></p>
      </div>
    </div>
    <hr>
    <div class="row right-align cost">
      <div class="col s12 offset-l6 l6">
        <p>Total : ₹<span id="total-cost">0</span></p>
      </div>
    </div>
    <div class="row right-align">
      <button class="btn-primary center-align" style="display: none;" id="make-payment" onclick="makePayment()">Continue to pay</button>
    </div>
    <p>&nbsp;</p>


  </div>


  <?php
  include 'scripts.php';
  ?>

  <script>
    var userEmail = '';
    auth.onAuthStateChanged(user => {
      if (user) {
        setupNavLinks(user);
        userEmail = user.email;
      } else {
        setupNavLinks();
        window.location = "login.php"
      }
    })
  </script>
  <script>
    function getService(service) {
      var template = `<i class="${service}" id="ic"></i>`;
      return template
    }

    function setData(data) {

      $('#pimg').attr("src", data.coverPhoto);
      $('.package-title').html(data.packageName + '<span class="btn-acc right" id="duration">' + data.duration + '</span>');
      $('#pickup').html(data.pickup);
      $('#dropoff').html(data.dropoff);

      var services = '';
      data.services.forEach((service) => {
        services += getService(service);
      });
      $('.icon-con').html(services);

      $('#travel-date').html(data.travelDate);
      $('#package-cost').html('₹' + data.price);

      // console.log(userEmail);

    }

    var urlParams = new URLSearchParams(window.location.search);

    // ================= Fetching Data from API ===================
    var packageID = urlParams.get('packageID')
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


    var count = 1;
    var personArr = []

    document.getElementById('add-people-btn').addEventListener("click", () => {
      // event.preventDefault();

      var name = document.getElementById("name").value;
      var age = document.getElementById("age").value;
      var gender = document.getElementsByName("gender");
      var selectedGender;
      for (i = 0; i < gender.length; i++) {
        if (gender[i].checked)
          selectedGender = gender[i].value;
        gender[i].checked = false;
      }

      document.getElementById("name").value = "";
      document.getElementById("age").value = "";

      var node = `<tr id="person-${count}">
            <td>${name}</td>
            <td>${age}</td>
            <td>${selectedGender}</td>
            <td class="right"><button class="btn-accent" onclick="removePerson('person-${count}')">Remove</button></td>
          </tr>`

      var h = document.getElementById("table-body");
      h.insertAdjacentHTML("afterend", node);

      var id = "person-" + count;
      person = [id, name, age, selectedGender];
      personArr.push(person);
      updatePrice();

      count++;
    });

    function removePerson(id) {
      person = document.getElementById(id);
      person.style.display = 'none';

      var temp = [];
      for (var i = 0; i < personArr.length; i++) {

        if (personArr[i][0] != id) {
          temp.push(personArr[i]);
        }
      }

      personArr = temp;
      updatePrice();
    }

    function updatePrice() {
      var travelCost = document.getElementById("travel-cost");
      var convFees = document.getElementById("conv-fees");
      var totalCost = document.getElementById("total-cost");
      var packageCost = document.getElementById("package-cost").innerText.substr(1);

      var len = personArr.length;

      travelCost.innerHTML = packageCost * len;
      convFees.innerHTML = 50 * len;
      totalCost.innerHTML = (packageCost * len) + (50 * len);

      document.getElementById("make-payment").style.display = totalCost.innerHTML > 0 ? 'inline-block' : 'none';
    }

    function makePayment() {
      var price = document.getElementById("total-cost");
      var date = document.getElementById("travel-date");
      console.log(date, date.innerText)

      var data = {
        package_id: packageID,
        email: userEmail,
        date: date.innerText,
        price: price.innerText,
        status: 'upcoming',
        persons: personArr
      }

      // console.log(data);
      $.ajax({
        url: "api/api_book.php",
        type: "POST",
        data: data,
        cache: false,
        success: function(dataResult) {
          console.log(dataResult);
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if (dataResult.statusCode == 200) {
            console.log("Booking Confirm!", dataResult);

          } else if (dataResult.statusCode == 201) {
            console.log("Booking Failed", dataResult);
          }

        }
      });

      window.location = "my-account.php";
    }
  </script>
</body>

</html>