<?php 
	require 'files/connection.php';
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	if(strlen($_SESSION['custid'])==0)
	{
	header('location:user-login.php');
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
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		#item_quantity{
			width: 30px;
			float: right;
		}
		.cart-form span{
			margin: 2px 3px; 
		}
		.total-cart-price{
			font-size: 16px;
			font-weight: 400;
		}
		.remove-item{
			margin-left: 15px;
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
	      <a class="navbar-brand active" href="welcome-user.php" style="font-size: 18px;">FoodShala</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	      	<form method="get" action="files/logout.php"> 
		        <li><button name="logout" type="submit" class="btn btn-danger" style="margin-top: 8px;">Logout</button><li>
		    </form>
	      </ul>
	    </div>
	  </div>
	</nav><br><br><br>
	
	<div class="container wrapper">
	    <div class="sidebar">
	        <ul class="list-unstyled components">
	 	        <li>
	    		    <a href="welcome-user.php">Dashborad</a>
	          	</li>
		        <li>
		            <a href="user-cart.php">View Cart</a>
		        </li>
		        <li>
		            <a href="myorders.php" class="active">My Orders</a>
		        </li>
	        </ul>         
	    </div>
	    	
	    <?php 
	    	require 'files/connection.php';
	    	$user_id = $_SESSION['custid'];
	    	$sql = "select * from orders where user_id = '$user_id'";
	    	$result = $conn->query($sql);
	    ?>

	    <div class="content"><br>
	    	<h4>Past Orders</h4>
	    	<?php 
	    		while($row = $result->fetch_assoc()){ ?>
            		    <div class="card">
						    <div class="card-body">
						    	<div class="card-text pull-right" style="margin-top: 10px;">Address - <?php echo ucwords($row['address']); ?></div>
						    	<div class="card-text">Status - <?php echo $row['status']; ?></div>
						        <div class="card-text">Price - <?php echo $row['total']; ?></div>
						        <div class="card-text">Mobile - <?php echo $row['mobile']; ?></div>
						        <?php 
						        	if($row['status'] == 'cancelled by user'){ ?>
						        <?php }else{ ?>
						        	<a class="pull-right btn btn-sm btn-danger remove-item" href="files/cancel-order.php?id=<?php echo $row['id'];?>">Cancel Order</a>
						        <?php } ?>
						        <div class="card-text">Date - <?php echo $row['date']; ?></div>
						    </div>
						</div><hr>	
	    	<?php } ?>
		</div>	
	    		    
	</div>

</body>
</html>
<?php } ?>