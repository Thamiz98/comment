<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<?php

$email  = $_POST['email'];
$upswd1 = $_POST['upswd1'];
$secret = $_POST['secret'];




if (!empty($email) || !empty($upswd1) || !empty($secret) )
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
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (email ,upswd1, secret )values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $email,$upswd1,$secret);
      $stmt->execute();
?>
<div class="box">
 <form name="myform"  action="comment.php" method="POST" >
				 <p>What would you like to share with the world</p>
				 <textarea name="comment" cols="40" rows="5"></textarea><br><br>
				<input type="submit" name="" value="submit">
			</form>
			</div>
<?php
     } else {
      echo "<h1><center>Someone already register using this email</h1></center>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "<h1><center>All field are required</h1></center>";
 die();
}
?>
</html>
</body>