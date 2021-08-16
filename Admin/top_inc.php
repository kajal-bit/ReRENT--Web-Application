<?php
  require('connection_inc.php');
  require('functions_inc.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- fontawesome links -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/regular.min.css">
    <link rel="stylesheet" href="css/solid.min.css">
    <link rel="stylesheet" href="css/sbg-with-js.min.css">
    <link rel="stylesheet" href="css/v4-shims.min.css">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <!-- css custom styles links -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand ml-1" href="dashboard.php">ReRENT</a>
      <a class="admin-logout-button" href="logout.php"><i class="fas fa-sign-out-alt"></i>  Log Out</a>
    </nav>
    <div class="row">
      <div class="col-md-2 navigation-menu">
        <ul class="nav-tabs flex-column nav ml-1 mt-4">
          <li class="nav-item"> <a class="nav-link" href="users.php">User Master</a></li>
          <li class="nav-item"> <a class="nav-link" href="categories.php">Categories Master</a> </li>
          <li class="nav-item"> <a class="nav-link" href="products.php">Products Master</a> </li>
          <li class="nav-item"> <a class="nav-link" href="orders.php">Order Master</a> </li>
          <li class="nav-item"> <a class="nav-link" href="contact_us.php">Queries</a></li>
          
        </ul>
      </div>

      <div class="col-md-10 main-panel">
