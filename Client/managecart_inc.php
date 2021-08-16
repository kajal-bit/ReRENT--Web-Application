<?php
require('connection_inc.php');
require('functions_inc.php');

    if (isset ($_GET['id']) && $_GET['id']!='') {
      $id = get_value($con, $_GET['id']);
      $itemname = get_value($con, $_GET['in']);
      $price = get_value($con, $_GET['pr']);

      if (isset ($_SESSION['cart'])) {
        $myitems = array_column($_SESSION['cart'],'Item_name');
        if (in_array($_GET['in'],$myitems)) {
          echo"<script>
          alert('Item already added');
          window.location.href='shop.php';
          </script>";
        } else{
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array('Item_name'=>$itemname, 'Item_price'=>$price, 'quantity'=>1);
        echo"<script>
        alert('Item added');
        window.location.href='shop.php';
        </script>";
      }
      } else {
        $_SESSION['cart'][0]=array('Item_name'=>$itemname, 'Item_price'=>$price, 'quantity'=>1);
        echo"<script>
        alert('Item added');
        window.location.href='shop.php';
        </script>";
      }
    }

    if (isset ($_POST['addToCart'])) {
      $prod_name = $_POST['prod_name'];
      $prod_price = $_POST['price'];
      $quantity = $_POST['quantity'];
      if (isset ($_SESSION['cart'])) {
        $myitems = array_column($_SESSION['cart'],'Item_name');
        if (in_array($_POST['prod_name'],$myitems)) {
          echo"<script>
          alert('Item already added');
          window.location.href='shop.php';
          </script>";
        } else{
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array('Item_name'=>$prod_name, 'Item_price'=>$prod_price, 'quantity'=>$quantity);
        echo"<script>
        alert('Item added');
        window.location.href='shop.php';
        </script>";
      }
      } else {
        $_SESSION['cart'][0]=array('Item_name'=>$prod_name, 'Item_price'=>$prod_price, 'quantity'=>$quantity);
        echo"<script>
        alert('Item added');
        window.location.href='shop.php';
        </script>";
      }
    }

    if (isset ($_POST['remove'])) {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['Item_name'] == $_POST['Item']) {
          unset($_SESSION['cart'][$key]);
          $_SESSION['cart'] = array_values($_SESSION['cart']);
          echo"<script>
            alert('Item Removed');
            window.location.href='checkout.php';
          </script>";
        }
      }
    }

    if (isset ($_POST['checkout'])) {
      if (isset ($_SESSION['username'])) {
        $userid = get_value($con, $_SESSION['userid']);
        $usersql = "SELECT * FROM users WHERE id=$userid";
        $res = mysqli_query($con, $usersql);
        while($row = mysqli_fetch_assoc($res)) {
          $cust_name = $row['first_name']." ".$row['last_name'];
          $mobile = $row['mobile'];
          $addr = $row['address'];

        foreach ($_SESSION['cart'] as $key => $value) {
          $itemname = $value['Item_name'];
          $quantity = $value['quantity'];
          $price = $value['Item_price'];
          $sql = "INSERT INTO orders (item_name, customer_name, quantity, price, mobile, address) values ('$itemname', '$cust_name', '$quantity', '$price', '$mobile', '$addr')";
          $result = mysqli_query($con, $sql);
          echo"<script>
            alert('Proceed to your payment');
            window.location.href='index1.html';
           </script>";
        }
      }
      } else {
          echo"<script>
          alert('Please Login to continue');
          window.location.href='login.php';
          </script>";
        }
    }
 ?>
