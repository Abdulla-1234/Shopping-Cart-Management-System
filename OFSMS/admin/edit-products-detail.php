<?php
session_start();
error_reporting(0);
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
 $eid=$_GET['editid'];
 $ProductID=mt_rand(100000000, 999999999);
 
$sql="update tblproducts set CatID=:catid,SubCatid=:scatid,ProductTitle=:title,RegularPrice=:rprice,BrandName=:bname,Quantity=:qty,PDesc=:pdesc,SalePrice=:sprice,Availability=:availability where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':catid',$catid,PDO::PARAM_STR);
$query->bindParam(':title',$ptitle,PDO::PARAM_STR);
$query->bindParam(':rprice',$rprice,PDO::PARAM_STR);
$query->bindParam(':bname',$brandname,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->bindParam(':pdesc',$pdesc,PDO::PARAM_STR);
$query->bindParam(':sprice',$saleprice,PDO::PARAM_STR);
$query->bindParam(':scatid',$subcategory,PDO::PARAM_STR);
$query->bindParam(':availability',$availability,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
  $query->execute();
echo '<script>alert("Products has been updated")</script>';

  }
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Updates Products | Online Furniture Store Management System</title>
    
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
<li class="active"><a href="add-products.php"><i class="fa fa-pencil" aria-hidden="true"></i> Update Product</a></li>
 </ul><form action="#" method="post" enctype="multipart/form-data">
    <?php
$eid=$_GET['editid'];
$sql="SELECT tblcategory.CategoryName ,tblsubcategory.ID as subcatid,tblsubcategory.SubcategoryName,tblsubcategory.CreationDate,tblproducts.CatID,tblproducts.ID,tblproducts.SubCatid,tblproducts.ProductTitle,tblproducts.RegularPrice,tblproducts.BrandName,tblproducts.Quantity,tblproducts.Availability,tblproducts.PDesc,tblproducts.SalePrice,tblproducts.Image,tblproducts.Image1,tblproducts.Image2,tblproducts.Image3 from tblproducts inner join tblcategory on tblcategory.ID=tblproducts.CatID join tblsubcategory on tblsubcategory.ID=tblproducts.SubCatid  where tblproducts.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div id="myTabContent" class="tab-content custom-product-edit">
<div class="product-tab-list tab-pane fade active in" id="description">
<div class="row">
  <form action="#" method="post" enctype="multipart/form-data">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">

<div class="input-group mg-b-pro-edt">

<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span><label>Product Title</label>
<input type="text" class="form-control" value="<?php  echo $row->ProductTitle;?>" name='ptitle' id="ptitle" required="true">
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span><label>Regular Price</label>
 <input type="text" class="form-control" value="<?php  echo $row->RegularPrice;?>" name="regularprice" id="regularprice" required="true">
  </div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span><label>Brand Name</label>
<select name="brandname" id="brandname" required="true" class="form-control pro-edt-select form-control-primary">
<option value="<?php  echo $row->BrandName;?>"><?php  echo $row->BrandName;?></option>
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
<span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span><label>Availability</label>
<select name="availability" id="availability" required="true" class="form-control pro-edt-select form-control-primary">
<option value="<?php  echo $row->Availability;?>"><?php  echo $row->Availability;?></option>
<option value="Instock">In stock</option>
<option value="Outstock">Out of stock</option>

</select>
</div>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span><label>Quantity</label>
<input type="text" class="form-control" value="<?php  echo $row->Quantity;?>" name="qty" id="qty" required="true">
</div>
<div class="input-group mg-b-pro-edt">
<label style="padding-right: 20px">Image </label>
<img src="images/<?php echo $row->Image;?>" width="100" height="100" value="<?php  echo $row->Image;?>"><a href="changeimage1.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
</div>
<div class="input-group mg-b-pro-edt">
<label style="padding-right: 20px">Image1 </label>
<img src="images/<?php echo $row->Image1;?>" width="100" height="100" value="<?php  echo $row->Image1;?>"><a href="changeimage2.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
</div>
 </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="review-content-section">

<div class="input-group mg-b-pro-edt">
 <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span><label>Product Descriptions</label>
 <textarea type="text" class="form-control" name="pdesc" id="pdesc" required="true"><?php  echo $row->PDesc;?></textarea>
 </div>
 <div class="input-group mg-b-pro-edt">
  <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span><label>Sales Price</label>
   <input type="text" class="form-control" value="<?php  echo $row->SalePrice;?>" name="saleprice" id="saleprice" required="true">
  </div>
  <div class="input-group mg-b-pro-edt">
 <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span><label>Category</label>
 <select name="catid" id="catid" required="true" onChange="getSubCat(this.value)" class="form-control pro-edt-select form-control-primary">
<option value="<?php  echo $row->CatID;?>"><?php  echo $row->CategoryName;?></option>
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
<option value="<?php  echo $row->SubCatid;?>"><?php  echo $row->SubcategoryName;?></option>

</select>
 </div>
 <div class="input-group mg-b-pro-edt">
<label style="padding-right: 20px">Image2 </label>
<img src="images/<?php echo $row->Image2;?>" width="100" height="100" value="<?php  echo $row->Image2;?>"><a href="changeimage3.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
</div>
<div class="input-group mg-b-pro-edt">
<label style="padding-right: 20px">Image3 </label>
<img src="images/<?php echo $row->Image3;?>" width="100" height="100" value="<?php  echo $row->Image3;?>"><a href="changeimage4.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
</div>
</div>

</div>
<?php $cnt=$cnt+1;}} ?>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="text-center mg-b-pro-edt custom-pro-edt-ds">
<button type="submit" name="submit" id="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update
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