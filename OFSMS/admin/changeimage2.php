<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   
 $eid=$_GET['editid'];
  $images=$_FILES["images"]["name"];
  $extension = substr($images,strlen($images)-4,strlen($images));
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Product Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$images=md5($images).time().$extension;
 move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$images);
  $sql="update tblproducts set Image1=:images where ID=:eid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':images',$images,PDO::PARAM_STR);
     $query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Product Image has been updated")</script>';
  
}}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Image | Online Furniture Store Management System</title>
    
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
                                    <h1>Update Image</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                             <div class="basic-login-form-ad">
                             <div class="row">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="all-form-element-inner">
                               <form action="#" method="post" enctype="multipart/form-data">
                                <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblproducts where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                 <div class="form-group-inner">
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                 <label class="login2 pull-right pull-right-pro">Product Name</label>
                                 </div>
                                 <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                 <input type="text" value="<?php  echo $row->ProductTitle;?>" readonly="true" 
                                 class="form-control" />
                               </div>
                                </div>
                                </div>
                                 <div class="form-group-inner">
                                  <div class="row">
                                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Old Image</label>
                                                            </div>
                                 <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                 <img src="images/<?php echo $row->Image1;?>" width="100" height="100" value="<?php  echo $row->Image1;?>">
                                  </div>
                                 </div>
                                 </div>
                                <div class="form-group-inner">
                                  <div class="row">
                                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">New Image</label>
                                                            </div>
                                 <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="file" class="form-control" id="" name="images" value="" required='true'>
                                  </div>
                                 </div>
                                 </div>
                               </div>
                               <?php $cnt=$cnt+1;}} ?> 
                          <div class="form-group-inner">
                          <div class="login-btn-inner">
                          <div class="row">
                          <div class="col-lg-3"></div>
                          <div class="col-lg-9">
                          <div class="login-horizental cancel-wp pull-left">
                         <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit" id="submit">Update</button>
                        </div>
                        </div>
                       </div>
                       </div>
                       </div>
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