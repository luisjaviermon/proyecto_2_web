<?php
session_start();
if(!isset($_SESSION["usuario"])){
			header("Location: login.html");
}
$product_ids = array();

if(filter_input(INPUT_POST, 'add_to_cart')){
	if(isset($_SESSION['shopping_cart'])){
		$count = count($_SESSION['shopping_cart']);
		$product_ids = array_column($_SESSION['shopping_cart'], 'id');
		if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
			$_SESSION['shopping_cart'][$count] = array
				(
					'id' => filter_input(INPUT_GET, 'id'),
					'name' => filter_input(INPUT_POST, 'name'),
					'price' => filter_input(INPUT_POST, 'price'),
					'quantity' => filter_input(INPUT_POST, 'quantity')
				);
		}
		else{
		for($i = 0; $i < count($product_ids); $i++){
			if($product_ids[$i] == filter_input(INPUT_GET, 'id')){
				
				$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
			}
		}
	}
	}else{
		$_SESSION['shopping_cart'][0] = array
		(
			'id' => filter_input(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'name'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
		);
	}
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
	foreach ($_SESSION['shopping_cart'] as $key => $product) {
		if($product['id'] == filter_input(INPUT_GET, 'id')){
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
}

//pre_r($_SESSION);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="CSS/bootstrap.css">
	<link rel="stylesheet" href="CSS/cart.css">
	<link rel="stylesheet" href="CSS/style.css">
	<title>Carrito</title>
</head>
<body>
    <header>
	    <div class="contenedor">
	        <img src="../IMG/logo.png" width=20%;>
	        <input type="checkbox" id="menu-bar">
	        <label class="fontawesome-align-justify" for="menu-bar"></label>
	                <nav class="menu">
	                    <a href="BACK/p.php">Inicio</a>
	                    <a href="../cart.php">Productos</a>
	                    <a href="../comunidad.html">Comunidad</a>
	                    <a href=""><?php echo $_SESSION["usuario"];?></a>
	                    <a href="BACK/logout.php">salir</a>
	                </nav>
	            </div>
	</header>
	<div class="container">
		<br>
		<br>
		<br>
			<div class="container">
				<div class="row"> <!--indica que esta seccion se le dara formato-->
					<?php 

		$connect = mysqli_connect("localhost","id7843499_root2","11a14755db","id7843499_cart");
		$query="SELECT * FROM products ORDER by name ASC";

		$res = mysqli_query($connect, $query);

		if($res):
			if(mysqli_num_rows($res)>0):
				while($product = mysqli_fetch_assoc($res)):
					//print_r($product);
					?>
						<div class="col-lg-4 col-md-3">
							<form method="post" action="cart.php?action=add&id=<?php echo $product['id'];?>">
								<div class="products">
									<img src="<?php echo $product['image'];?>" class="img-thumbnail">
									
									<input type="text" name="quantity" class="form-control" value="1">
									<input type="hidden" name="name" value="<?php echo $product['name'];?>">
									<input type="hidden" name="price" value="<?php echo $product['price'];?>">
									<input type="submit" name="add_to_cart" class="btn btn_info" value="add to cart">
								</div>
							</form>
						</div>
					<?php
				endwhile;
			endif;
		endif;

	 ?>

	 <div style="clear:booth"></div>
	 <br />
	 <div class="table-responsive">
	 <table class="table">
	 	<tr><th colspan="5"><h3>Order Details</h3></th></tr>
	 <tr>
	 	<th width="40%">Product</th>
	 	<th width="10%">Quantity</th>
	 	<th width="20%">Price</th>
	 	<th width="15%">Total</th>
	 	<th width="5%">Action</th>
	 </tr>

	 <?php
	 if(!empty($_SESSION['shopping cart']));

	 	$total = 0;

	 	foreach($_SESSION['shopping_cart'] as $key => $product):
	 ?>
	 <tr>
	 	<td><?php echo $product['name']; ?></td>
	 	<td><?php echo $product['quantity']; ?></td>
	 	<td><?php echo $product['price']; ?></td>
	 	<td><?php echo number_format($product['quantity'] * $product['price'], 2);?></td>
	 	<td>
	 		<a href="cart.php?action=delete&id=<?php echo $product['id'];?>">

	 			<div class="btn-danger">Remove</div>
	 		</a>
	 	</td>
	 </tr>

	 <?php
			$total = $total + ($product['quantity'] * $product['price']);
		endforeach;
	?>
	<tr>
		<td colspan="3" align="right">Total</td>
		<td align="right">$ <?php echo number_format($total, 2); ?></td>
		<td></td>
	</tr>

	<tr>
		<td colspan="5">
		<?php
			if (isset($_SESSION['shopping_cart']));
			if (isset($_SESSION['shopping_cart']) > 0):
		?>
			<a href="#" class="button">Checkout</a>
		</td>
	</tr>
	<?php
	endif;
	?>
	</table>

				</div>
			</div>

	<footer>
            <div class="contenedor info">
                <p class="copy">Nombre de Cia &copy; 2018</p>
                <div class="sociales">
                    <a class="fontawesome-facebook-sign" href="#"></a>
                    <a class="fontawesome-twitter" href="#"></a>
                    <a class="fontawesome-camera-retro" href="#"></a>
                    <a class="fontawesome-google-plus-sign" href="#"></a>
                    <!-- Place this tag where you want the button to render. -->
<a class="github-button" href="https://github.com/pmeneses4" data-size="large" data-show-count="true" aria-label="Follow @pmeneses4 on GitHub">Follow @pmeneses4</a>
<!-- Place this tag where you want the button to render. -->
<a class="github-button" href="https://github.com/luisjaviermon" data-size="large" data-show-count="true" aria-label="Follow @luisjaviermon on GitHub">Follow @luisjaviermon</a>
<!-- Place this tag where you want the button to render. -->
<a class="github-button" href="https://github.com/chrissan" data-size="large" data-show-count="true" aria-label="Follow @chrissan on GitHub">Follow @chrissan</a>
                </div>
            </div>
        </footer>
</body>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</html>

