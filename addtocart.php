<?php
session_start();
 
	if(isset($_GET['IdClothes']) & !empty($_GET['IdClothes'])){
		if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
 
			$items = $_SESSION['cart'];
			$cartitems = explode(",", $items);
			if(in_array($_GET['IdClothes'], $cartitems)){
				header('location: index.php?status=incart');
			}else{
				$items .= "," . $_GET['IdClothes'];
				$_SESSION['cart'] = $items;
				header('location: index.php?status=success');
				
			}
 
		}else{
			$items = $_GET['IdClothes'];
			$_SESSION['cart'] = $items;
			header('location: index.php?status=success');
		}
		
	}else{
		header('location: index.php?status=failed');
	}
?>
