<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['catid'])){
$catid=$_POST['catid'];

  $sql3="select * from  tblsubcategory where CatID=:catid";
  $query3 = $dbh -> prepare($sql3);
  $query3->bindParam(':catid',$catid,PDO::PARAM_STR);
  $query3->execute();
  $result3=$query3->fetchAll(PDO::FETCH_OBJ);
    foreach($result3 as $row3)
{          
    ?>  
<option value="<?php echo htmlentities($row3->ID);?>"><?php echo htmlentities($row3->SubcategoryName);?></option>
                  

<?php }}} ?>
