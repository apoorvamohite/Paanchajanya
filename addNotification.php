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
		
		$file = $_FILES['file'];
		
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		
		$fileExt = explode('.',$fileName );
		$fileActualExt = strtolower(end($fileExt));
		
		$allowed = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt');
		
		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 100000000){
					$fileNameNew = uniqid('',true).'.'.$fileActualExt;
					$fileDestination = 'upload/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
				}else{
					echo "Your file is too big!";
				}
			}else{
				echo "There was an error uploading this file!";
			}
		}else{
			echo "You cannot upload files of this type!";
		}

    $sql = "INSERT INTO notifiacations(description, file) VALUES('$desc', '$fileNameNew')";
    mysqli_query($con, $sql);
	header("Location: adminHome.php?success=true");
	
?>