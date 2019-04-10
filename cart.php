<?php
session_start();
require_once('includes/dbh.inc.php'); 
include('top.php');
?>
 
<div class="container">
<?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>S.NO</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  	</tr>
		<?php
		$total = 0;
		$i=1;
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM Clothes WHERE IdClothes = 4";
			$res=mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($res);
		?>	  	
	  	<tr>
	  		<td><?php echo $i; ?></td>
	  		<td>$<?php echo $r['Name']; ?></td>
	  		<td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['Price']; ?></td>
	  	</tr>
		<?php 
			$total = $total + $r['Price'];
			$i++; 
			} 
		?>
		<tr>
			<td><strong>Total Price</strong></td>
			<td><strong>$<?php echo $total; ?></strong></td>
			<td><a href="#" class="btn btn-info">Checkout</a></td>
		</tr>
	  </table>
	  
	</div>
 
</div>
 
<?php include('bottom.php'); ?>
