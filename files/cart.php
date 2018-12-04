<html>
	<head>
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	
	</head>

<div class="header">
	<h1 style="background-color:#cccccc;">
	<img src="Parana.png" alt="logo" /></h1>
</div>

<form class="pure-form">
    <input type="text" class="pure-input-rounded">
    <button type="submit" class="pure-button">Search</button>
</form>

<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	
<div class="pure-menu pure-menu-horizontal">
	<ul class="pure-menu-list">
	      	<li class="pure-menu-item"><a href="home.php" class="pure-menu-link">Home</a></li>
		<li class="pure-menu-item"><a href="cart.php" class="pure-menu-link">Cart</a></li>
<li class="pure-menu-item"><a href="browse.php" class="pure-menu-link">Browse Books</a></li>
<li class="pure-menu-item"><a href="search.php" class="pure-menu-link">Search Books</a></li>
	</ul>
</div>


<div>
    <style scoped>

        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
        }

    </style>

</div>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart </div>
<form name="frmCartEdit" id="frmCartEdit">

<?php
$total_price = 0.00;
if(isset($_SESSION["cart_item"])){
?>	
<?php foreach ($_SESSION["cart_item"] as $item) { 
	$code = $item["code"];
	$productByCode = $product_array["$code"];
	$total_price += $item["price"] * $item["quantity"];	
	}
}
?>
</form>
<div class="cart_footer_link">
	<div>Total Price: <span id="total_price"><?php echo "$". number_format($total_price,2); ?></span></div>
	
	<a href="?action=empty"><button class="button-error pure-button">Empty Cart</button></a>

	<a href="home.php" title="Cart"><button class="button-secondary pure-button">Continue Shopping</button></a>
	
	<a href="checkout.php" title="Cart"><button class="button-success pure-button">Checkout</button></a>
	</div>
</div>
</html>
