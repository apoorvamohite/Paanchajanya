<?php
//session_start();

	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "paanchajanya";

	$con = mysqli_connect($host, $username, $password);

	// Check connection
	if (!$con) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_select_db($con, $dbname);

$desc = $_POST['description'];

$sql = "INSERT INTO notifications(description) VALUES('$desc')";
mysqli_query($con, $sql);
header("Location: adminHome.php?success=true");
?>