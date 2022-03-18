<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
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
      if (isset($_SESSION['user_id'])){
          $cid = $_SESSION['user_id'];
          $cart = view_cart_fxn($cid);
          $checkOutAmt = cart_value_fxn($cid);
      }elseif(!isset($_SESSION['user_id'])){
            $_SESSION['notloggedin'] = true; 
            header("location: ../Login/login.php");
      }else{
          header("location: ../Login/login.php");
          $ipadd = getIPAdd();
          $cart = cart_valueNull_fxn($ipadd);
          $checkOutAmt = cart_valueNull_fxn($ipadd);
      }

    ?>

    <div class="container" style="padding-top: 100px">
      <div class="row">
        <div class="col-sm-9">
          <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="font-family: cursive; color: #E9967A;">Product Image</th>
                  <th scope="col" style="font-family: cursive; color: #E9967A;">Product</th>
                  <th scope="col" style="font-family: cursive; color: #E9967A;">Price</th>
                  <th scope="col" style="font-family: cursive; color: #E9967A;">Quantity</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($cart as $key => $cartItem){
                  ?>

                  <tr>
                  <th><img src="<?php echo $cartItem['product_image'] ?>" width="80" height="60"></th>
                  <td scope="row" style="font-family: cursive;"><?= $cartItem['product_title'] ?></td>
                  <!-- <td><img>Ghc <?= $cartItem['product_image'] ?></td> -->
                  <td style="font-family: cursive;">Ghc <?= $cartItem['product_price'] ?></td>
                    <td style="font-family: cursive;">
                        <?= $cartItem['qty'] ?>

                    </td>
                </tr>

                  <?php } ?>

              </tbody>
            </table>
        </div>
        <div class="col-sm-3 bg-light" style="padding: 40px 10px ">
          <h5 style="padding-bottom: 10px; font-family: cursive;">Cart Summary</h5>
          <table class="table">
  <thead>

  </thead>
  <tbody>
    <tr>

      <td style="font-family: cursive;">Sub-Total</td>
      <td style="font-family: cursive;">Ghc <?= $checkOutAmt['Result'] ?></td>

    </tr>

    <tr>

      <td style="font-family: cursive;">Total</td>
      <td style="font-family: cursive;">Ghc <span id="amt"><?= $checkOutAmt['Result'] ?></span></td>


    </tr>

  </tbody>

</table>
    <center>
    <p style="font-family: cursive;">Pay with Paypal</p>
    </center>
    <div id="paypal-payment-button"></div>

    <center>
    <p style="font-family: cursive;">OR</p>
    </center>

    <center>
    <p style="font-family: cursive;">Pay with Paystack</p>
    </center>
    <div>
      <input type="hidden" id="email" value="<?= $_SESSION['user_email'] ?>">
      <button class="btn btn-success btn-lg btn-block" onclick="payWithPaystack()" style="border-radius: 100px; font-size: 15px; font-weight: bold; padding: 8px 30px;">Paystack</button>
    </div>

        </div>

      </div>
    </div>
    <?php
    if(isset($_GET['status'])){
        if($_GET['status'] == 'failed'){
            ?>
      <script>alert("Payment Cancelled Or Failed")</script>
      <?php
        }
    }
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Footer -->
    <?php include("../footer.php");?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AdwJ2WFjcmjcYWiOfkV7GXNpK3b6poFL3LHUZC_H4cA-f2RjLQDVCeCVDniCeoiFlhPwrDqi4KVRNz8P&disable-funding=credit,card"></script>
    <script src="../js/payment.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script>
        function payWithPaystack() {
          let handler = PaystackPop.setup({
            key: 'pk_test_87cf10201eaee5bb25a86a2264a139d191c890fb',
            email: $('#email').val(),
            currency: "GHS",
            amount: $('#amt').html() * 100, 
            onClose: function(){
              alert('Window closed.');
            },
            callback: function(response){
              let message = 'Payment complete! Reference: ' + response.reference;
              window.location.href = "../Actions/process_payment.php?status=completed";
              console.log(response.reference); 
            }
          });
          handler.openIframe();
        }
    </script>
  </body>
</html>
