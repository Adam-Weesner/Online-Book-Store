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
  <title>Parana Bookstore</title>
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
		<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart </a></li>
        	<li><a href="personal.php"><span class="glyphicon glyphicon-wrench"></span> Edit Profile</a></li>
		<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      		</ul>
	</div>
  </div>
</nav>


<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
		<li><form class="form-inline" method="post">
	
		<div class="form-inline form-signin">
				<select class="form-control" name="selection">	
				<option>ISBN</option>
				<option>Author</option>
				<option>Title</option>
				</select></li>
	<li><div class ="input-group">
	<input type="text" class="form-control" placeholder="Search" name="search"></li>
	
		<button name="searchButton" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	</form>
	</ul>


</nav>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
	<form method='post'>
		<button class="btn btn-lg btn-primary btn-block" name='all' type="submit">All</button>
		<button class="btn btn-lg btn-primary btn-block" name='general' type="submit">General</button>
		<button class="btn btn-lg btn-primary btn-block" name='fiction' type="submit">Fiction</button>
		<button class="btn btn-lg btn-primary btn-block" name='children' type="submit">Children</button>
		<button class="btn btn-lg btn-primary btn-block" name='science' type="submit">Science</button>
		<button class="btn btn-lg btn-primary btn-block" name='computer' type="submit">Computer Science</button>
	</form>
    </div>

<?php
	if(isset($_POST['all'])) {
		$_SESSION['subject'] = "ALL";
		header("Location:browse.php");
	}
	else if(isset($_POST['general'])) {
		$_SESSION['subject'] = "GENERAL";
		header("Location:browse.php");
	}
	else if(isset($_POST['fiction'])) {
		$_SESSION['subject'] = "FICTION";
		header("Location:browse.php");
	}
	else if(isset($_POST['children'])) {
		$_SESSION['subject'] = "CHILDREN";
		header("Location:browse.php");
	}
	else if(isset($_POST['science'])) {
		$_SESSION['subject'] = "SCIENCE";
		header("Location:browse.php");
	}
	else if(isset($_POST['computer'])) {
		$_SESSION['subject'] = "COMPUTER SCIENCE";
		header("Location:browse.php");
	}

?>
<div class="col-sm-8 text-left"> 

<form method='post'><br>
	<label for="subject" class="sr-only">Add ISBN to Cart:</label>
		<input type="text" name="bookIsbn" value="<?php echo "$isbn"; ?>" placeholder="ISBN" required="true">

<button class="btn btn-lg btn-primary" name='add' type="submit">Add</button>
</form><br>

<?php	
$query = "SELECT * FROM $user";
$result = mysqli_query($db,$query);

echo "<table class='table'>
<tr>
<th scope='col'>Books Purchased</th>
<th scope='col'>Price</th>
</tr>";

$total = 0.00;

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td scope='row'>" . $row['book'] . "</td>";
echo "<td scope='row'>" . $row['total'] . "</td>";
echo "</tr>";
$total += $row['total'];
}
echo "</table>";

echo "<br><table class='table'>
<tr>
<th scope='col'>Total</th>
</tr>";
echo "<tr>";
echo "<td scope='row'>" . number_format((float)$total, 2, '.', '') . "</td>";
echo "</tr>";
echo "</table>";


if(isset($_POST['add'])) {


$temp = $_POST['bookIsbn'];
$look = "SELECT * FROM books WHERE isbn = '$temp'";
$result2 = mysqli_query($db,$look);
$row2 = mysqli_fetch_object($result2);
$title = $row2->title;
$price = $row2->price
;

$update2 = "INSERT INTO $user (book, total) VALUES ('$title', $price)";

if(mysqli_query($db, $update2)){
	header("Refresh:0");
} else{
    echo "ERROR: Could not able to execute $update2. " . mysqli_error($db);
}
		
}

$selection = $_POST['search'];
	$subject = $_POST['selection'];
	$query = "SELECT * FROM books WHERE $subject = '$selection'";
	$result = mysqli_query($db, $query);
	$rows = $result->num_rows;

	if(isset($_POST['searchButton']) && $rows != 0) {
		
		session_start();
		$_SESSION['subject'] = $selection;
		$_SESSION['selection'] = $subject;

		echo "<script type='text/javascript'>location.href = 'search.php';</script>";
	} else if (isset($_POST['searchButton'])) {
		echo "<script>alert('ERROR - Cannot find $selection in $subject');</script>";
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
</footer>
</body>
</html>
