<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$ofsmsaid=$_SESSION['ofsmsaid'];
 $catid=$_POST['catid'];
 $ptitle=$_POST['ptitle'];
 $rprice=$_POST['regularprice'];
 $brandname=$_POST['brandname'];
 $qty=$_POST['qty'];
 $pdesc=$_POST['pdesc'];
 $saleprice=$_POST['saleprice'];
 $subcategory=$_POST['subcategory'];
 $availability=$_POST['availability'];
 $ProductID=mt_rand(100000000, 999999999);
 //Product Image
 $pic=$_FILES["image"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Product  Image 1
$pic1=$_FILES["image1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Product  Image 2
$pic2=$_FILES["image2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Product  Image 3
$pic3=$_FILES["image3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Product image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Product image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Product image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Product image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename product images
$propic=md5($pic).time().$extension;
$propic1=md5($pic1).time().$extension1;
$propic2=md5($pic2).time().$extension2;
$propic3=md5($pic3).time().$extension3;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$propic);
     move_uploaded_file($_FILES["image1"]["tmp_name"],"images/".$propic1);
     move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$propic2);
     move_uploaded_file($_FILES["image3"]["tmp_name"],"images/".$propic3);

$sql="insert into tblproducts(ProductID,CatID,SubCatid,ProductTitle,RegularPrice,BrandName,Quantity,PDesc,SalePrice,Image,Image1,Image2,Image3,Availability)values(:pid,:catid,:scatid,:title,:rprice,:bname,:qty,:pdesc,:sprice,:img,:img1,:img2,:img3,:availability)";
$query=$dbh->prepare($sql);
$query->bindParam(':pid',$ProductID,PDO::PARAM_STR);
$query->bindParam(':catid',$catid,PDO::PARAM_STR);
$query->bindParam(':title',$ptitle,PDO::PARAM_STR);
$query->bindParam(':rprice',$rprice,PDO::PARAM_STR);
$query->bindParam(':bname',$brandname,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->bindParam(':pdesc',$pdesc,PDO::PARAM_STR);
$query->bindParam(':sprice',$saleprice,PDO::PARAM_STR);
$query->bindParam(':scatid',$subcategory,PDO::PARAM_STR);
$query->bindParam(':availability',$availability,PDO::PARAM_STR);
$query->bindParam(':img',$propic,PDO::PARAM_STR);
$query->bindParam(':img1',$propic1,PDO::PARAM_STR);
$query->bindParam(':img2',$propic2,PDO::PARAM_STR);
$query->bindParam(':img3',$propic3,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Product detail has been added.")</script>';
echo "<script>window.location.href ='add-products.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>ADD Products | Online Furniture Store Management System</title>
    
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script>
function getSubCat(val) {
  $.ajax({
type:"POST",
url:"get-subcat.php",
data:'catid='+val,
success:function(data){
$("#subcategory").html(data);
}

  });


}
  
  
  </script>
</head>

<body>
   
   <?php include_once('includes/sidebar.php');?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include_once('includes/header.php');?>
        
        <!-- Basic Form Start -->
<div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
<div class="single-pro-review-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-tab-pro-inner">
<ul id="myTab3" class="tab-review-design">
<li class="active"><a href="add-products.php"><i class="fa fa-pencil" aria-hidden="true"></i> Add Product</a></li>
 </ul><form action="#" method="post" enctype="multipart/form-data">
<div id="myTabContent" class="tab-content custom-product-edit">
<div class="product-tab-list tab-pane fade active in" id="description">
<div class="row">
  <form action="#" method="post" enctype="multipart/form-data">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">

<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Product Title" name='ptitle' id="ptitle" required="true">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
 <input type="text" class="form-control" placeholder="Regular Price" name="regularprice" id="regularprice" required="true">
  </div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
<select name="brandname" id="brandname" required="true" class="form-control pro-edt-select form-control-primary">
<option value="opt1">Select Brand</option>
<?php 

$sql2 = "SELECT * from    tblbrand ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->BrandName);?>"><?php echo htmlentities($row1->BrandName);?></option>
 <?php } ?> 
</select>
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
<select name="availability" id="availability" required="true" class="form-control pro-edt-select form-control-primary">
<option value="">Select Availability</option>
<option value="Instock">In stock</option>
<option value="Outstock">Out of stock</option>

</select>
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Quantity" name="qty" id="qty" required="true">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
<input type="file" name="image" value="" class="form-control" id="image" required="true">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
<input type="file" name="image1" value="" class="form-control" id="image1" required="true">
</div>
 </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">

<div class="input-group mg-b-pro-edt">
 <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
 <textarea type="text" class="form-control" placeholder="Product Description" name="pdesc" id="pdesc" required="true"></textarea>
 </div>
 <div class="input-group mg-b-pro-edt">
  <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
   <input type="text" class="form-control" placeholder="Sale Price" name="saleprice" id="saleprice" required="true">
  </div>
  <div class="input-group mg-b-pro-edt">
 <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
 <select name="catid" id="catid" required="true" onChange="getSubCat(this.value)" class="form-control pro-edt-select form-control-primary">
<option value="opt1">Select Category</option>
<?php 

$sql2 = "SELECT * from    tblcategory ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->CategoryName);?></option>
 <?php } ?> 
</select>
  </div>
  <div class="input-group mg-b-pro-edt">
 <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
 <select name="subcategory" id="subcategory" required="true"  class="form-control pro-edt-select form-control-primary">
<option value="opt1">Select Subcategory</option>

</select>
 </div>
 <div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
<input type="file" name="image2" value="" class="form-control" id="image2" required="true">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
<input type="file" name="image3" value="" class="form-control" id="image3" required="true">
</div>
</div>

</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="text-center mg-b-pro-edt custom-pro-edt-ds">
<button type="submit" name="submit" id="submit" class="btn btn-primary waves-effect waves-light m-r-10">Add
</button>
</form>
</div>
</div>
</div>
</div>

</div>
  </div>
 </div>
</div>
</div>
 </div>
        <!-- Basic Form End-->
        <?php include_once('includes/footer.php');?>
    </div>

    <!-- jquery
    ============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
    ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
    ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
    ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
    ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
    ============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
    ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
    ============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
    ============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?php }  ?>