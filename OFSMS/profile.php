<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['ofsmsuid'];
    $AName=$_POST['fname'];
  $mobno=$_POST['mobno'];
  $email=$_POST['email'];
  $sql="update tbluser set FullName=:name,MobileNumber=:mobilenumber where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
     

  }
  ?>

<!DOCTYPE HTML>
<html>
<head>
<title>Online Furniture Management System | Profile</title>
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
  
</head>
<body>
<!-- header -->
<?php include_once('includes/header.php');?>
<!---->
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Account</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>View Your Profile !!!!!!</h2>
			 
			 <script>
				(function() {
			
				// Create input element for testing
				var inputs = document.createElement('input');
				
				// Create the supports object
				var supports = {};
				
				supports.autofocus   = 'autofocus' in inputs;
				supports.required    = 'required' in inputs;
				supports.placeholder = 'placeholder' in inputs;
			
				// Fallback for autofocus attribute
				if(!supports.autofocus) {
					
				}
				
				// Fallback for required attribute
				if(!supports.required) {
					
				}
			
				// Fallback for placeholder attribute
				if(!supports.placeholder) {
					
				}
				
				// Change text inside send button on submit
				var send = document.getElementById('register-submit');
				if(send) {
					send.onclick = function () {
						this.innerHTML = '...Sending';
					}
				}
			
			 })();
			 </script>
			 <div class="registration_form">
			 <!-- Form -->
				<form action="" method="post">
					<?php
$uid=$_SESSION['ofsmsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
					<div>
						<strong>Full name:</strong><br />
						<label>
							<input value="<?php  echo $row->FullName;?>" name="fname" type="text" tabindex="1" required='true'>
						</label>
					</div>
					<div>
						<strong>Mobile Number:</strong><br />
						<label>
							<input type="text" tabindex="3" required='true' maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>" name="mobno">
						</label>
					</div>
					<div>
						<strong>Email Address:</strong><br />
						<label>
							<input type="email" tabindex="3" required='true' value="<?php  echo $row->Email;?>" name="email" readonly="true">
						</label>
					</div>
					<div>
						<strong>Registration Date:</strong><br />
						<label>
							<input type="text" tabindex="3" readonly="true" value="<?php  echo $row->RegDate;?>" name="">
						</label>
					</div>					
						
					<div>
						<input type="submit" value="Update" id="" name="submit">
					</div>
					<?php $cnt=$cnt+1;}} ?>
				</form>
				<!-- /Form -->
			 </div>
		 </div>

		 <div class="clearfix"></div>
	 </div>
</div>
<!-- end registration -->

<!---->
<?php include_once('includes/footer.php');?>
</div>
<!---->



</body>
</html><?php }  ?>