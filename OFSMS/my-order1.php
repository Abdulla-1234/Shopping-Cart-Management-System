<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsuid']==0)) {
  header('location:logout.php');
  } else{


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Furnyish Store a Ecommerce Category Flat Bootstarp Responsive Website Template | Cart :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
  <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<!-- header -->

<?php include_once('includes/header.php');?>
<!---->
<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="men.html">Home</a></li>
		  <li class="active">My Order</li>
		 </ol>			
		 <div class="cart-items">
			 <h2>Your Order Detail</h2>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			   						<?php 
					$userid= $_SESSION['ofsmsuid'];

$sql="SELECT * from  tblorder 
where UserID=:userid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			 <div class="cart-header">
		
				 <div class="cart-sec">
						<div class="cart-item cyc">
							 <img src="images/images (2).jpg"/>
						</div>

					   <div class="cart-item-info">
							 <h3>Order #<?php  echo $row->OrderNumber;?><span>
							 	Order Date: <?php  echo $row->OrderDate;?></span></h3>
				 <p style="padding-top: 20px">Order Status: <?php $status=$row->Status;
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

                                                    ?></p>
							 
					   </div>
					   	<div class="delivery">
							<a href="javascript:void(0);" onClick="popUpWindow('trackorder.php?oid=<?php echo htmlentities($row->OrderNumber);?>');" title="Track order"><strong style="color: red">Track Order</strong></a>
							<a href="order-detail.php?orderid=<?php echo $row->OrderNumber;?>" class="btn theme-btn-dash"><strong style="color: blue">View Details</strong></a>					 
				        </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div><?php $cnt=$cnt+1; }} ?>
		
					
		 </div>
		 
	
	 </div>
</div>
<!---->
<?php include_once('includes/footer.php');?>
<!---->

</div>
<!---->
</body>
</html>
<?php } ?>