<?php 
	require 'connection.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['userSignupBtn']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['preference']) && isset($_POST['contact_number']) && isset($_POST['password'])){

	        $first_name = $_POST['first_name'];
	        $last_name = $_POST['last_name'];
	        $email = $_POST['email'];
	        $preference = $_POST['preference'];
	        $contact_number = $_POST['contact_number'];
	        $password = $_POST['password'];
	        $hashpassword = md5($password);


	        $sql="insert into customers (first_name, last_name, email, preference, contact_number, password) values ('$first_name', '$last_name', '$email', '$preference', '$contact_number', '$hashpassword')";
	        $result=$conn->query($sql);
	        if($result){
	        	echo "data inserted successfully";
	        	header( "refresh:1; url=../index.php" );
	        }
	        else
	        	echo "error occured";

    	}
	}
?>