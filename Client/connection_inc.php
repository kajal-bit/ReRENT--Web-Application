<!-- eastablishes a connection with the database -->

<?php
  session_start();
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "ecom";

  $con=mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

  if (!$con) {
    die("Connection Failed: ".mysqli_connect_error());
  }
