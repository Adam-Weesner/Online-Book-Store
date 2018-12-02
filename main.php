<html>

<head>
	
<title>Simple Database Access</title>

</head>



<body>
	
<?php
	

$username="root";
	
$password="";
	
$database="bookstore";
	
$host="localhost";
	
$conn = mysqli_connect($host, $username, $password, $database);


if (mysqli_connect_errno()) 
{
		
	die("Database connection failed: " .
		
	mysqli_connect_error() . 
	" (" > mysqli_connect_errno() . ")" );
	
}

$query = "SELECT * FROM books";
	
$result = mysqli_query($conn, $query);
	
if (!$result) {
		
	die("Database Query Failed");
	
}

?>


<h4>List of books</h4>

	<table border="2" cellspacing="2" cellpadding="2">
<tr>
	
<th><font face="Arial, Helvetica, sans-serif">
Title</font></th>
	
<th><font face="Arial, Helvetica, sans-serif">Author</font></th>
	
<th><font face="Arial, Helvetica, sans-serif">ISBN</font></th>

	<th><font face="Arial, Helvetica, sans-serif">
Subject</font></th>

	<th><font face="Arial, Helvetica, sans-serif">Price</font></th>

</tr>


<?php
	
while ($fetch=mysqli_fetch_array($result)) {
			
	$title=$fetch['title'];
		
	$author=$fetch['author'];
		
	$isbn=$fetch['isbn'];
		
	$subject=$fetch['subject'];
		
	$price=$fetch['price'];
			
?>

	
	<tr>
	
<td><font face="Arial, Helvetica, sans-serif">

	<?php echo $title; ?></font></td>
	
	<td><font face="Arial, Helvetica, sans-serif">
	
	<?php echo $author; ?></font></td>
	
	<td><font face="Arial, Helvetica, sans-serif">
	
	<?php echo $isbn; ?></font></td>
	
	<td><font face="Arial, Helvetica, sans-serif">
	
	<?php echo $subject; ?></font></td>
	
	<td><font face="Arial, Helvetica, sans-serif">
	
	<?php echo $price; ?></font></td>
		
	</tr>
	
<?php
	
}

?>

</table>

</body>

</html>
