<?php
session_start();
require_once('includes/dbh.inc.php'); 
include('top.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
  if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $items = $_SESSION['id'];
    $cartitems = explode(",", $items);
    if(in_array($_GET['id'], $cartitems)){
      echo('status=incart');
    }else{
      $items .= "," . $_GET['id'];
      $_SESSION['cart'] = $items;
      echo('status=success');
        
    }
 
  }else{
    $items = $_GET['id'];
    $_SESSION['cart'] = $items;
    echo('status=success');
  }
    
}else{
    echo('status=failed');
  }


?>
 
<div class="container">
<?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
//print_r($cartitems);
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
			$sql = "SELECT * FROM Clothes WHERE IdClothes = $id";
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
