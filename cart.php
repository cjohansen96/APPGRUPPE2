<?php
session_start();
require_once('includes/dbh.inc.php'); 
include('top.php');

if(empty($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

//add to cart
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



$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(isset($_GET['remove']) & !empty($_GET['remove'])){
    $delitem = $_GET['remove'];
    unset($cartitems[$delitem]);
    $itemids = implode(",", $cartitems);
    $_SESSION['cart'] = $itemids;
}

?>



<div class="container">
<?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
var_dump($_SESSION['cart']);


?>
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>S.NO</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  		<th>Quantity</th>
	  	</tr>
		<?php
		$total = 0;
		$i=1;
		if(isset($_SESSION['cart'])){
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM Clothes WHERE IdClothes = $id";
			$res=mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($res);
		  	
	  		echo '<tr>';
	  			echo '<td>'. $i .'</td>';
	  			echo '<td>' .$r['Name']. '</td>';
	  			echo '<td>€' .$r['Price']. '</td>';
	  			echo '<td>' .$r['Quantity']. '</td>';
	  			echo '<td><a href="?remove=' . $key . '">remove</a></td>';
	  		echo '</tr>';
		
				$total = $total + ($r['Quantity']*$r['Price']);
				$i++; 
			} 
		}
		?>
		<tr>
			<td><strong>Total Price</strong></td>
			<td><strong>€<?php echo $total; ?></strong></td>
			<td><a href="#" class="btn btn-info">Checkout</a></td>
		</tr>
	  </table>
	  
	</div>
 
</div>
 
<?php include('bottom.php'); ?>
