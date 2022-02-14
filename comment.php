<html>
<body>
<?php
$comment  = $_POST['comment'];
if (!empty($comment) || empty($comment))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "register";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT comment From register";
  $INSERT = "INSERT Into register (comment)values(?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->execute();
     $stmt->bind_result($comment);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	 	echo "<h1><center>Comments saved in database</h1></center>";
	 ?>
	 <h1><a href="index.html">Go to home page</a></h1>
	<?php 
     $stmt->close();
     $conn->close();
    }
}
 die();
?>

</html>
</body>