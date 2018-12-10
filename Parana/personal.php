<!DOCTYPE html>
<html lang="en">

<?php 
	session_start();
	$user = $_SESSION['userid'];
?>

<html>
  <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="files/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    	<div class="navbar-header">
     		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
		<span class= "sr-only">Toggle Nav</span>
        	</button>
    		<a class = "navbar-brand" href="home.php">
	  	<img style="max-width:300px; margin-top: -12px;" src="files/Parana.png" alt="Parana"></a>
  	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav navbar-right">
		<li><a href="personal.php"><span class="glyphicon glyphicon-wrench"></span> Edit Profile</a></li>
		<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      		</ul>
	</div>
  </div>
</nav>










<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       		<span class="icon-bar"></span>
        	<span class="icon-bar"></span>    
     		</button>
      	</div>
	<div class="collapse navbar-collapse" id="myNavbar"></div>
		<ul class="nav navbar-nav">
		<li><form class="form-inline" action="search.php">
	
		<div class="form-inline form-signin">
				<select name="selection" method='post'>
				<option>All</option>		
				<option>Author</option>
				<option>Title</option>
				<option>ISBN</option>
				</select></li>
	<li><div class ="input-group">
	<input type="text" class="form-control" placeholder="Search" name="search"></li>
	
	<div class="input-group-btn">
		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	
	</form>
	</ul>

	<ul class="nav navbar-nav navbar-right">
        <li><a href="orderStatus.php"><span class="glyphicon glyphicon-send"></span> Order Status</a></li>
	<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart </a></li>
      </ul>
</div>
</div>
</nav>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">All</a></p>
      <p><a href="#">Children</a></p>
      <p><a href="#">Computer</a></p>
      <p><a href="#">General</a></p>
      <p><a href="#">Romance</a></p>
      <p><a href="#">Sports</a></p>
      <p><a href="#">Thrillers</a></p>
    </div>
    <div class="col-sm-8 text-left"> 

<?php
  $db = new mysqli('localhost','root','root','bookstore');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

	
	$query2 = "SELECT * FROM members WHERE userid = '$user'";
	$result2 = mysqli_query($db, $query2);
	$row = mysqli_fetch_object($result2);

	if(isset($_POST['submit'])) {
		try {

		$update = "UPDATE members SET fName='".$_POST['fName']."', lName='".$_POST['lName']."', street='".$_POST['street']."', city='".$_POST['city']."', state='".$_POST['state']."', zip='".	$_POST['zip']."', phone='".$_POST['phone']."', email='".$_POST['email']."', password='".$_POST['password']."' where userid = '$user'";

		$result = $db->query($update);

		}
		catch(Exception $e) {
          echo "Message:" .$e->getMessage();
        }
 
        echo "<script type='text/javascript'>location.href = 'home.php';</script>";
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
    
      <hr>
      <h3></h3>
      <p></p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
</body>
<?php
	}
$db->close();
?>
</body>
</html>
