<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php';
  ?>
</head>

<body>

  <!-- Navbar -->
  <?php
  include 'navbar.php';
  ?>
  <p>&nbsp;</p>



  <div class="container">

    <form action="" class="card center-align" id="signup-form">
      <div class="card-content">
        <h5>Create your Account</h5>
        <div class="row ">
          <div class="input-field">
            <input id="name" type="text" class="validate" required>
            <label for="name">Full Name <i class="fas fa-signature right"></i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field center-align ">
            <input id="email" type="email" class="validate" required>
            <label for="email">Email <i class="fas fa-envelope right"></i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field center-align  ">
            <input id="phone" type="text" class="validate" pattern="[0-9]{10}" required>
            <label for="phone">Mobile No. <i class="fas fa-phone right"></i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field  center-align">
            <input id="password" type="password" class="validate" required>
            <label for="password">Password <i class="fas fa-lock right"></i></label>
          </div>
        </div>
        <button class="btn-primary center-align" id="sign-up-btn">Sign Up</button>
      </div>
      <div id="status-msg" style="color: #F14C4C;"></div>
      <br>
      <span>Already have an account? <a href="login.php" style="text-decoration: underline;">Let's Login</a></span>
    </form>
  </div>




  <p>&nbsp;</p>

  <?php
  include 'footer.php';
  ?>

  <?php
  include 'scripts.php';
  ?>
  <script>
    const signupForm = document.querySelector('#signup-form');
    signupForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // get user info
      const email = signupForm['email'].value;
      const password = signupForm['password'].value;

      const signUpBtn = document.querySelector('#sign-up-btn');
      signUpBtn.innerText = 'Signing Up...';
      signUpBtn.disabled = true;
      signUpBtn.style.backgroundColor = '#fff';
      signUpBtn.style.color = '#0B72EC';
      signUpBtn.style.boxShadow = 'none';

      // sign up the user
      auth.createUserWithEmailAndPassword(email, password).then(cred => {
        // console.log(cred.user);
        return db.collection('users').doc(cred.user.uid).set({
          name: signupForm['name'].value,
          email: signupForm["email"].value,
          phone: signupForm["phone"].value
        })
      }).then(() => {
        // close the signup modal & reset form
        signupForm.reset();
        window.location = "index.php";
      }).catch((err) => {
        // console.log(err.message)
        document.querySelector('#status-msg').innerHTML = err.message;
        signUpBtnBtn.innerText = 'Sign Up';
        signUpBtnBtn.disabled = false;
        signUpBtnBtn.style.backgroundColor = '#0B72EC';
        signUpBtnBtn.style.color = '#fff';
        signUpBtnBtn.style.boxShadow = '0 2px 10px rgb(0 0 0 / 30%)';
      });

    });
    $(document).ready(function() {
      document.getElementById('nav-mobile').style.display = 'none';
    })
  </script>
</body>

</html>