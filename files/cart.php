<!DOCTYPE html>
<html lang="en">

<?php 
	session_start();
	$isbn = $_SESSION['isbn'];
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
	</ul>
</div>

<form method='post'><br>
	<label for="subject" class="sr-only">Add ISBN to Cart (May need to double-click):</label>
			<input type="text" name="isbn" value="<?php echo "$isbn"; ?>" class="form-control" placeholder="ISBN" required="true">
	<button class="btn btn-lg btn-primary btn-block" name='add' type="submit">Add</button>
</form><br>

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

		try {

$look = "SELECT * FROM books WHERE isbn = '$isbn'";
$result2 = mysqli_query($db,$look);
$row2 = mysqli_fetch_object($result2);
$title = $row2->title;
$price = $row2->price;

echo "<p><font color='white'>$user and $title</font></p>";
$update = "INSERT INTO $user (book, total) VALUES ('$title', $price)";
$result3 = $db->query($update);
			
		}
		catch(Exception $e){
		}
}
?>
</body>
</html>
