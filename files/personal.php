<!DOCTYPE html>
<html lang="en">

<?php 
	session_start();
	$user = $_SESSION['userID'];
?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="icon.png">
	<link href="bootstrap.css" rel="stylesheet">
	<link href="memberLogin.css" rel="stylesheet">
	<title>Online Book Store</title>
</head>

<?php
  $db = new mysqli('localhost','root','root','Members');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

	
	$query2 = "SELECT * FROM MemberList WHERE userID = '$user'";
	$result2 = mysqli_query($db, $query2);
	$row = mysqli_fetch_object($result2);

  //Validating the form after submission
	if(isset($_POST['submit']) && !empty($_POST['userID']) && !empty($_POST['password'])) {
		$update = "UPDATE MemberList SET fName='".$_POST['fName']."', lName='".$_POST['lName']."', street='".$_POST['street']."', city='".$_POST['city']."', state='".$_POST['state']."', zip='".$_POST['zip']."', phone='".$_POST['phone']."', email='".$_POST['email']."', userID='".$_POST['userID']."', password='".$_POST['password']."' where userID = '$user'";
		try {
		$result = $db->query($update);
		}
		catch(Exception $e) {
          echo "Message:" .$e->getMessage();
        }
 
        echo "<script type='text/javascript'>location.href = 'browse.php';</script>";
	}
	else {
	?>

<body class="text-center">
	<img class="logo" src="Parana.png">
		<h1 class="h3 mb-3 font-weight-normal"><font color="white">Edit Your Information</font></h1>

	<div class='container welcome'>
      	<form class='form-signin' method='post'>
		<label for="fName" class="sr-only">First Name</label>
		<input type="text" placeholder="First Name" value="<?php echo "$row->fName"; ?>" name="fName" class="form-control" required="true">

		<label for="lName" class="sr-only">Last Name</label>
		<input type="text" placeholder="Last Name" value="<?php echo "$row->lName"; ?>" name="lName" class="form-control" required="true" >

		<label for="street" class="sr-only">Street</label>
		<input type="text" placeholder="Street" value="<?php echo "$row->street"; ?>" name="street" class="form-control" required="" >

		<label for="city" class="sr-only">City</label>
		<input type="text" placeholder="City" value="<?php echo "$row->city"; ?>" name="city" class="form-control" required="" >

		<label for="state" class="sr-only">State</label>
		<input type="text" placeholder="State" value="<?php echo "$row->state"; ?>" name="state" class="form-control" required="" >

		<label for="zip" class="sr-only">Zip</label>
		<input type="text" placeholder="Zip" value="<?php echo "$row->zip"; ?>" name="zip" class="form-control" required="" >

		<label for="phone" class="sr-only">Phone</label>
		<input type="text" placeholder="Phone #" value="<?php echo "$row->phone"; ?>" name="phone" class="form-control" required="" >

		<label for="email" class="sr-only">Email</label>
		<input type="text" placeholder="Email" value="<?php echo "$row->email"; ?>" name="email" class="form-control" required="true" >

		<label for="userID" class="sr-only">User ID</label>
		<input type="text" placeholder="User ID" value="<?php echo "$row->userID"; ?>" name="userID" class="form-control" required="true" >

		<label for="password" class="sr-only">Password</label>
		<input type="text" placeholder="Password" value="<?php echo "$row->password"; ?>" name="password" class="form-control" required="true" >

      		<input type='submit' name='submit' value='Confirm' class='btn btn-primary buy'>
      	</form>		
	</div>
</body>
<?php
	}
$db->close();
?>
</body>
</html>
