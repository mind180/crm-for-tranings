
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Welcome</title>
  <link rel="stylesheet" type="text/css" href="../templates/css/login.css" ></link>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>

  <div class="page-container">

    <div class="login-container">

      <div class="login-box">
        <form action="/user" method="POST">

          <label>
            <p style="color: red" >
              <?php if(isset($errors)) echo array_shift($errors) ?>
            </p>
          </label>

          <label>
            <p>Username</p>
            <input name="username" type="text" value="<?php if(isset($_COOKIE['login'])) { echo $_COOKIE['login']; }  ?>">
          </label>

          <label>
            <p>Password</p>
            <input name="password" type="password" value="<?php if(isset($_COOKIE['password'])) { echo $this->decryptCookie($_COOKIE['password']); }  ?>">
          </label>

          <label>
            <p><input name="do_login" type="submit" value="Log In"></p>
          </label>

          <label class="remember-checkbox">
            <input name="remember_me" type="checkbox" >
            Remember me
          </label>

        </form>

        <p><a href="#">Forgot Your Password?</a></p>

      </div>

      <div class="registration-info">
        <span>Not registered yet?</span>
        <button id="reg_btn" name="do_registration" value="Registration">Registration</button>
      </div>


    </div>
    <div class="info-container">


    </div>

  </div>

  <script type="text/javascript" src="./templates/js/loginController.js"></script>
</body>
</html>
