<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "clothes";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>


<?php


if(isset($_POST['submit'])){
	
	//echo print_r($_POST);
	
	// Often these are form values in $_POST

	$email = $_POST['email'];
	
        $password = $_POST["password"]; 

		
			// 2. Perform database query
	$query  = "SELECT * FROM users WHERE email = '{$email}' AND  password = '{$password}' ";
	
	$result = mysqli_query($connection, $query);

	





        if(mysqli_num_rows($result)>0)
        { 

	$row = mysqli_fetch_assoc($result);

$cookie_name = "user_id";
$cookie_value = $row["email"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	
	
	
echo "<script>window.open('items.php','_self')</script>";

	

		
 
        }
        else {

		echo "<script>alert('Email or password is not correct, try again!')</script>";
		}
		
	
}
	
?>
<!DOCTYPE html>
<html>
<style>
form {
    border: 3px yellow;
}
label
{
    font-size:30px;
    color:white;
}
input[type=text], input[type=password] {
    width: 40%;
    padding: 12px 20px;
    background-color:blue;

    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;

}

.imgcontainer {
    text-align: center;
    margin: 2px 0 2px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
    background-color:black;
}

.container {
    padding: 16px;
    color:white;

}

span.psw {
    float: right;
    padding-top: 16px;
}


@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>

<label><h1>Login Form</h1></label>
<body background="login.jpg">

<form action="login.php" method="post">
  

  <div class="container">
    <label><b><font color="blue">EMAIL: </font></b></label>
   <p> <input type="text" placeholder="Enter Username" name="email" required><br></p>
    <label><b><font color="blue">PASSWORD:</font></b></label>
   <p> <input type="password" placeholder="password" name="password" required><br></p>
        
    <input type="submit" name="submit" value="Login" style="height:35px; width:95px; background-color:green">
	<input type="button" value="Cancel" onclick="window.location.href='http://localhost/php/home.php'" style="height:35px; width:95px; background-color:blue" />
 
  </div>

  <div class="container" style="background-color:#blue">
  </div>
</form>

</body>
</html>