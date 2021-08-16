<?php
  require('top2_inc.php');
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
            <li class="active"><a href="checkout.php">Checkout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<div class="container">
  <div class="">
    <h3 class="mt-5">Cart</h3>
  </div>
  <div class="">
    <form action="managecart_inc.php" method="post">
    <table class="table table-hover mt-5 mb-5">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total = 0;
      foreach ($_SESSION['cart'] as $key => $value):
      $total = $total + ($value['Item_price'] * $value['quantity']);
    ?>
    <tr>
      <td><?php echo $value['Item_name'] ?></td>
      <td><input style="width:50px;" type="number" name="quantity" value="<?php echo $value['quantity'] ?>" min="1" max="10"></td>
      <td><?php echo $value['Item_price'] ?></td>
      <td> <button class="btn btn-danger" type="submit" name="remove">Remove</button> </td>
      <input type="hidden" name="Item" value="<?php echo $value['Item_name'] ?>">
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<h6 class="mr-5">Total = <?php echo $total ?></h5>
<button class="btn btn-lg mb-5" type="submit" name="checkout">Checkout</button>
</form>
  </div>
</div>

<?php
  require('footer_inc.php');
?>
