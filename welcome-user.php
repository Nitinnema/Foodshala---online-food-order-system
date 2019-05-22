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
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		div.col-sm-4{
			margin-bottom: 20px; 
		}
		div.card-body p{
			font-size: 13px;
			margin-top: -10px;
		}
		div.res-info{
			margin-bottom: 8px;
		}
		#item_quantity{
			width: 30px;
			float: right;
		}
		.cart-form span{
			margin: 2px 3px; 
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
	    		    <a href="welcome-user.php" class="active">Dashborad</a>
	          	</li>
		        <li>
		            <a href="user-cart.php" >View Cart</a>
		        </li>
		        <li>
		            <a href="myorders.php">My Orders</a>
		        </li>
	        </ul>         
	    </div>
	    	
	    <?php 
	    	require 'files/connection.php';
	    	$sql = "select menu_items.*, restaurants.res_name from menu_items, restaurants where menu_items.res_id=restaurants.id";
	    	$result = $conn->query($sql);
	    ?>

	    <div class="content"><br>
	    	<?php 
	    		while($row = $result->fetch_assoc()){ ?>
	    			<div class="col-sm-4">
            		    <div class="card" style="width:24rem;">
						    <img class="card-img-top" src="<?php echo $row['item_imagepath']; ?>" alt="Card image" style="width:100%; height: 160px;">
						    <div class="card-body">
						        <h4 class="card-title"><?php echo ucwords($row['item_name']); ?></h4>
						        <p class="card-text pull-right"><?php echo ucfirst($row['item_type']); ?></p>
						        <p class="card-text"><?php echo ucfirst($row['item_desc']); ?></p>
						        <div class="card-text res-info">Restaurant Name - <?php echo ucwords($row['res_name']) ?></div>
						        <form class="cart-form" action="files/add-cart.php" method="post">
						        	<input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
						        	<input type="hidden" name="res_id" value="<?php echo $row['res_id']; ?>">
						        	<input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>">
						        	<input type="hidden" name="item_price" value="<?php echo $row['item_price']; ?>">
						        	<input type="text" id="item_quantity" name="item_quantity" value="1" required />
						        	<span class="pull-right"> x </span>
						        	<button name="addCartBtn" id="addCartBtnid" class="btn btn-sm btn-info pull-right">Add</button>
						        </form>	
						        <div class="card-text" style="margin-top: 10px;"><?php echo '₹'.$row['item_price']; ?></div>
						    </div>
						</div>
        			</div>
	    	<?php } ?>
		</div>		
	    		    
	</div>

	<script type="text/javascript">
		$('#addCartBtnid').on('click', function(){
			alert("Item added successfully!!");
		});	
	</script>

</body>
</html>
<?php } ?>