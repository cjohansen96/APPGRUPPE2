<?php
session_start();
require 'top.php';


?>

<!DOCTYPE html>
<html>

<head>
	<title>Clothes</title>
	<link rel="stylesheet" type="text/css" href="css/style_clothes.css">
	<script src="js/cart.js" async></script>
</head>

<body>
	<h1>Shopping Cart</h1>

  <a href="{#cart.urls.continueShopping}" class="continue-shopping">Continue Shopping</a>
  <a href="{#cart.urls.checkout}" class="checkout-button">Checkout</a>
  <table cellspacing="0" class="shopping-cart">
    <thead>
      <tr class="headings">
        <th class="link">&nbsp;</td>
        <th class="product">Item</td>
        <th class="price">Price</td>
        <th class="quantity">Quantity</td>
        <th class="price">Total</td>
      </tr>
    </thead>
    <tbody>
   	
      <tr> 
        <td class="link"><label></label></td>
        <td class="product">
          <div class="product-img"><a></a></div>
          <div class="product-name">
            <a href="{#product.url}"></a>
          </div>
        </td>
        <td class="price">
        </td>
        <td class="quantity">
        </td>
        <td class="price"></td>
      </tr>
 
      <tr class="totals">
        <td colspan="2"><input type="submit" name="submit" value="Update cart" /></td>
        <td class="quantity-span" colspan="2">Total</td>
        <td class="price"></td>
      </tr> 
    </tbody>
  </table>

  </div>

<div style="clear: both;"></div>
<button submit href="index.php" class="continue-shopping">Continue Shopping</button>
<a href="" class="checkout-button">Checkout</a>
</body>

<?php
require 'bottom.php';
?>

</html>

