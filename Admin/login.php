<?php
  require('connection_inc.php');  /*includes the files*/
  require('functions_inc.php');
  $msg="";

/*gets the value from user and validates with the database*/

  if(isset($_POST['submit'])){
    $username=get_value($con,$_POST['Username']);
    $password=get_value($con,$_POST['Password']);
    $sql="select * from admin_users where username='$username' and password='$password'";
    $exec=mysqli_query($con,$sql);
    $count=mysqli_num_rows($exec);
    if($count>0){
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('location:dashboard.php');
      die();
    } else{
      $msg="Please Enter Valid login credentials*";
    }
  }
?>

<!--__________________________________________________________ -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <title>Admin Login</title>
  </head>
  <body id="login-body">
    <div class="loginBlock">
      <form class="" method="post">
        <h1>LOGIN</h1>
        <label>Username</label>
        <br>
        <input class="inputField" type="text" name="Username" placeholder="Enter Username" required>
        <br>
        <label>Password</label>
        <br>
        <input class="inputField" type="password" name="Password" placeholder="Enter Password" required>
        <br><br><br>
        <button class="login-btn btn btn-outline-light" type="submit" name="submit">Submit</button>
        <br>
        <span class="login-error"><?php echo $msg ?></span>
      </form>
    </div>
  </body>
</html>
