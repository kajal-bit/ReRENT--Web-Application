<?php
  ob_start();
  require('top2_inc.php');

  $successmsg = "";
  $errormsg = "";
  if (isset($_POST['signupButton'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where username=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: login.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, 's', $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      $resultcheck = mysqli_stmt_num_rows($stmt);

      if ($resultcheck > 0) {
        header("Location:login.php?error=usernametaken");
        exit();
      } else {
        $sql = "INSERT INTO users (username, email, password) value (?, ?, ?)";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: login.php?error=sqlerror");
          exit();
        } else {
          $passHashed = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $passHashed);
          mysqli_stmt_execute($stmt);
          header("Location:login.php?signup=success");
          die();
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
  }

  if (isset($_GET['signup'])  && $_GET['signup']!='') {
    $signup = get_value($con, $_GET['signup']);
    if ($signup == 'success') {
      $successmsg = "You have been successfully signed up to ReRENT";
    }
  }

  if (isset($_GET['error'])  && $_GET['error']!='') {
    $error = get_value($con, $_GET['error']);
    if ($error == 'sqlerror') {
      $errormsg = "OOPS! There was a problem accessing the database. Please contact the Administrator.";
    } elseif ($error == 'usernametaken') {
      $errormsg = "The UserName is already taken. Please try something else.";
    }
  }

  if (isset($_POST['loginButton'])) {

    $username = get_value($con, $_POST['username']);
    $password = get_value($con, $_POST['password']);

    $sql = "SELECT * FROM users where username=? OR email=?";

    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header('Location:login.php?error=sqlerror');
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $passcheck = password_verify($password, $row['password']);
        if ($passcheck == false) {
          header('Location:login.php?error=wrongpassword');
          exit();
        } elseif ($passcheck == true) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['userid'] = $row['id'];
          header('Location:index.php?login=success');
          exit();
        }
      } else {
        header('Location:login.php?error=nouser');
        exit();
      }
    }
  }
?>


<div class="container login-container">
  <span class="signup-success"><?php echo $successmsg ?></span>
  <span class="error"><?php echo $errormsg ?></span>
    <div class="row">
    <div class="col-md-5">
      <h3>Login</h3>
      <form method="post">
			<div class="form-group login-form-elements">
		    <label>UserName<span></span></label>
		    <input type="text" name="username" placeholder="" required="required">
			</div>
			<div class="form-group login-form-elements">
		    <label>Password<span></span></label>
		    <input type="password" name="password" placeholder="" required="required">
			</div>
      <div class="form-group login-form-elements">
		    <button class="btn" type="submit" name="loginButton">Login</button>
			</div>
    </form>
		</div>

    <div class="col-md-1">
			<h3>OR</h3>
		</div>

    <div class="col-md-5">
      <h3>Sign-up</h3>
      <form method="post">
      <div class="form-group login-form-elements">
        <label>UserName<span></span></label>
        <input type="text" name="username" placeholder="" required="required">
      </div>
      <div class="form-group login-form-elements">
        <label>E-Mail<span></span></label>
        <input type="email" name="email" placeholder="" required="required">
      </div>
      <div class="form-group login-form-elements">
        <label>Password<span></span></label>
        <input type="password" name="password" placeholder="" required="required">
      </div>
      <div class="form-group login-form-elements">
		    <button class="btn" type="submit" name="signupButton">Sign-Up</button>
			</div>

      </form>
    </div>

  </div>
  </div>
  </body>
</html>
<?php
require('footer_inc.php')
?>
