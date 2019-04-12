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
     /* echo('status=incart');*/
    }else{
      $items .= "," . $_GET['id'];
      $_SESSION['cart'] = $items;
     /* echo('status=success');*/
        
    }
 
  }else{
    $items = $_GET['id'];
    $_SESSION['cart'] = $items;
   /* echo('status=success');*/
  }
    
}else{
   /* echo('status=failed');*/
  }


/*
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(isset($_GET['remove']) & !empty($_GET['remove'])){
    $delitem = $_GET['remove'];
    unset($cartitems[$delitem]);
    $itemids = implode(",", $cartitems);
    $_SESSION['cart'] = $itemids;
    
}
*/

/* Spørring for å sjekke om refer a friend er gjort */

$friendRefered = false;
if (isset($_SESSION['customerId'])) {
$idCustomer = $_SESSION['customerId'];
$query = "SELECT C.IdCustomer AS Cid, C.First_Name, C.Email, O.IdOrder, O.IdCustomer, RF.refereId AS Rid, RF.Email, RF.IdCustomer AS Rfid FROM Customer AS C INNER JOIN Orders AS O ON C.IdCustomer = O.IdCustomer INNER JOIN Refere_Friend AS RF ON C.Email = RF.Email";

$result = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($result)) 
{
	if($row['Rfid'] == $idCustomer) {
		$friendRefered = true;
	}
}
}
if (isset($_POST['checkout'])) {
        $sql = "INSERT INTO Orders (IdCustomer, IdClothes, Sum_Pris) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
        }
        else {
          $clothe = 11;
          $price = 10;
          mysqli_stmt_bind_param($stmt, "iii", $idCustomer, $clothe, $price);

          mysqli_stmt_execute($stmt);
          echo "Order placed!";
          exit();
        }
}

?>



<div class="container">
<?php /*
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
var_dump($_SESSION['cart']);
*/
$test = array("0" => "11");


?>
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>Number</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  		<th>Quantity</th>
	  	</tr>
		<?php
		$referCupon = 0.00;
		if (isset($_POST['refer'])) {
			$referCupon = 0.30;
		}
		$total = 0;
		$i=1;
		if(isset($_SESSION['cart'])){
		 foreach ($test as $key=>$id) {
			$sql = "SELECT * FROM Clothes WHERE IdClothes = $id";
			$res=mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($res);
		  	
			$quanityTest = $r['Quantity'] - $r['Quantity'] + 1;

	  		echo '<tr>';
	  			echo '<td>'. $i .'</td>';
	  			echo '<td>' .$r['Name']. '</td>';
	  			echo '<td>€' .$r['Price']. '</td>';
	  			echo '<td>' .$quanityTest. '</td>';
	  			echo '<td><a href="?remove=' . $key . '">remove</a></td>';
	  		echo '</tr>';
				if ($referCupon == 0.00) {
					$total = $total+(1*$r['Price']);
				}			
				else {
				$discount = $referCupon*($total+(1*$r['Price']));
				$total = $total+(1*$r['Price'])-$discount;
				}
				$i++; 
			} 
		}
		?>
		<tr>
			<td><strong>Total Price</strong></td>
			<td><strong>€<?php echo $total; ?></strong></td>

			<form action="cart.php?checkout" method="POST">
			<td><button type="submit" name="checkout" class="btn btn-info">Checkout</button></td>
			<td><button type="submit" id="refer-button" name="refer"></button></td>
			</form>
		</tr>
	  </table>
	  
	</div>
 
</div>
 
<?php include('bottom.php'); ?>

<script>
	var friendRefered = '<?php echo $friendRefered ?>';
	if (friendRefered) {
		$('#refer-button').addClass('btn btn-warning');
		$('#refer-button').text('30% cupon');
	}
	if (!friendRefered) {
		$('#refer-button').remove('button');
	}
</script>
