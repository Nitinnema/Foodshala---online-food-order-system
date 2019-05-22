<?php 
	require 'files/connection.php';
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	if(strlen($_SESSION['restid'])==0)
	{
	header('location:restaurant-login.php');
	}
	else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>FoodShala</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		.preview-area{
			width: 180px;
			height: 150px;
			display: none;
		}
		.preview-area img{
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top" style="font-size: 16px;">
	  <div class="container">
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
		    </button>
	      <a class="navbar-brand active" href="welcome-restaurant.php" style="font-size: 18px;">FoodShala - for restaurants</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	      	<form method="get" action="files/logout.php"> 
		        <li><button name="res_logout" type="submit" class="btn btn-danger" style="margin-top: 8px;">Logout</button><li>
		    </form>
	      </ul>
	    </div>
	  </div>
	</nav><br><br><br>

	<!-- side bar -->
	<div class="container wrapper">
	    <div class="sidebar">
	        <ul class="list-unstyled components">
	 	        <li>
	    		    <a href="welcome-restaurant.php">Add Menu item</a>
	          	</li>
		        <li>
		            <a href="view-orders.php" class="active">View Orders</a>
		        </li>
	        </ul>         
	    </div>

	    <?php 
	    	require 'files/connection.php';
	    	$restid = $_SESSION['restid'];
	    	$sql = "select * from orders where res_id = '$restid'";
	    	$result = $conn->query($sql);
	    ?>

	    <div class="content"><br>
	        <?php 
	        	while ($row = $result->fetch_assoc()) { ?>
	        		<div class="card">
						    <div class="card-body">
						    	<div class="card-text pull-right" style="margin-top: 10px;">Address - <?php echo ucwords($row['address']); ?></div>
						    	<div class="card-text">Status - <?php echo $row['status']; ?></div>
						        <div class="card-text">Price - <?php echo $row['total']; ?></div>
						        <div class="card-text">Mobile - <?php echo $row['mobile']; ?></div>
						        <div class="card-text">Date - <?php echo $row['date']; ?></div>
						    </div>
						</div><hr>
	        <?php } ?>
	    </div>
	</div>

</body>
</html>
<?php } ?>