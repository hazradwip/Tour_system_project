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

  <!--==========Log In=============-->
  <p>&nbsp;</p>
  <div class="container">
    <form action="" class="card center-align" id="login-form">
      <div class="card-content">
        <h5 class="center-align">Login to your Account</h5>
        <div class="row">
          <div class="input-field center-align  ">
            <input id="user-email" type="email" class="validate">
            <label for="user-email">Email <i class="fas fa-envelope right"></i></label>
          </div>
        </div>

        <div class="row">
          <div class="input-field center-align">
            <input id="user-password" type="password" class="validate">
            <label for="user-password">Password <i class="fas fa-lock right"></i></label>
          </div>
        </div>

        <div>
          <button class="btn-primary center-align" id="login-btn">Login</button>
        </div>
        <br>
        <div id="status-msg" style="color: #F14C4C;"></div>
        <a href="">Forgot password?</a>
        <p>&nbsp;</p>
      </div>
      <span>Don't have an account? <a href="signup.php" style="text-decoration: underline;">Let's Sign Up</a></span>
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
    const loginForm = document.querySelector('#login-form');
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // get user info
      const email = loginForm['user-email'].value;
      const password = loginForm['user-password'].value;

      const loginBtn = document.querySelector('#login-btn');
      loginBtn.innerText = 'Loggin In...';
      loginBtn.disabled = true;
      loginBtn.style.backgroundColor = '#fff';
      loginBtn.style.color = '#0B72EC';
      loginBtn.style.boxShadow = 'none';

      // log the user in
      auth.signInWithEmailAndPassword(email, password).then((cred) => {
        // console.log(cred.user);
        loginForm.reset();
        window.location = "dashboard.php";
      }).catch((err) => {
        // console.log(err.message)
        document.querySelector('#status-msg').innerHTML = err.message;
        loginBtn.innerText = 'Log In';
        loginBtn.disabled = false;
        loginBtn.style.backgroundColor = '#0B72EC';
        loginBtn.style.color = '#fff';
        loginBtn.style.boxShadow = '0 2px 10px rgb(0 0 0 / 30%)';
      });

    });
  </script>
</body>

</html>