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
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$phone_number = $_POST['phone_number'];
		
	// 2. Perform database query
	
	$query  = "SELECT * FROM users WHERE email = '{$email}' ";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>=1)
            {
				echo "User Already Exists";
            }
			else{
	
	$query  = "INSERT INTO users (";
	$query .= "  name, email, password, address, phone_number";
	$query .= ") VALUES (";
	$query .= "  '{$name}', '{$email}', '{$password}', '{$address}', {$phone_number}";
	$query .= ")";

	$result = mysqli_query($connection, $query);

	if ($result) {
		// Success
		//redirect_to("home.php");
		echo "Success!";
	} else {
		// Failure
	// $message = "Subject creation failed";
		echo "Incomplete information ";
	}
			}
}

	
?>




<html>
<head>
<title>Register page</title>
<script type="text/javascript">
	function ValidateEmail(email) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}

</script>

</head>
<body bgcolor="gray" background="register1.jpg" text="red">
<center>
<table background="register.jpg"  height="500px" width="350px">
<th>GATE ENTRY REGISTER </th>
<form action="register.php" method="post">
<tr>
	<td>
		NAME:
		<p><input type="text" name="name" value="" maxlength="30" size="40px"/></p>
	</td>
</tr>

<tr>
	<td>
		EMAIL:
		<p><input type="email" name="email" placeholder="Email" maxlength="30" size="40px" onsubmit="return ValidateEmail()" required /></p>
	</td>
</tr>

<tr>
	<td>
		PASSWORD:
		<p><input type="password" name="password" value="" maxlength="20" size="40px"/></p>
	</td>
</tr>

<tr>
	<td>
		CONTACT NO:
		<p><input type="text" name="phone_number" value="" maxlength="13" size="40px"/></p>
	</td>
</tr>
<tr>
	<td>
		ADDRESS:
		<p><input type="text" name="address" value=" " maxlength="50" size="40px"/></p>
	</td>
</tr>


<tr>
	
	<td>
	    
		<input type="submit" name="submit" value="REGISTER" style="height:35px; width:110px; background-color:green"/>
		<input type="button" value="Go to Homepage" onclick="window.location.href='http://localhost/php/home.php'" style="height:35px; width:112px; background-color:blue"/>
	</td>

	
</tr>
</form>
</table>

</body>
</html>