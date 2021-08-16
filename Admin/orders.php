<?php
  require('top_inc.php');

  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_value($con,$_GET['type']);

    if($type=='status'){
      $operation=get_value($con,$_GET['operation']);
      $id=get_value($con,$_GET['id']);
      if($operation=='active'){
        $status=1;
      } else{
        $status=0;
      }
      $update_status_sql="update orders set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
    }

    if($type=='delete'){
      $id=get_value($con,$_GET["id"]);
      $delete_row_sql="delete from orders where id=$id";
      mysqli_query($con,$delete_row_sql);
    }
  }

  $sql = "SELECT * FROM orders order by id asc";
  $res = mysqli_query($con, $sql);

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Print Order details</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
</html>
<div class="dashboard">
  <h5>Orders</h5>
 
</div>
<div class="table">
  <table class="categories-table">
    <thead>
      <tr class="">
        <th class="table-elements" >#</th>
        <th class="table-elements" >id</th>
        <th class="table-elements" >Product Name</th>
        <th class="table-elements" >Customer Name</th>
        <th class="table-elements" >Quantity</th>
        <th class="table-elements" >Price</th>
        <th class="table-elements" >Mobile</th>
        <th class="table-elements" >Address</th>
      </tr>
      </thead>
      <tbody>
        <?php
          $i=1;
          while($row=mysqli_fetch_assoc($res)){ ?>
            <tr>
              <td class="table-elements"><?php echo $i ?></td>
              <td class="table-elements"><?php echo $row['id'] ?></td>
              <td class="table-elements"><?php echo $row['item_name'] ?></td>
              <td class="table-elements"><?php echo $row['customer_name'] ?></td>
              <td class="table-elements"><?php echo $row['quantity'] ?></td>
              <td class="table-elements"><?php echo $row['price'] ?></td>
              <td class="table-elements"><?php echo $row['mobile'] ?></td>
              <td class="table-elements"><?php echo $row['address'] ?></td>
              <td class="table-elements">
                <?php
                if ($row['status']==1) {
                  echo "<span><a class='status-btn btn btn-outline-dark' href='?type=status&operation=deactive&id=".$row['id']."'>complete</a></span>&nbsp;";
                } else{
                  echo "<span><a class='status-btn btn btn-outline-dark' href='?type=status&operation=active&id=".$row['id']."'>incomplete</a></span>&nbsp;";
                }
                echo "<span><a class='delete-btn btn btn-outline-dark' href='?type=delete&id=".$row['id']."'>Returned</a></span>&nbsp;";
                ?>
              </td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
</div>

<div class="text-center">
        <a href="user_data_print.php" class="btn btn-primary">Print</a>
      </div>

<?php
  require('footer_inc.php');
?>
