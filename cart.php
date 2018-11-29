<div class="header">
  <img src="Parana.png" alt="logo" /> <img src="Slogan.png" alt="logo" />
  <h1>bookstore</h1>
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

	<a href="../" title="Cart"><button class="button-secondary pure-button">Continue Shopping</button></a>
	
	<a href="../" title="Cart"><button class="button-success pure-button">Checkout</button></a>
	</div>
</div>
