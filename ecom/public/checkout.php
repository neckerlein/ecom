<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<!-- /.row --> 
<div class="row">

   <!-- Message Field; use set_message(); -->
  <h2 class="text-center bg-warning"> <?php display_message(); ?> </h2>

<!-- Page Content -->
    <div class="container">

      <h1>Checkout</h1>

  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="u21-slam@gmx.de">
  <input type="hidden" name="item_name" value="hat">
  <input type="hidden" name="item_number" value="123">
  <input type="hidden" name="amount" value="15.00">
  <input type="hidden" name="first_name" value="John">
  <input type="hidden" name="last_name" value="Doe">
  <input type="hidden" name="address1" value="9 Elm Street">
  <input type="hidden" name="address2" value="Apt 5">
  <input type="hidden" name="city" value="Berwyn">
  <input type="hidden" name="state" value="PA">
  <input type="hidden" name="zip" value="19312">
  <input type="hidden" name="night_phone_a" value="610">
  <input type="hidden" name="night_phone_b" value="555">
  <input type="hidden" name="night_phone_c" value="1234">
  <input type="hidden" name="email" value="jdoe@zyzzyu.com">
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
         <?php 
         cart();
         ?>
        </tbody>
    </table>
</form>





<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
  <?php
  echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
  ?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">
  
<?php

echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";


?>
<span> €</span>
<!-- Beim Refaktoring ersetzen -->

</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

           <hr>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>