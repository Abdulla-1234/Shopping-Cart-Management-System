<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<div class="footer-content">
     <div class="container">
         <div class="ftr-grids">
             <div class="col-md-3 ftr-grid">
                 <h4>About Us</h4>
                 <ul>
                     <li><a href="about-us.php">Who We Are</a></li>
                     <li><a href="contact-us.php">Contact Us</a></li>
                     <li><a href="index.php">Our Sites</a></li>
                                       
                 </ul>
             </div>
             <div class="col-md-3 ftr-grid">
                 <h4>For more Detail</h4>
                 <ul>
                        <?php

$sql="SELECT * from  tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                     <li>Contact Number: <?php  echo $row->MobileNumber;?></li>
                     <li>Email: <?php  echo $row->Email;?></li>
                     <li>Address: <?php  echo $row->PageDescription;?></li>
                     <?php $cnt=$cnt+1;}} ?>                
                 </ul>
             </div>
             <div class="col-md-3 ftr-grid">
                 <h4>Your account</h4>
                 <ul>
                     <li><a href="signup.php">Login</a></li>
                     <li><a href="signup.php">Sign Up</a></li>
                     <li><a href="about-us.php">About Us</a></li>
                     <li><a href="contact-us.php">Contact Us</a></li>
                     <li><a href="index.php">Home</a></li>                                       
                 </ul>
             </div>
             <div class="col-md-3 ftr-grid">
                 <h4>Categories</h4>
                 
                 <ul>
                    <?php
$ret="SELECT * from tblcategory";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$resultss=$query1->fetchAll(PDO::FETCH_OBJ);
foreach($resultss as $rows)
{               ?>
                     <li><a href="category-details.php?catid=<?php echo htmlentities($rows->ID)?>"><?php echo htmlentities($rows->CategoryName)?></a></li>
                     <?php } ?>                   
                 </ul>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
</div>
<!---->
<br />
<div class="footer">
     <div class="container">
              
         <div class="copywrite">
             <p style="text-align: center;color: red;font-size: 20px"><strong>Online Furniture Store Management System</strong> </p>
         </div>          
         </div>
     </div>