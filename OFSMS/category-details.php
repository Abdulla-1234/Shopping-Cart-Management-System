<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
////code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
		if(!empty($_POST["quantity"])) {
			echo $pid=$_GET["pid"];

 //$sql="SELECT * FROM tblproduct WHERE ID=:pid ";
$sql = $dbh->prepare("SELECT * FROM tblproducts WHERE ID=:pid ");
//$stckdta=$dbh->query($sql);
$sql->execute(array(':pid' => $pid));
 while($productByCode=$sql->fetch(PDO::FETCH_ASSOC))
 {


			$itemArray = array($productByCode["ID"]=>array('name'=>$productByCode["ProductTitle"], 'code'=>$productByCode["ID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["SalePrice"], 'image'=>$productByCode["Image"]));
		
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["ID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["ID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;

			}
		}
	}
		header('location:cart.php');
	break;

	
}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Online Furniture Management System | Products</title>
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
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

  
</head>
<body>

<?php include_once('includes/header.php');?>

<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Products</li>
		 </ol>
			<h2>OUR PRODUCTS</h2>	




<!-- Cart ---->









		 <div class="col-md-9 product-model-sec">


		 	<?php
$cid=intval($_GET['catid']);
$sql="SELECT * from  tblproducts where CatID=:cid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':cid', $cid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>		<form method="post" action="category-details.php?action=add&pid=<?php echo $row->ID; ?>">
					 <a href="single-product-detail.php?proid=<?php echo $row->ID;?>">
					 	<div class="product-grid love-grid" style="height:400px;">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="admin/images/<?php echo $row->Image;?>" alt="" height='200' width='200'>
							<div class="b-wrapper">
						
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4><?php echo $row->ProductTitle;?></h4>
								<p>ID: <?php echo $row->ProductID;?></p>
								<p style="color:red"> <?php echo $row->Availability;?></p>
								<span class="item_price">Rs. <?php echo $row->SalePrice;?></span>	
<?php if($row->Availability=='Instock'):;?>
<input type="text" class="item_quantity" name="quantity" value="1" />				
<input type="submit" value="Add to Cart" class="btnAddAction" />
<?php endif;?>

							</div>													
							<div class="clearfix"> </div>
						</div>
					</div>	
				</a>
			</form>
					<?php $cnt=$cnt+1;}} else {  ?>
						<h3 style="color:red" align="center">No record found against this category</h3>
					<?php } ?>
										
				
			</div>
				<?php include_once('includes/sidebar.php');?>		 
	      </div>
		</div>
</div>	

<?php include_once('includes/footer.php');?>
</div>
<!---->
</body>
</html>