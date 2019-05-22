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
	    		    <a href="welcome-restaurant.php" class="active">Add Menu item</a>
	          	</li>
		        <li>
		            <a href="view-orders.php">View Orders</a>
		        </li>
	        </ul>         
	    </div>

	    <div class="content col-md-8 col-md-offset-2"><br>
	        <form action="files/add-item.php" method="post" enctype="multipart/form-data">
	        	<div class="form-group">
				    <label for="item_name">Item Name<b>*</b></label>
				    <input type="text" class="form-control" id="item_name" name="item_name" required/>
				</div>
				<div class="form-group">
					<label for="item_name">Item Image<b>*</b></label>
					<input type="file" name="item_image" class="uploader" onchange="readURL(this);" required />
					<span class="text-muted" style="font-size: 14px;">JPG, GIF or PNG. Max size of 800K</span>
					<div class="preview-area">
						<img id="profileImg" src="" />
					</div>
				</div>
				<div class="form-group">
				    <label for="item_desc">Item Description<b>*</b></label>
				    <input type="text" class="form-control" id="item_desc" name="item_desc" required/>
				</div>
				<div class="form-group">
				    <label for="item_type">Item Type<b>*</b>&nbsp;</label>
				    <input type="radio" name="item_type" value="non-veg" required> Non-Veg &nbsp;
		  			<input type="radio" name="item_type" value="veg" required> Veg
				</div>
				<div class="form-group">
				    <label for="item_price">Item Price<b>*</b></label>
				    <input type="text" class="form-control" id="item_price" name="item_price" required/>
				</div>
				<div class="form-group">
				    <button type="submit" name="addItemBtn" class="btn btn-success">Add Item</button>
				</div>
			</form>
	    </div>
	</div>

	<script type="text/javascript">
		$('.uploader').on('click', function(){
			$('.preview-area').css({
				'display': 'block'
			});
		});

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileImg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>

</body>
</html>
<?php } ?>