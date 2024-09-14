 <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="dashboard.php"><img class="main-logo" src="images/logo/logo1.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
<div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="fa fa-bars"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="dashboard.php" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="about-us.php" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="contact-us.php" class="nav-link">Contact</a>
                                                </li>
                                                <li class="nav-item"><a href="manage-products.php" class="nav-link">Products</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
<div class="header-right-info">
 <ul class="nav navbar-nav mai-top-nav header-right-menu">

 <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
<div role="menu" class="notification-author dropdown-menu animated zoomIn">
 <div class="notification-single-top">
 <h1>Notifications</h1>
 </div>
<ul class="notification-menu">
   
 <li>
  <?php
$sql="SELECT * from tblorder where Status is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$totalorder=$query->rowCount();
foreach($results as $row)
{ 

  ?>
   <a href="view-order-detail.php?viewid=<?php echo htmlentities ($row->OrderNumber);?>">
 <div class="notification-icon">
<i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
</div>
<div class="notification-content">
   <p><?php echo $row->FullName;?>-<?php echo $row->OrderNumber;?>(<?php echo $row->OrderDate;?>)</p>


 </div>
</a><?php  } ?>
</li>

 </ul>
<div class="notification-view">
  <a href="new-order.php">View All Notification</a>
 </div>
</div>
</li>
 <li class="nav-item">

 <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
<i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>

<span class="admin-name"><?php
$aid=$_SESSION['ofsmsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?><?php  echo $row->AdminName;?><?php $cnt=$cnt+1;}} ?></span>
<i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
    </a>
  <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">

<li><a href="admin-profile.php"><span class="fa fa-user author-log-ic"></span>My Profile</a>
 </li>
<li><a href="change-password.php"><span class="fa fa-cog author-log-ic"></span>Change</a>
 </li>
<li><a href="logout.php"><span class="fa fa-lock author-log-ic"></span>Log Out</a>
 </li>
 </ul>
</li>

 </ul>
 </div>
</div>
</div>
</div>
 </div>
 </div>
  </div>
 </div>

        </div>