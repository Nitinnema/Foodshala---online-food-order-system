<?php 
	require 'connection.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['resSignupBtn']) && isset($_POST['res_name']) && isset($_POST['res_email']) && isset($_POST['res_number']) && isset($_POST['res_city']) && isset($_POST['res_password'])){

	        $res_name = $_POST['res_name'];
	        $res_email = $_POST['res_email'];
	        $res_number = $_POST['res_number'];
	        $res_city = $_POST['res_city'];
	        $res_password = $_POST['res_password'];
	        $hashrespassword = md5($res_password);


	        $sql="insert into restaurants (res_name, res_email, res_number, res_city, res_password) values ('$res_name', '$res_email', '$res_number', '$res_city', '$hashrespassword')";
	        $result=$conn->query($sql);
	        if($result){
	        	echo "Data inserted successfully.Please login to continue !!";
	        	header( "refresh:1; url=../restaurant-login.php" );
	        }
	        else
	        	echo "error occured";

    	}
	}
?>