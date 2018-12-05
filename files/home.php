<?php 
	session_start();
	$user = $_SESSION['userID'];
?>

<html>
	<head>
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	</head>

<div class="header">
	<h1 style="background-color:#cccccc;">
	<img src="Parana.png" alt="logo" /></h1>
</div>

<div class="pure-menu pure-menu-horizontal">
	<ul class="pure-menu-list">
	      	<li class="pure-menu-item"><a href="home.php" class="pure-menu-link">Home</a></li>
		<li class="pure-menu-item"><a href="cart.php" class="pure-menu-link">Cart</a></li>
<li class="pure-menu-item"><a href="browse.php" class="pure-menu-link">Browse Books</a></li>
<li class="pure-menu-item"><a href="search.php" class="pure-menu-link">Search Books</a></li>
<li class="pure-menu-item"><a href="personal.php" class="pure-menu-link">Edit Information</a></li>
	</ul>
</div>

</html>
