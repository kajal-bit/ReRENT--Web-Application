<!-- gets a value and trims off the whitespace -->

<?php
  function get_value($con,$str){
    if($str!=""){
      $str=trim($str);
      return mysqli_real_escape_string($con,$str);
    }
  }
?>
