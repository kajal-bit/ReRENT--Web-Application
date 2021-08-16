<!-- gets a value and trims off the whitespace -->

<?php
  function get_value($con,$str){
    if($str!=""){
      $str=trim($str);
      return mysqli_real_escape_string($con,$str);
    }
  }

  function get_mens_product($con, $limit=''){
    $sql="select * from products where category='mens' AND status=1 order by id desc";

    if($limit!=''){
      $sql.=" limit $limit";
    }
    $res=mysqli_query($con, $sql);
    $data=array();

    while($row=mysqli_fetch_assoc($res)){
      $data[]=$row;
    }
    return $data;
  }

  function get_womens_product($con, $limit=''){
    $sql="select * from products where category='womens' AND status=1 order by id desc";

    if($limit!=''){
      $sql.=" limit $limit";
    }

    $result=mysqli_query($con, $sql);
    $data=array();
    if($result){
    while($row=mysqli_fetch_assoc($result)){
      $data[]=$row;
    }
  } else{
    echo "there is an error";
  }
    return $data;
  }

  function get_kids_product($con, $limit=''){
    $sql="select * from products where category='kids' AND status=1 order by id desc";

    if($limit!=''){
      $sql.=" limit $limit";
    }

    $result=mysqli_query($con, $sql);
    $data=array();
    if($result){
    while($row=mysqli_fetch_assoc($result)){
      $data[]=$row;
    }
  } else{
    echo "there is an error";
  }
    return $data;
  }

  function get_accessories_product($con, $limit=''){
    $sql="select * from products where category='accesories' AND status=1 order by id desc";

    if($limit!=''){
      $sql.=" limit $limit";
    }

    $result=mysqli_query($con, $sql);
    $data=array();
    if($result){
    while($row=mysqli_fetch_assoc($result)){
      $data[]=$row;
    }
  } else{
    echo "there is an error";
  }
    return $data;
  }

  function get_books_product($con, $limit=''){
    $sql="select * from products where category='books' AND status=1 order by id desc";

    if($limit!=''){
      $sql.=" limit $limit";
    }

    $result=mysqli_query($con, $sql);
    $data=array();
    if($result){
    while($row=mysqli_fetch_assoc($result)){
      $data[]=$row;
    }
  } else{
    echo "there is an error";
  }
    return $data;
  }

  function get_category_product($con, $limit='', $category_id) {
    $sql = "SELECT * FROM products WHERE category_id=$category_id AND status=1";

    if ($limit!='') {
      $sql.=" limit $limit";
    }

    $res = mysqli_query($con, $sql);
    $data = array();
    if ($res) {
      while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
      }
    } else {
      echo "There is an error";
    }
    return $data;
  }

  function get_product($con, $limit='') {
    $sql = "SELECT * FROM products WHERE status=1";

    if ($limit!='') {
      $sql.=" limit $limit";
    }

    $res = mysqli_query($con, $sql);
    $data = array();
    if ($res) {
      while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
      }
    } else {
      echo "There is an error";
    }
    return $data;
  }
