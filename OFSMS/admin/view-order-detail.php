<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
  {
    
    
    $vid=$_GET['viewid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
  

    $sql="insert into tbltracking(OrderId,Remark,Status) value(:vid,:remark,:status)";
    $query=$dbh->prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR); 
    $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
    $query->bindParam(':status',$status,PDO::PARAM_STR); 
       $query->execute();
      $sql1= "update tblorder set Status=:status where OrderNumber=:vid";

    $query1=$dbh->prepare($sql1);
     $query1->bindParam(':vid',$vid,PDO::PARAM_STR);
$query1->bindParam(':status',$status,PDO::PARAM_STR);

 $query1->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='all-order.php'</script>";
}
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Brand | Online Furniture Store Management System</title>
    
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
</head>

<body>
   
   <?php include_once('includes/sidebar.php');?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include_once('includes/header.php');?>
        
        <!-- Basic Form Start -->
        <div class="basic-form-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>View Order Details</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                             <div class="basic-login-form-ad">
                             <div class="row">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="all-form-element-inner">
               
              <table border="1" class="table table-bordered mg-b-0">
                <?php 
          $vid=$_GET['viewid'];

$sql1="SELECT tblorder.payType,tblorder.OrderNumber,tblorder.OrderDate,tblorder.FullName,tblorder.ContactNumber,tblorder.FlatNo,tblorder.StreetName,tblorder.Area,tblorder.Landmark,tblorder.City,tblorder.Zipcode,tblorder.State,tblorder.Status,tbluser.FullName as afname,tbluser.MobileNumber,tbluser.Email from  tblorder
join tbluser on tbluser.ID=tblorder.UserID where tblorder.OrderNumber=:vid";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>
                <tr>
<td colspan="6" style="font-size:20px;color:blue">
 Customer Details</td></tr>
                                            <tr>
    <th>Order Number</th>
    <td><?php  echo $row1->OrderNumber;?></td>
    <th style="width:300px;">Full Name</th>
    <td><?php  echo $row1->FullName;?></td>
    <th style="width:300px;">Contact Number</th>
    <td><?php  echo $row1->ContactNumber;?></td>
  </tr>
                                      <tr>
    <th>Payment Type</th>
    <td colspan="5"><?php  echo $row1->payType;?></td>
  </tr>

  <tr>

  <td colspan="6" style="font-size:20px;color:blue">
 Delivery Address</td></tr>
                                           
   <tr>
    <th>Flat Number</th>
    <td><?php  echo $row1->FlatNo;?></td>
    <th>Street Name</th>
    <td><?php  echo $row1->StreetName;?></td>
     <th>Area</th>
    <td><?php  echo $row1->Area;?></td>
  </tr>
   <tr>
   
    <th>Landmark</th>
    <td><?php  echo $row1->Landmark;?></td>
    <th>City</th>
    <td><?php  echo $row1->City;?></td>
    <th>Zipcode</th>
    <td><?php  echo $row1->Zipcode;?></td>
  </tr>
  
  <tr>
    <th>State</th>
    <td><?php  echo $row1->State;?></td>
    <th>Order Date</th>
    <td><?php  echo $row1->OrderDate;?></td>
     <th>Order Final Status</th>

    <td colspan="4"> <?php  $status=$row1->Status;
    
if($row1->Status=="Confirmed")
{
  echo "Your Order has been Confirmed";
}
if($row1->Status=="On The Way")
{
  echo "Your product is onthe way";
}
if($row1->Status=="Delivered")
{
  echo "Your product has been Delivered";
}

if($row1->Status=="Cancelled")
{
 echo "Your order has been cancelled";
}


if($row1->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
  </tr><?php $cnt=$cnt+1;}} ?>
  <tr>
<td colspan="6" style="font-size:20px;color:blue">
 Item Purchased</td></tr>
 
   <tr>
  <th style="text-align:left;">S.NO</th>
  <th style="text-align:left;">Product Image</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Order Number</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Price</th>

</tr>
  <?php 
          $vid=$_GET['viewid'];

$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblproducts.ProductTitle,tblproducts.SalePrice,tblproducts.Image,tblorderdetails.ProductId,tblorderdetails.ProductQty from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblproducts on tblorderdetails.ProductId=tblproducts.ID 
where tblorder.OrderNumber=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>



        <tr>
          <td><?php echo htmlentities($cnt);?></td>
        <td><img class="b-goods-f__img img-scale" src="images/<?php echo $row->Image;?>" alt="" width='80' height='80'></td> 
        <td><?php echo $row->ProductTitle;?></td>
        <td><?php echo $onum=$row->OrderNumber;?></td>
        <td><?php echo $qty=$row->ProductQty;?></td>
        <td><?php echo $total=$row->SalePrice;?></td>

       </tr>



       <?php
$grandtotal+=$total;
$gqty+=$qty;
        $cnt=$cnt+1; }} ?>
       <tr>
<td colspan="4" align="right">Total:</td>
<td><strong><?php echo $gqty; ?></strong></td>
<td><strong><?php echo "Rs. ".number_format($grandtotal, 2); ?></strong></td>
</tr>
</table> 
<?php 
$vid=$_GET['viewid']; 
   if($status!=""){
$ret="select tbltracking.OrderCanclledByUser,tbltracking.Remark,tbltracking.Status as astatus,tbltracking.StatusDate from tbltracking where tbltracking.OrderId =:vid";
$query3 = $dbh -> prepare($ret);
$query3-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

 $cancelledby=$row3->OrderCanclledByUser;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results3 as $row3)
{  ?>             
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row3->Remark;?></td> 
  <td><?php  echo $row3->astatus;
if($row3->OrderCanclledByUser==1){
echo "("."by user".")";
} else {

echo "("."by Company".")";
}

   ?></td> 
  <td><?php  echo $row3->StatusDate;?></td>  
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
 
<?php 

if ($status=="" || $status=="Confirmed" || $status=="On The Way"){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
   
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Confirmed" selected="true">Confirmed</option>
     <option value="On The Way">On The Way</option>
     <option value="Delivered">Delivered</option>
     <option value="Cancelled">Cancelled</option>
     
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
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
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?php }  ?>