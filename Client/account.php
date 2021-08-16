<?php
require('top2_inc.php');

if (isset ($_SESSION['username'])) {
  $userid = $_SESSION['userid'];
  $sql = "SELECT * FROM users WHERE id=$userid";
  $res = mysqli_query($con, $sql);
  if (mysqli_num_rows($res)>0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $username = $row['username'];
      $firstname = $row['first_name'];
      $lastname = $row['last_name'];
      $email = $row['email'];
      $mobile = $row['mobile'];
      $address = $row['address'];
    }
  }

  if (isset ($_POST['Savebtn'])) {
    $username = get_value($con, $_POST['username']);
    $firstname = get_value($con, $_POST['firstName']);
    $lastname = get_value($con, $_POST['lastName']);
    $email = get_value($con, $_POST['email']);
    $mobile = get_value($con, $_POST['mobile']);
    $address = get_value($con, $_POST['address']);
    $upsql = "UPDATE users SET username='$username',first_name='$firstname',last_name='$lastname',email='$email',mobile='$mobile',address='$address' WHERE id=$userid";
    $res = mysqli_query($con, $upsql);
    echo"<script>
      alert('Your data has beed successfully saved');
      window.location.href='account.php';
    </script>";
  }
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
            <li class="active"><a href="account.php">Account</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<div class="container login-container">
  <span class="signup-success"></span>
  <span class="error"></span>
    <div class="row">
    <div class="col-md-6">
      <h3>My Account</h3>
      <form method="post">

      <div class="form-group login-form-elements">
        <label>UserName<span></span></label>
        <input type="text" name="username" placeholder="" required="required" value="<?php echo $username ?>">
      </div>

      <div class="form-group login-form-elements">
        <label>First Name<span></span></label>
        <input type="text" name="firstName" placeholder="" value="<?php echo $firstname ?>">
      </div>

      <div class="form-group login-form-elements">
        <label>Last Name<span></span></label>
        <input type="text" name="lastName" placeholder="" value="<?php echo $lastname ?>">
      </div>

      <div class="form-group login-form-elements">
        <label>E-Mail<span></span></label>
        <input type="text" name="email" placeholder="" value="<?php echo $email ?>">
      </div>

      <div class="form-group login-form-elements">
        <label>Mobile<span></span></label>
        <input type="text" name="mobile" placeholder="" value="<?php echo $mobile ?>">
      </div>

      <div class="form-group login-form-elements">
        <label>Address<span></span></label>
        <textarea name="address" rows="5" cols="100"><?php echo $address ?></textarea>
      </div>

      <div class="form-group login-form-elements">
        <button class="btn" type="submit" name="Savebtn">Save</button>
      </div>
    </form>
    </div>


  </div>
  </div>
  </body>
</html>

<?php
} else {
  echo"<script>
    alert('Login to continue');
    window.location.href='login.php';
   </script>";
}
  require('footer_inc.php');
?>
