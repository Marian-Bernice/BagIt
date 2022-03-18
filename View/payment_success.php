<!DOCTYPE html> 
<html>
<head>
    <title>Payment Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css"> 
</head>
<body>

  <?php
  include('../navigation_bar.php'); 
  require_once("../Controllers/cart_controller.php");
  $cid = $_SESSION['user_id'];
  $ord_id = $_GET['ord_id'];
  $ord_arr = get_order_fxn($ord_id);
  $ord_details_arr = get_orderDetails_fxn($ord_id); 
  ?>

<br>
<br>
<br>
<body>
    <div class="container">
      <center>
      <h4 style="font-family: cursive;">Thank You For Purchasing with us, <?= $ord_arr['user_name'] ?></h4>
      <h5 style="font-family: cursive;">Payment was successful! :)</h5>
      </center>
      <br>
      <p style="font-family: cursive;">Invoice Number: <?php echo $ord_arr['invoice_no'] ?></p>
      <h8 style="font-family: cursive;">Order Details</h8>
      <table class="table">
  <thead>
    <tr>
      <th scope="col" style="font-family: cursive; color: #E9967A;">#</th>
      <th scope="col" style="font-family: cursive; color: #E9967A;">Product Image</th>
      <th scope="col" style="font-family: cursive; color: #E9967A;">Product Name</th>
      <th scope="col" style="font-family: cursive; color: #E9967A;">Price</th>
      <th scope="col" style="font-family: cursive; color: #E9967A;">Quantity</th>
      <th scope="col" style="font-family: cursive; color: #E9967A;">Sub-Total</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $counter = 1;
        $totals = 0;
        foreach($ord_details_arr as $key => $value){
    ?>
    <tr>
      <th scope="row" style="font-family: cursive;"><?php echo $counter; ?></th>
      <td><img src="<?php echo $value['product_image'] ?>" width="80" height="100"></td>
      <td style="font-family: cursive;"><?php echo $value['product_title'] ?></td>
      <td style="font-family: cursive;"><?php echo $value['product_price'] ?></td>
      <td style="font-family: cursive;"><?php echo $value['qty']; ?></td>
      <td style="font-family: cursive;"><?php echo $value['result']; ?></td>
    </tr>

    <?php
            $totals += $value['result'];
            $counter++;
        } ?>
  
  <tr>
    <th></th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>  
      <h5 style="font-family: cursive; color: #E9967A;">Total: <?php echo $totals; ?></h5>
    </td>
  </tr>
  </tbody>
</table>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 </body>
</html>