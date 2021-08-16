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
      $update_status_sql="update categories set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
    }
    if($type=='delete'){
      $id=get_value($con,$_GET['id']);
      $delete_row_sql="delete from categories where id='$id'";
      mysqli_query($con,$delete_row_sql);
    }
  }

  $sql='select * from categories order by category asc';
  $res=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<div class="dashboard">
  <h5>Categories</h5>
  <a class="add-cat-btn btn btn-outline-dark" href="manage_categories.php">Add Category</a>
</div>
<div class="table">
  <table class="categories-table">
    <thead>
      <tr class="">
        <th class="table-elements" >#</th>
        <th class="table-elements" >Id</th>
        <th class="table-elements" >Category</th>
        <th class="table-elements" >Status</th>
      </tr>
      </thead>
      <tbody>
        <?php
          $i=1;
          while($row=mysqli_fetch_assoc($res)){ ?>
            <tr>
              <td class="table-elements"><?php echo $i?></td>
              <td class="table-elements"><?php echo $row['id']?></td>
              <td class="table-elements"><?php echo $row['category']?></td>
              <td class="table-elements">
                <?php
                if ($row['status']==1) {
                  echo "<span><a class='status-btn btn btn-outline-dark' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                } else{
                  echo "<span><a class='status-btn btn btn-outline-dark' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                }
                echo "<span><a class='delete-btn btn btn-outline-dark' href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";

                echo "<span><a class='edit-btn btn btn-dark' href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                ?>
              </td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
</div>
<?php
  require('footer_inc.php');
?>
