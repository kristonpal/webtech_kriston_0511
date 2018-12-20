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

if($_GET["id"]){
	$id = $_GET["id"];
	
	$query = "insert into orders (items_id, users_id) values ({$id}, 1 ) ";
	
	$result = mysqli_query($connection, $query);

	if ($result) {
		// Success
		//header('Location: items.php'); 
		echo "<script>window.open('items.php?order=success')</script>";
		//echo "Ordered!";
	} else {
		// Failure
	// $message = "Subject creation failed";
		die("Database query failed. " . mysqli_error($connection));
	}
	
}else {
	//echo "<script>window.open('items.php','_self')</script>";

}
	
?>