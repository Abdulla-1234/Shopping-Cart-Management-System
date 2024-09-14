<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Furniture Store Management System|| Home Page</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
  <script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
		 nav: true,
		 speed: 500,
		 namespace: "callbacks",
      });
    });
  </script>
  
</head>
<body>
<!-- header -->
<?php include_once('includes/header.php');?>
<!---->
<div class="content">
	 <div class="container">
		 <div class="slider">
				<ul class="rslides" id="slider1">
				  <li><img src="images/banner2.jpg" alt=""></li>
				  <li><img src="images/banner1.jpg" alt=""></li>
				  <li><img src="images/banner3.jpg" alt=""></li>
				</ul>
		 </div>
	 </div>
</div>
<!---->
<div class="bottom_content">
	 <div class="container">
		 <div class="sofas">
			 <div class="col-md-6 sofa-grid">
				 <img src="images/t1.jpg" alt=""/>
				 <h3>IMPORTED DINING SETS</h3>
				
			 </div>
			 <div class="col-md-6 sofa-grid sofs">
				 <img src="images/t2.jpg" alt=""/>
				 <h3>SPECIAL DESIGN SOFAS</h3>
				
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<br />
<!---->
<div class="top-sellers">
	 <div class="container">
		 <h3>TOP - SELLERS</h3>
		 <div class="seller-grids">
		 	<?php

$sql="SELECT * from  tblproducts order by rand() limit 12";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			 <div class="col-md-3 seller-grid"  style="height:300px;">
				 <a href="single-product-detail.php?proid=<?php echo $row->ID;?>"><img src="admin/images/<?php echo $row->Image;?>" alt="" width="100" height="100"/></a>
				 <h4><a href="single-product-detail.php?proid=<?php echo $row->ID;?>"><?php echo $row->ProductTitle;?></a></h4>
				 <span>ID: <?php echo $row->ProductID;?></span>
				 <p>Rs. <?php echo $row->RegularPrice;?>/-</p>
			 </div><?php $cnt=$cnt+1;}}?>
			 
			
			
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="recommendation">

</div>
<!---->
<?php include_once('includes/footer.php');?>
<!---->
</body>
</html>