<!DOCTYPE html>
<html lang="en">

<?php 
	session_start();
	$isbn = $_SESSION['isbn'];
	$user = $_SESSION['userid'];

  $db = new mysqli('localhost','root','root','bookstore');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
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
	<li><a href="Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart </a></li>
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
$query = "SELECT * FROM $user";
$result = mysqli_query($db,$query);

echo "<table border='1'>
<tr>
<th>Books Purchased</th>
<th>Price</th>
</tr>";

$total = 0.00;

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['book'] . "</td>";
echo "<td>" . $row['total'] . "</td>";
echo "</tr>";
$total += $row['total'];
}
echo "</table>";

echo "<br><table border='1'>
<tr>
<th>Total</th>
</tr>";
echo "<tr>";
echo "<td>" . number_format((float)$total, 2, '.', '') . "</td>";
echo "</tr>";
echo "</table>";


if(isset($_POST['add'])) {


$temp = $_POST['bookIsbn'];
$look = "SELECT * FROM books WHERE isbn = '$temp'";
$result2 = mysqli_query($db,$look);
$row2 = mysqli_fetch_object($result2);
$title = $row2->title;
$price = $row2->price;

$update2 = "INSERT INTO $user (book, total) VALUES ('$title', $price)";

if(mysqli_query($db, $update2)){
	header("Refresh:0");
} else{
    echo "ERROR: Could not able to execute $update2. " . mysqli_error($db);
}
		
}
?>

    
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
</html>
