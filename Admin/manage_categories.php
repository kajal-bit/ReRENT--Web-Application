<?php
  require('top_inc.php');
  $category='';
  $msg='';
  if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
      $row=mysqli_fetch_assoc($res);
      $category=$row['category'];
    } else {
      header('location:categories.php');
      die();
    }
  }

    if(isset($_POST['submit'])){
      $category=get_value($con,$_POST['category']);
      $res=mysqli_query($con,"select * from categories where category='$category'");
      $check=mysqli_num_rows($res);
      if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
          $getData=mysqli_fetch_assoc($res);
          if ($id==$getData['id']) {

          }else{
              $msg="category already exists";
          }
        }else {
          $msg="category already exists";
        }
      }
      if ($msg=='') {
        if(isset($_GET['id']) && $_GET['id']!=''){
          mysqli_query($con,"update categories set category='$category' where id='$id'");
        } else{
          mysqli_query($con,"insert into categories(category,status) values('$category','1')");
        }
        header('location:categories.php');
        die();
      }
    }
 ?>
 <div class="dashboard">
   <h5>Add/Edit Categories</h5>
 </div>
 <div class="table">
   <form method="post">
   <label class="category-label" for="category">Category</label> <br>
   <input class="category-input" type="text" name="category" placeholder="Add Category" value="<?php echo $category ?>"><br><br>
   <button class="btn btn-block btn-dark" type="submit" name="submit">Submit</button>
   <span class="login-error"><?php echo $msg ?></span>
 </form>
 </div>
 <?php
 require('footer_inc.php');
 ?>
