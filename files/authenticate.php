<?php 
	require 'connection.php';
	error_reporting(E_ERROR | E_PARSE);
    session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['userSigninBtn']) && isset($_POST['email']) && isset($_POST['password'])){

	        $email = $_POST['email'];
	        $password = $_POST['password'];
	        $hashpassword = md5($password);

	        $sql="select * from customers where email='$email' and password='$hashpassword'";
	        $result=$conn->query($sql);
	        $row = $result->fetch_assoc();
			$id = $row['id'];
	        $count = mysqli_num_rows($result);
	        if($count == 1) {
	        	$_SESSION['custid'] = $id;
		        echo "You successfully logged in!! You are being redirected..";
		        header( "refresh:1; url=../welcome-user.php" );
		    }else {
		        $error = "Your Login Name or Password is invalid";
		    }
    	}
	}
?>