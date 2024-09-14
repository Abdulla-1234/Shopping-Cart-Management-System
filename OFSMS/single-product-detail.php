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

	// code for removing product from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
		header('location:cart.php');
	break;
	// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
			header('location:cart.php');
	break;	
}
}
  	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Furniture Management System | Single Products</title>
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
<!--etalage-->
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>


<!-- //etalage-->
  
</head>
<body>
<!-- header -->
<?php include_once('includes/header.php');?>
<!--cart-->

<!---->
<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.php">Home</a></li>
			 <li class="active">Products</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-9 det">
				<?php
$pid=intval($_GET['proid']);
$sql="SELECT *,tblproducts.ID as pid from  tblproducts 
join tblcategory on tblcategory.ID=tblproducts.CatID
join tblsubcategory on tblsubcategory.ID=tblproducts.SubCatid
where tblproducts.ID=:pid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				  <div class="single_left">
				  	<form method="post" action="category-details.php?action=add&pid=<?php echo $row->pid; ?>">
					 <div class="grid images_3_of_2">
						 <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="admin/images/<?php echo $row->Image;?>" class="img-responsive" width='150' height='150' />
									<img class="etalage_source_image" src="admin/images/<?php echo $row->Image1;?>" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="admin/images/<?php echo $row->Image2;?>" class="img-responsive" />
								<img class="etalage_source_image" src="admin/images/<?php echo $row->Image2;?>" class="img-responsive" title="" width='150' height='150'/>
							</li>							
						    <li>
								<img class="etalage_thumb_image" src="admin/images/<?php echo $row->Image3;?>" class="img-responsive"  />
								<img class="etalage_source_image" src="admin/images/<?php echo $row->Image3;?>"class="img-responsive" width='150' height='150'/>
							</li>
						 </ul>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				  <div class="single-right">
					 <h3><?php echo $row->ProductTitle;?></h3>
					 <div class="id"><h4>ID: <?php echo $row->ProductID;?></h4></div>
					  <div class="id"><h4>Category: <?php echo $row->CategoryName;?></h4></div>
					   <div class="id"><h4>Sub-category: <?php echo $row->SubcategoryName;?></h4></div>
					    <div class="id"><h4>Brand: <?php echo $row->BrandName;?></h4></div>
					  <div class="cost">
						 <div class="prdt-cost">
							 <ul>
								 <li>MRP: <del>Rs. <?php echo $row->RegularPrice;?></del></li>								 
								 <li style="font-size:14px;"><strong>Sellling Price:</strong> <span style="color:red">Rs. <?php echo $row->SalePrice;?></span></li>
								 					  <p style="color:red"> <?php echo $row->Availability;?></p>
<?php if($row->Availability=='Instock'):;?>
<input type="text" class="item_quantity" name="quantity" value="1" />				
<input type="submit" value="Add to Cart" class="btnAddAction" />
<?php endif;?>
							 </ul>
						 </div>
						 
						 <div class="clearfix"></div>
					  </div>
					  
					  <div class="single-bottom1">
						<h6>Details</h6>
						<p class="prod-desc"><?php echo $row->PDesc;?>.</p>
					 </div>					 
				  </div>
				  <div class="clearfix"></div>
								  					
		    </div><?php $cnt=$cnt+1;}}?>
		    
			<?php include_once('includes/sidebar.php');?>
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>
<br />
<?php include_once('includes/footer.php');?>
</div>
<!---->
</body>
</html>