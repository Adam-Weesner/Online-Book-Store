<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	$user = $_SESSION['userID'];

  $db = new mysqli('localhost','root','root','bookstore');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
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

<form method='post'><br>
	<label for="subject" class="sr-only">Add ISBN to Cart:</label>
			<input type="text" name="isbn" class="form-control" placeholder="ISBN" required="true">
	<button class="btn btn-lg btn-primary btn-block" name='add' type="submit">Add</button>
	<button class="btn btn-lg btn-primary btn-block" name='one' type="submit">1-Click Checkout</button>
</form>

	</ul>

<body class="text-center">
	<form class="form-signin" method='post'>
		<h1 class="h3 mb-3 font-weight-normal"><font color="white">Search for a Subject:</font></h1>

<select name="selection" method='post'>
  <option value="author">Author</option>
  <option value="title">Title</option>
</select>
<br><br>
		<label for="subject" class="sr-only">Subject</label>
		<input type="text" name="subject" class="form-control" placeholder="Subject" required="true">

		<br><br>
		<button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Search</button>
	</form>

<?php
	$subject = $_POST['subject'];
	$selection = $_POST['selection'];
	$query = "SELECT * FROM books WHERE $selection = '$subject'";
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
