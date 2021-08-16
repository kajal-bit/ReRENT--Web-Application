<?php
  require('top_inc.php');

  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_value($con,$_GET['type']);

    if($type=='delete'){
      $id=get_value($con,$_GET['id']);
      $delete_row_sql="delete from contact_us where id='$id'";
      mysqli_query($con,$delete_row_sql);
    }
  }

  $sql='select * from contact_us order by id desc';
  $res=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<div class="dashboard">
  <h5>Queries</h5>
</div>
<div class="table">
  <table class="categories-table">
    <thead>
      <tr class="">
        <th class="table-elements" >Id</th>
        <th class="table-elements" >Name</th>
        <th class="table-elements" >E-mail</th>
        <th class="table-elements" >Mobile</th>
        <th class="table-elements" >Subject</th>
        <th class="table-elements" >Query</th>
        <th class="table-elements" >Date</th>
      </tr>
      </thead>
      <tbody>
        <?php
          while($row=mysqli_fetch_assoc($res)){ ?>
            <tr>
              <td class="table-elements"><?php echo $row['id']?></td>
              <td class="table-elements"><?php echo $row['name']?></td>
              <td class="table-elements"><?php echo $row['email']?></td>
              <td class="table-elements"><?php echo $row['phone_no']?></td>
              <td class="table-elements"><?php echo $row['subject']?></td>
              <td class="table-elements"><?php echo $row['comment']?></td>
              <td class="table-elements"><?php echo $row['added_on']?></td>
              <td class="table-elements">
                <?php
                  echo "<span><a class='delete-btn btn btn-outline-dark' href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";
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
