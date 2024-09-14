<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsuid']==0)) {
  header('location:logout.php');
  } else{
if(!empty($_GET["action"])) {
switch ($_GET["action"]) {

// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
			unset($_SESSION['tprice']);
			header('location:cart.php');
	break;

}
}
 if(isset($_POST['submit']))
  {
  	
  	
 $fname=$_POST['fname'];
  $cnumber=$_POST['cnumber'];
 $fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$zcode=$_POST['zipcode'];
$state=$_POST['state'];
$userid=$_SESSION['ofsmsuid'];
$patype=$_POST['paytype'];
 $ordernumber=mt_rand(100000000, 999999999);
$sql="insert into tblorder(OrderNumber,UserID,FullName,ContactNumber,FlatNo,StreetName,Area,Landmark,City,Zipcode,State,payType)values(:ordernumber,:userid,:fname,:cnumber,:fnaobno,:street,:area,:lndmark,:city,:zcode,:state,:patype)";
$query=$dbh->prepare($sql);
$query->bindParam(':ordernumber',$ordernumber,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':cnumber',$cnumber,PDO::PARAM_STR);
$query->bindParam(':fnaobno',$fnaobno,PDO::PARAM_STR);
$query->bindParam(':street',$street,PDO::PARAM_STR);
$query->bindParam(':area',$area,PDO::PARAM_STR);
$query->bindParam(':lndmark',$lndmark,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':zcode',$zcode,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':patype',$patype,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
$quantity=$_POST['quantity'];
$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);

foreach($value as $pdid=> $qty){
$sql="insert into tblorderdetails(UserId,OrderNumber,ProductId,ProductQty)values(:userid,:ordernumber,:pdid,:qty)";
$query=$dbh->prepare($sql);
$query->bindParam(':ordernumber',$ordernumber,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':pdid',$pdid,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->execute();
}

    echo '<script>alert("Your Order Has Been Placed.")</script>';
    unset($_SESSION["cart_item"]);
    unset($_SESSION['tprice']);
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}

?>


  
<!DOCTYPE HTML>
<html>
<head>
<title>Online Furniture Store Management System|| Cart Page</title>
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
  
</head>
<body>
<!-- header -->
<?php include_once('includes/header.php');?>
<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="men.html">Home</a></li>
		  <li class="active">Cart</li>
		 </ol>			
		 <div class="cart-items">
			 <h2>My Shopping Bag</h2>
		
			<form  action="" method="post">
<div id="shopping-cart">


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<a id="btnEmpty" href="cart.php?action=empty" style="color:red">Empty Cart</a>	
<table class="table table-bordered" cellpadding="10" cellspacing="1">
<tbody>
<tr>
	<th style="text-align:left;">Product Image</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
</tr>	
<?php
$pdtid=array();		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
        array_push($pdtid,$item['code']);
		?>
				<tr>
				<td><img src="admin/images/<?php echo $item["image"]; ?>" height='100' width='200'/></td><td><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $pd=$item["code"]; 
$_SESSION['pid']=$pdtid;

				?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rs. ".$item["price"]; ?></td>

       <input type="hidden" value="<?php echo $item['quantity']; ?>" name="quantity[<?php echo $item['code']; ?>]">

				<td  style="text-align:right;"><?php echo "Rs. ". number_format($item_price,2); ?></td>
	
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		$_SESSION['tprice']=$total_price;
		
		?>

<tr>
<td colspan="3" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "Rs".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<div class="cart-total">

			 <a class="continue" href="index.php">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total"><?php echo "Rs. ".number_format($total_price, 2); ?></span>
				
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price" style="padding-bottom: 20px">TOTAL</h4>
			 <span class="total final"><?php echo "Rs. ".number_format($total_price, 2); ?></span>
			 <div class="clearfix"></div>
			<input type="submit" value="Place Order"  class="btn btn-primary" name="submit" id="submit">
			 
			</div>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>

</div>
<?php
if(isset($_SESSION["cart_item"])){ ?>
<p style="color: red;padding-bottom: 20px">Fill The Following Detail</p>

	<div style="padding-bottom:20px;">

		<label>
			Payment Type :<br />
			<input type="radio" value="Cash on Delivery" required name="paytype"> COD (Cash on Delivery)

						</label>
						<hr />

						<label>
							<input type="text" class="form-control" placeholder="Full Name" name="fname" id="fname" required="true" style="border:1px #000 solid; width:80%;">

						</label>

					</div>
					<div>
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="Contact Number" name="cnumber" id="cnumber" required="true" style="border:1px #000 solid;" maxlength="10" pattern="[0-9]+">

						</label>

					</div>
					</br>
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="Flat or Building Number" name="flatbldgnumber" id="flatbldgnumber" required="true" style="border:1px #000 solid;">
						</label>
					</div>
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="Street Name" name="streename" id="streename" required="true" style="border:1px #000 solid;">
						</label>
					</div>					
										
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="Area" name="area" id="area" required="true" style="border:1px #000 solid;">
						</label>
					</div>						
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="Landmark" name="landmark" id="landmark" required="true" style="border:1px #000 solid;">
						</label>
					</div>	
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="City" name="city" id="city" required="true" style="border:1px #000 solid;">
						</label>
					</div>
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="Zip Code" name="zipcode" id="zipcode" required="true" style="border:1px #000 solid;">
						</label>
					</div>
					<div style="padding-bottom:20px">
						<label>
							<input type="text" class="form-control form-control-alternative" placeholder="State" name="state" id="state" required="true" style="border:1px #000 solid;">
						</label>
					</div>
				<?php } ?>
					
				</form>


	 </div>
</div>
<br />
<?php include_once('includes/footer.php');?>
</div>
<!---->
</body>
</html>
<?php } ?>