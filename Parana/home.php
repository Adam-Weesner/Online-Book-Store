<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
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
        <li><a href="cart.php"><span class="glyphicon glyphicon-send"></span> Order Status</a></li>
	<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart </a></li>
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
      



<h1>Check out our limited edition book sets!</h1>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="https://1.bp.blogspot.com/-sODUUJ_ET_M/WPYO0-o2ekI/AAAAAAAAboc/ZIbvV4eZDb0dK6l_mQoDCNWEn3TziqrvgCLcB/s1600/Screen%2BShot%2B2017-04-18%2Bat%2B12.31.30.png" alt="Lord of The Rings" sytle="width:100%;">
    </div>

    <div class="item">
      <img src="https://images.mentalfloss.com/sites/default/files/styles/mf_image_16x9/public/mosshed.png?itok=mlOXbt3E&resize=1100x1100" alt="Harry Potter" sytle="width:100%;">
    </div>

    <div class="item">
      <img src="https://livesdifferently.files.wordpress.com/2016/01/hunger-games-book-covers.png?w=788" alt="The Hunger Games" style="width:100%;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
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



<?php

	$selection = $_POST['selection'];
	$query = "SELECT * FROM books WHERE subject = '$selection'";
	$result = mysqli_query($db, $query);
	$rows = $result->num_rows;

	if(isset($_POST['submit']) && $rows != 0) {
		try {
			$count=0;
			$myarray = array();
			while ($count < mysqli_num_fields($result))
			{
			     $fld = mysqli_fetch_field($result, $count);

			     $myarray[] = $fld->name;

			     $count++;
			}

			echo "<table style='border:1px solid #ccc;'>\n";
			echo "<thead>\n";
			echo "<tr>\n";
			foreach($myarray as $columnHead) {
			    echo "<th>".$columnHead."</th>\n";
			}
			echo "</tr>\n";
			echo "</thead>\n";
			echo "<tbody>\n";
			if (mysqli_num_rows($result) > 0) {
			    while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>\n";
				foreach($row as $td) {
				    echo "<td>".$td."</td>";
				}
				echo "</tr>\n";
			    }
			}
			echo "</tbody>\n";
			echo "</table>";
		}
		catch(Exception $e){
			echo "<script>alert('Cannot find subject. Please try again.');</script>";
		}
	}


	session_start();
	$_SESSION['isbn'] = $_POST['isbn'];

	if(isset($_POST['add'])) {
		try {
				echo "<script type='text/javascript'>location.href = 'cart.php';</script>";
			
		}
		catch(Exception $e){
		}
	}

	if(isset($_POST['one'])) {
		try {

$isbn = $_POST['isbn'];
$look = "SELECT * FROM books WHERE isbn = '$isbn'";
$result2 = mysqli_query($db,$look);
$row2 = mysqli_fetch_object($result2);
$title = $row2->title;
$price = $row2->price;

$update2 = "INSERT INTO $user (book, total) VALUES ('$title', $price)";

if(mysqli_query($db, $update2)){
		echo "<script type='text/javascript'>location.href = 'cart.php';</script>";
} else{
    echo "ERROR: Could not able to execute $update2. " . mysqli_error($db);
}
		
			
			
		}
		catch(Exception $e){
		}
	}
?>
</body>
</html>
