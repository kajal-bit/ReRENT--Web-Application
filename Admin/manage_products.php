<?php
  require('top_inc.php');
  $category_id='';
  $name='';
  $mrp='';
  $price='';
  $qty='';
  $image='';
  $description	='';
  $image_required='required';
  $category='';
  $msg='';
  $category='';
  if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id=get_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from products where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
      $row=mysqli_fetch_assoc($res);
      $category_id=$row['category_id'];
      $category=$row['category'];
      $name=$row['product_name'];
		  $mrp=$row['mrp'];
		  $price=$row['price'];
		  $qty=$row['qty'];
		  $description=$row['description'];
    } else {
      header('location:products.php');
      die();
    }
  }

  if(isset($_POST['submit'])){
    $category_id=get_value($con,$_POST['category_id']);
    $name=get_value($con,$_POST['name']);
    $mrp=get_value($con,$_POST['mrp']);
    $price=get_value($con,$_POST['price']);
    $qty=get_value($con,$_POST['qty']);
    $description=get_value($con,$_POST['description']);

    $category_res=mysqli_query($con, "select category from categories where id='$category_id'");
    $category_row=mysqli_fetch_assoc($category_res);
    $category=$category_row['category'];
    echo $category;

    $res=mysqli_query($con,"select * from products where product_name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
        $getData=mysqli_fetch_assoc($res);
        if($id==$getData['id']){

        }else{
          $msg="Product already exist";
        }
      }else{
        $msg="Product already exist";
      }
    }


if($_GET['id']==0){
   if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
     $msg="Please select only png,jpg and jpeg image format";
  }
 }else{
   if($_FILES['image']['type']!=''){
     if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
    $msg="Please select only png,jpg and jpeg image format";
  }
 }
}

if($msg==''){
  if(isset($_GET['id']) && $_GET['id']!=''){
    if($_FILES['image']['name']!=''){
      $image=basename($_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'],'../media/products/'.$image);
      $update_sql="update products set category_id='$category_id',category='$category',product_name='$name',mrp='$mrp',price='$price',qty='$qty',description='$description',image='$image' where id='$id'";
    }else{
      $update_sql="update products set category_id='$category_id',category='$category',product_name='$name',mrp='$mrp',price='$price',qty='$qty',description='$description' where id='$id'";
    }
    mysqli_query($con,$update_sql);
  }else{
    $image=basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],'../media/products/'.$image);
    mysqli_query($con,"insert into products(category_id,category,product_name,mrp,price,qty,description,status,image) values('$category_id','$category','$name','$mrp','$price','$qty','$description',1,'$image')");
  }
  header('location:products.php');
  die();
}
}
 ?>
 <div class="dashboard">
   <h5>Add/Edit Products</h5>
 </div>
 <div class="table">
   <form method="post" enctype="multipart/form-data">
   <label class="product-form-element" for="category">Category</label>
    <select id="category" name="category_id" class="product-form-element">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,category from categories order by category asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$category_id){
												echo "<option selected value=".$row['id'].">".$row['category']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['category']."</option>";
											}
										}
										?>
	 </select><br>
    <label class="product-form-element">Product Name</label>
	  <input type="text" name="name" placeholder="Enter product name" class="product-form-element" required value="<?php echo $name?>"><br>

    <label class="product-form-element">MRP</label>
    <input type="text" name="mrp" placeholder="Enter product mrp" class="product-form-element" required value="<?php echo $mrp?>"><br>

    <label class="product-form-element">Price</label>
	  <input type="text" name="price" placeholder="Enter product name" class="product-form-element" required value="<?php echo $price?>"><br>

    <label class="product-form-element">Quantity</label>
	  <input type="text" name="qty" placeholder="Enter product name" class="product-form-element" required value="<?php echo $qty?>"><br>

    <label class="product-form-element">Image</label>
	  <input type="file" id="img" name="image" accept="image/*" class="product-form-element" <?php echo  $image_required?>><br>

    <label class="product-form-element">description</label>
    <textarea name="description" placeholder="Enter product description" class="product-form-element" required><?php echo $description?></textarea><br>

   
 <button class="btn btn-block btn-dark" type="submit" name="submit">Submit</button>
   <span class="login-error"><?php echo $msg ?></span>
 </form>
 </div>
 <?php
 require('footer_inc.php');
 ?>
