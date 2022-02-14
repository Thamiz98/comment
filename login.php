<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<?php      
    include('connection.php');  
    $email = $_POST['email'];  
    $upswd1 = $_POST['upswd1'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $upswd1 = stripcslashes($upswd1);  
        $email = mysqli_real_escape_string($con, $email);  
        $upswd1 = mysqli_real_escape_string($con, $upswd1);  
      
        $sql = "select *from register where email = '$email' and upswd1 = '$upswd1'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?> 
<?php
if($count == 1) {
?>
<div class="box">
 <form name="myform"  action="comment.php" method="POST" >
				 <p>What would you like to share with the world</p>
				 <textarea name="comment" cols="40" rows="5"></textarea><br><br>
				<input type="submit" name="" value="submit">
			</form>
			</div> 
<?php
}
?>
</html>
</body>