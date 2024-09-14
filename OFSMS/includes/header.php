 <?php if (strlen($_SESSION['ofsmsuid']!=0)) {?>
<div class="top_bg">
  <div class="container">
    <div class="header_top-sec">
      <div class="top_right">
         <h2>Online Furniture Shop</h2>
      </div>
      <div class="top_left">
        <ul>
          <?php
         $uid= $_SESSION['ofsmsuid'];
$sql="SELECT * from tbluser where ID='$uid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <li class="top_link">Email:<?php  echo htmlentities($row->Email);?></li>|
          <li class="top_link">Mobile Number:<?php  echo htmlentities($row->MobileNumber);?></li>|  <?php $cnt=$cnt+1;}} ?>        
        </ul>
        <div class="social">
          <ul>
            <li><a href="#"><i class="facebook"></i></a></li>
            <li><a href="#"><i class="twitter"></i></a></li>
            <li><a href="#"><i class="dribble"></i></a></li>  
            <li><a href="#"><i class="google"></i></a></li>                   
          </ul>
        </div>
      </div>
        <div class="clearfix"> </div>
    </div>
  </div>
</div><?php } ?>
<?php if (strlen($_SESSION['ofsmsuid']==0)) {?>
<div class="top_bg">
  <div class="container">
    <div class="header_top-sec">
      <div class="top_right">
        <h2>Online Furniture Shop</h2>
      </div>
      <div class="top_left">
        <ul>
          <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <li class="top_link">Email: <?php  echo htmlentities($row->Email);?></li>|
          <li class="top_link">Telephone : +<?php  echo htmlentities($row->MobileNumber);?></li>|          
        <?php $cnt=$cnt+1;}} ?>
        </ul>

        <div class="social">
          <ul>
            <li><a href="#"><i class="facebook"></i></a></li>
            <li><a href="#"><i class="twitter"></i></a></li>
            <li><a href="#"><i class="dribble"></i></a></li>  
            <li><a href="#"><i class="google"></i></a></li>                   
          </ul>
        </div>
      </div>
        <div class="clearfix"> </div>
    </div>
  </div>
</div><?php } ?>

<div class="header_top">
   <div class="container">
     <div class="logo">
      <a href="index.php"><strong style="color: red;font-size: 20px;">Furniture Store</strong></a>       
     </div>
     <div class="header_right"> 
      <?php if (strlen($_SESSION['ofsmsuid']==0)) {?>
       <div class="login">
         <a href="signup.php">LOGIN</a>
       </div><?php } ?>
       <div class="cart box_1">
        <?php if (strlen($_SESSION['ofsmsuid']!=0)) {?>
        <a href="cart.php">
          <h3>Your Cart:  <span><?php echo "Rs. ".number_format($_SESSION['tprice'], 2); ?></span> <img src="images/bag.png" alt=""></h3>
        </a>  
       
        <div class="clearfix"> </div><?php } ?>
       </div>        
     </div>
      <div class="clearfix"></div>  
   </div>
</div>
<!--cart-->
   
<!------>
<div class="mega_nav">
   <div class="container">
     <div class="menu_sec">
     <!-- start header menu -->
     <ul class="megamenu skyblue">
       <li class="active grid"><a class="color1" href="index.php">Home</a></li>
       <li class="grid"><a class="color2" href="#">furniture</a>
        <div class="megapanel">
          <div class="row">
            <div class="col1">
              <div class="h_nav">
                <h4>Furnitures</h4>
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
            </div>
           
            
          </div>
      
            </div>
        </li>
       
        <li><a class="color5" href="about-us.php">About</a>
        
        </li>
        <li><a class="color6" href="contact-us.php">Contact</a>
        </li>
             <li><?php if (strlen($_SESSION['ofsmsuid']==0)) {?>
        <a class="color4" href="admin/login.php">Admin</a>
      <?php } ?>
        </li> 
        <?php if (strlen($_SESSION['ofsmsuid']!=0)) {?>
        <li><a class="color6">My Account</a>
          <div class="megapanel">
          <div>
            
              <div class="h_nav">
                
                <ul>
                  <li><a href="profile.php">My Profile</a></li>
                  <li><a href="change-password.php">Change Password</a></li>
                  <li><a href="cart.php">My Cart</a></li>
                  <li><a href="my-order.php">My Order</a></li>
                  <li><a href="logout.php">Logout</a></li>
                                 
                  
                </ul> 
              </div>              
          
        
          </div>
         
            </div>
        </li>  <?php } ?>     
      
        
         </ul> 
         
       <div class="clearfix"></div>
     </div>
    </div>
</div>