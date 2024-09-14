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
<title>Online Furniture Store Management System::Order Detail Page</title>
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+700+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
		 <strong style="color: red">#<?php echo $oid=$_GET['orderid'];?> Order Details</strong>

		 	<?php 
$userid= $_SESSION['ofsmsuid'];
$sql1="SELECT * from tblorder where UserID=:userid && OrderNumber=:odid";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query1-> bindParam(':odid', $oid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>
<p style="color:#000"><b>Order Date : </b><?php echo $row1->OrderDate;?></p>
	<p style="color:#000"><b>Payment Type: : </b><?php echo $row1->payType;?></p>
<p style="color:#000"><b>Order Status :</b> <?php if($row1->Status==""){
	echo "Waiting for confirmation";
} else {
echo $row1->Status;
}?> &nbsp;
(<a href="javascript:void(0);" onClick="popUpWindow('trackorder.php?odid=<?php echo $oid;?>');" title="Track order" style="color:#000"> Track order
</a>)</p>
<a href="javascript:void(0);" onClick="popUpWindow('invoice.php?odid=<?php echo $oid;?>');" title="Invoice" style="color:red; font-weight:bold;"> Invoice
</a>

<?php }} ?>
		 <div class="cart-items">
			
			
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			   			 <table class="table table-bordered" cellpadding="10" cellspacing="1" style="padding-top: 20px">
<tbody>
			   <tr>
	<th style="text-align:left;">Product Image</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Order Number</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Price</th>

</tr>	
			   						<?php 
$userid= $_SESSION['ofsmsuid'];
$oid= $_GET['orderid'];
$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblproducts.ProductTitle,tblproducts.SalePrice,tblproducts.Image,tblorderdetails.ProductId,tblorderdetails.ProductQty from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblproducts on tblorderdetails.ProductId=tblproducts.ID 
where tblorder.UserID=:userid and tblorder.OrderNumber=:odid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query-> bindParam(':odid', $oid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>



				<tr>
				<td><img class="b-goods-f__img img-scale" src="admin/images/<?php echo $row->Image;?>" alt="" width='200' height='120'></td> 
				<td><?php echo $row->ProductTitle;?></td>
				<td><?php echo $row->OrderNumber;?></td>
				<td><?php echo $qty=$row->ProductQty;?></td>
				<td><?php echo $total=$row->SalePrice;?></td>

       </tr>



       <?php
$grandtotal+=$total;
$gqty+=$qty;
        $cnt=$cnt+1; }} ?>
       <tr>
<td colspan="3" align="right">Total:</td>
<td><strong><?php echo $gqty; ?></strong></td>
<td><strong><?php echo "Rs. ".number_format($grandtotal, 2); ?></strong></td>
</tr>
</tbody>
</table>
		
	<p style="color:red;padding-bottom: 20px">
        <a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $oid;?>');" title="Cancel this order" style="color:red">Cancel this order </a>
    </p>		
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