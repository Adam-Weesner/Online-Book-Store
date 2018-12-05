<!DOCTYPE html>
<html lang="en">

<?php 
	session_start();
	$user = $_SESSION['userID'];
?>


<html>
	<head>
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<title>Online Book Store</title>
</head>

<div class="header">
	<h1 style="background-color:#cccccc;">
	<img src="Parana.png" alt="logo" /></h1>
</div>

<div class="pure-menu pure-menu-horizontal">
	<ul class="pure-menu-list">
<li class="pure-menu-item"><a href="browse.php" class="pure-menu-link">Browse Books</a></li>
<li class="pure-menu-item"><a href="search.php" class="pure-menu-link">Search Books</a></li>
<li class="pure-menu-item"><a href="personal.php" class="pure-menu-link">Edit Information</a></li>
		<li class="pure-menu-item"><a href="cart.php" class="pure-menu-link">Order Status</a></li>
		<li class="pure-menu-item"><a href="../index.php" class="pure-menu-link">Log Out</a></li>
	</ul>
</div>

<?php
  $db = new mysqli('localhost','root','root','bookstore');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

	
	$query2 = "SELECT * FROM MemberList WHERE userID = '$user'";
	$result2 = mysqli_query($db, $query2);
	$row = mysqli_fetch_object($result2);

	if(isset($_POST['submit'])) {
		try {

		$update = "UPDATE MemberList SET fName='".$_POST['fName']."', lName='".$_POST['lName']."', street='".$_POST['street']."', city='".$_POST['city']."', state='".$_POST['state']."', zip='".$_POST['zip']."', phone='".$_POST['phone']."', email='".$_POST['email']."', password='".$_POST['password']."' where userID = '$user'";

		$result = $db->query($update);

		}
		catch(Exception $e) {
          echo "Message:" .$e->getMessage();
        }
 
        echo "<script type='text/javascript'>location.href = 'browse.php';</script>";
	}
	else {
	?>

<head>
	<link rel="icon" href="icon.png">
	<title>Online Book Store</title>
</head>

<body class="text-center">
		<h1 class="h3 mb-3 font-weight-normal"><font color="white">Edit Your Information</font></h1>

	<div class='container welcome'>
      	<form class='form-signin' method='post'>
		<label for="fName" class="sr-only">First Name</label>
		<input type="text" placeholder="First Name" value="<?php echo "$row->fName"; ?>" name="fName" class="form-control" required="true"><br>

		<label for="lName" class="sr-only">Last Name</label>
		<input type="text" placeholder="Last Name" value="<?php echo "$row->lName"; ?>" name="lName" class="form-control" required="true" ><br>

		<label for="street" class="sr-only">Street</label>
		<input type="text" placeholder="Street" value="<?php echo "$row->street"; ?>" name="street" class="form-control" required="" ><br>

		<label for="city" class="sr-only">City</label>
		<input type="text" placeholder="City" value="<?php echo "$row->city"; ?>" name="city" class="form-control" required="" ><br>

		<label for="state" class="sr-only">State</label>
		<input type="text" placeholder="State" value="<?php echo "$row->state"; ?>" name="state" class="form-control" required="" ><br>

		<label for="zip" class="sr-only">Zip</label>
		<input type="text" placeholder="Zip" value="<?php echo "$row->zip"; ?>" name="zip" class="form-control" required="" ><br>

		<label for="phone" class="sr-only">Phone</label>
		<input type="text" placeholder="Phone #" value="<?php echo "$row->phone"; ?>" name="phone" class="form-control" required="" ><br>

		<label for="email" class="sr-only">Email</label>
		<input type="text" placeholder="Email" value="<?php echo "$row->email"; ?>" name="email" class="form-control" required="true" ><br>

		<label for="password" class="sr-only">Password</label>
		<input type="text" placeholder="Password" value="<?php echo "$row->password"; ?>" name="password" class="form-control" required="true" ><br><br>

<button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Confirm</button>
      	</form>		
	</div>
</body>
<?php
	}
$db->close();
?>
</body>
</html>
