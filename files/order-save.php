<?php 
	require 'connection.php';
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	if(strlen($_SESSION['custid'])==0)
	{
	header('location:../user-login.php');
	}
	else {
		header('location:../welcome-user.php');
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['orderBtn']) && isset($_POST['payment_type']) &&isset($_POST['total_price']) && isset($_POST['address']) && isset($_POST['mobile_number']) && isset($_POST['res_id'])){
		        $user_id = $_SESSION['custid'];
		        $payment_type = $_POST['payment_type'];
		        $address = $_POST['address'];
		        $mobile_number = $_POST['mobile_number'];
		        $date = date('Y/m/d H:i:s');
		        $total_price = $_POST['total_price'];
		        $res_id = $_POST['res_id'];
		        
		        $sql="insert into orders (user_id, res_id, payment_type, address, mobile, date, total) values ('$user_id', '$res_id', '$payment_type', '$address', '$mobile_number', '$date', '$total_price')";
		        $result=$conn->query($sql);
	    	}
		}
	}
?>
